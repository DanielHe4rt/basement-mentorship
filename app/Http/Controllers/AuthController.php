<?php

namespace App\Http\Controllers;

use App\Models\Users\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function getRedirect(string $provider): RedirectResponse|JsonResponse
    {
        if ($provider !== "github") {
            return response()->json(['sai daqui' => 'caraio']);
        }

        return Socialite::driver($provider)
            ->scopes(['user:email', 'user'])
            ->redirect();
    }

    public function getAuthenticate(string $provider): RedirectResponse|JsonResponse
    {
        if ($provider !== "github") {
            return response()->json(['sai daqui' => 'caraio']);
        }

        $providerUser = Socialite::driver($provider)->user();


        /** @var User $user */
        $user = User::updateOrCreate([
            'github_id' => $providerUser->getId(),
        ], [
            'github_username' => $providerUser->getNickname(),
            'name' => $providerUser->getName(),
            'email' => $providerUser->getEmail(),
            'description' => $providerUser->user['bio'] ?? '404 Description Not Found'
        ]);

        $user->tokens()->create([
            'access_token' => $providerUser->token,
            'refresh_token' => $providerUser->refreshToken,
        ]);

        Auth::login($user);

        return response()->redirectToRoute('module.index');
    }

    public function postLogout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('landing');
    }
}
