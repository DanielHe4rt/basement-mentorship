<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOnboardRequest;
use App\Models\Users\User;
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
        /** @var User $user */
        $user = request()->user();

        $user->onboard($request->validated());

        return redirect()->route('dashboard');
    }
}
