<?php

namespace App\Http\Controllers;

use App\Enums\Task\TaskProgressStatusEnum;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function getDashboard(): View
    {
        $user = request()->user();
        $completedTasks = $user->tasks()->where('status', TaskProgressStatusEnum::Completed)->count();
        $activeTask = $user->tasks()->whereIn('status', [
            TaskProgressStatusEnum::Started,
            TaskProgressStatusEnum::Need_Improvements,
        ])->first();
        $moduleAcceptance = $user->modules()->latest()->first()?->pivot;

        return view('dashboard', [
            'user' => $user,
            'details' => $user->details,
            'completedTasks' => $completedTasks,
            'activeTask' => $activeTask,
            'moduleAcceptance' => $moduleAcceptance,
        ]);
    }
}
