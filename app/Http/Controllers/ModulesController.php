<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Task\Progress;
use App\Models\Task\Task;
use Illuminate\Http\RedirectResponse;

class ModulesController extends Controller
{
    public function getModules()
    {
        $modules = Module::query()->paginate();

        return view('modules.index', [
            'modules' => $modules,
            'userModules' => auth()->user()->modules
        ]);

    }

    public function getModule(Module $module)
    {
        $taskList = $module->tasks()->get();
        $userTasks = request()->user()->tasks;

        return view('modules.show', [
            'tasks' => $taskList,
            'userTasks' => $userTasks
        ]);
    }

    public function postInitModule(Module $module): RedirectResponse
    {
        $module->users()->attach(request()->user()->id);

        return redirect()->route('modules.show', $module);
    }
}
