<?php

namespace App\Http\Controllers;

use App\Models\TaskProgress;

class TasksController extends Controller
{
    public function postInitTask(int $task)
    {
        TaskProgress::query()
            ->create([
                'user_id' => auth()->id(),
                'task_id' => $task
            ]);

        return redirect()->route('landing');
    }
}
