<?php

namespace App\Http\Controllers;

use App\Enums\TaskActionEnum;
use App\Http\Requests\TaskRequest;
use App\Models\Task\Progress;
use App\Models\Task\Task;
use Illuminate\Validation\ValidationException;

class TasksController extends Controller
{

    public function getTask(Progress $taskProgress)
    {
        return view('tasks.view', [
            'taskProgress' => $taskProgress
        ]);
    }

    public function postInitTask(Task $task)
    {
        Progress::query()
            ->create([
                'user_id' => auth()->id(),
                'task_id' => $task
            ]);

        return redirect()->route('landing');
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
            default => throw ValidationException::withMessages(['fudeu' => 'bacana'])
        };

        $fn();

        return redirect()->route('tasks.show', $progress);
    }
}
