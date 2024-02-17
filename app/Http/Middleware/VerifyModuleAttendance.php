<?php

namespace App\Http\Middleware;

use App\Enums\Module\ModuleAttendanceEnum;
use App\Models\Module;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyModuleAttendance
{
    /**
     * Handle an module attendance.
     */
    public function handle(Request $request, Closure $next): Response
    {
        /** @var Module $module */
        $module = $request->module;
        $module = Module::find($module->id ?? $module);

        if (!$userModule = $module->users()->find(auth()->user()->getKey())) {
            return $this->redirectWithErrorMessage('Boa pergunta');
        }

        return match ($userModule->pivot->status) {
            ModuleAttendanceEnum::ACCEPTED, ModuleAttendanceEnum::FINISHED => $next($request),
            ModuleAttendanceEnum::ON_HOLD => $this->redirectWithErrorMessage('Caraio')
        };

    }

    private function redirectWithErrorMessage(string $errorMessage): RedirectResponse
    {
        return redirect()
            ->route('module.index')
            ->withErrors($errorMessage);
    }
}
