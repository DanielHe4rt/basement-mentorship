<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOnboardRequest;
use App\Models\Module;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function getDashboard(): View
    {
        return view('dashboard', [
            'user' => request()->user(),
            'details' => request()->user()->details,
        ]);
    }
}
