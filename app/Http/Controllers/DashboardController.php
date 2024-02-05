<?php

namespace App\Http\Controllers;

use App\Models\Module;

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
