<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Task\Task;
use App\Models\Task\Progress;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $taskList = Module::query()->paginate();

        return view('welcome', [
            'modules' => $taskList,
            'userModules' => auth()->user()->modules
        ]);
    }
}
