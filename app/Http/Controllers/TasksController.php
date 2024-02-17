<?php

namespace App\Http\Controllers;

use App\Enums\Task\TaskActionEnum;
use App\Http\Requests\StartTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Models\Module;
use App\Models\Task\Progress;
use App\Models\Task\Task;
use App\Services\TaskService;

class TasksController extends Controller
{
    public function __construct(private readonly TaskService $service)
    {
    }

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
        Module         $module,
        Progress       $progress,
        TaskActionEnum $action
    )
    {
        $payload = $request->validated();

        match ($action) {
            TaskActionEnum::Draft => $this->service->updateDraftTask($progress, $payload),
            TaskActionEnum::Submit => $this->service->sendTaskForReview($progress, $payload),
        };

        return redirect()->route('tasks.show', [
            'module' => $module,
            'taskProgress'  => $progress,
        ]);
    }
}
