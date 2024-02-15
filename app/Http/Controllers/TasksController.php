<?php

namespace App\Http\Controllers;

use App\Enums\TaskActionEnum;
use App\Http\Requests\StartTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Module;
use App\Models\Task\Progress;
use App\Models\Task\Task;
use Illuminate\Validation\ValidationException;

class TasksController extends Controller
{

    public function getTask(Module $module, Progress $taskProgress)
    {
        return view('tasks.view', [
            'taskProgress' => $taskProgress,
            'module' => $module
        ]);
    }

    public function postInitTask(StartTaskRequest $request, Module $module, Task $task)
    {
        $progress = auth()
            ->user()
            ->tasks()
            ->where(['task_id' => $task->id])
            ->first();

        if ($progress) {
            return redirect()->route('tasks.show', ['module' => $module->id, 'taskProgress' => $progress->id]);
        }

        $progress = auth()
            ->user()
            ->tasks()
            ->create([
                'task_id' => $task->getKey()
            ]);

        return redirect()->route('tasks.show', ['module' => $module->id, 'taskProgress' => $progress->id]);
    }

    public function postTaskAction(
        TaskRequest    $request,
        Progress       $progress,
        TaskActionEnum $action
    )
    {
        $payload = $request->validated();

        $fn = match ($action) {
            TaskActionEnum::Draft => function () use ($progress, $payload) {
                $progress->update(['content' => $payload['content']]);
                if (isset($payload['todos'])) {
                    $progress->todos()->sync(array_keys($payload['todos']));
                }
            },
            TaskActionEnum::Submit => throw new \Exception('To be implemented'),
        };

        $fn();

        return redirect()->route('tasks.show', $progress);
    }
}
