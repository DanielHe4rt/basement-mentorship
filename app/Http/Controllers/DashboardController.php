<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskProgress;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $taskList = Task::query()->paginate();
        $userTasks = TaskProgress::query()->paginate();

        return view('welcome', [
            'tasks' => $taskList,
            'userTasks' => $userTasks
        ]);
    }
}
