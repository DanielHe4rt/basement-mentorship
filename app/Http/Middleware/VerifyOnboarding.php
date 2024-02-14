<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyOnboarding
{

    public function handle(Request $request, Closure $next): Response
    {
        if (request()->user()->onboarded) {
            return $next($request);
        }

        return redirect()->route('onboarding');

    }
}
