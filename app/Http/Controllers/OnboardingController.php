<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOnboardRequest;
use Illuminate\View\View;

class OnboardingController extends Controller
{
    public function getOnboarding(): View
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
