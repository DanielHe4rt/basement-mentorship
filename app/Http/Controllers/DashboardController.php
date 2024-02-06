<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOnboardRequest;
use App\Models\Module;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        return view('welcome');
    }

    public function getOnboarding()
    {
        return view('onboarding', [
            'user' => request()->user(),
        ]);
    }

    public function postOnboarding(StoreOnboardRequest $request)
    {
        $user = request()->user();
        $user->details()->create($request->validated());

        return redirect()->route('dashboard');
    }
}
