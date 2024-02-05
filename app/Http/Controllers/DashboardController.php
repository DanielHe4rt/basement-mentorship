<?php

namespace App\Http\Controllers;

use App\Models\Module;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        return view('welcome');
    }
}
