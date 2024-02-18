<?php

namespace App\Http\Requests;

use App\Models\Module\Module;
use App\Models\Module\Task\Task;
use App\Models\Users\Progress;
use Illuminate\Foundation\Http\FormRequest;

class StartTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        /** @var Task $task */
        $task = $this->route('task');

        /** @var Module $task */
        $module = $this->route('module');

        if ($task->order == 1) {
            return true;
        }

        $previousTaskOrder = $task->order - 1;
        $previousTask = Task::query()
            ->where([
                'order' => $previousTaskOrder,
                'module_id' => $module->id
            ])->first();

        $finishedPreviousTask = Progress::query()->where([
            'user_id' => request()->user()->id,
            'task_id' => $previousTask->id,
            'status' => 'completed'
        ])->exists();

        return $finishedPreviousTask;
    }
}
