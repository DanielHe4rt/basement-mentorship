<?php

namespace App\Http\Controllers;

use App\Models\Task\Task;
use App\Models\Task\Progress;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $taskList = Task::query()->paginate();
        $userTasks = Progress::query()->paginate();

        return view('welcome', [
            'tasks' => $taskList,
            'userTasks' => $userTasks
        ]);
    }
}
