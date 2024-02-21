<?php

use App\Events\AttendanceAccepted;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\TasksController;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'getLanding'])
    ->name('landing');

if(config('app.env') === 'local') {
    Route::get('/mailable', function () {
        $mailable = (new MailMessage)
            ->subject('Mentorias Fodas')
            ->line('Se você está recebendo esse e-mail, significa que você foi aprovado/a em nossa mentoria!')
            ->line('A trilha selecionada foi **' . 'trilha-foda' .  '**, e você deverá concluí-la na maior calma do mundo!')
            ->line("Como isso é um processo de aprimoramento, eu gostaria MUITO que você fizesse as tarefas utilizando os meios comuns de estudo.")
            ->line('')
            ->action('Começar Trilha', route('module.index'));

        return $mailable;
    });
}



Route::get('/oauth/{provider}/redirect', [AuthController::class, 'getRedirect'])->name('auth.redirect');
Route::get('/oauth/{provider}/callback', [AuthController::class, 'getAuthenticate'])->name('auth.store');
Route::post('/oauth/logout', [AuthController::class, 'postLogout'])
    ->middleware('auth')
    ->name('auth.logout');

Route::get('/dashboard', [DashboardController::class, 'getDashboard'])
    ->middleware(['auth', 'onboarded'])
    ->name('dashboard');

Route::prefix('onboarding')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [OnboardingController::class, 'getOnboarding'])->name('onboarding');
        Route::post('/', [OnboardingController::class, 'postOnboarding'])->name('onboarding.store');
    });


Route::prefix('/modules')
    ->middleware(['auth', 'onboarded'])
    ->group(function () {
        Route::get('/', [ModulesController::class, 'getModules'])->name('module.index');
        Route::post('/{module}/init', [ModulesController::class, 'postInitModule'])->name('module.init');
        Route::prefix('/{module}')
            ->middleware('module.attendance')
            ->group(function () {
                Route::get('/', [ModulesController::class, 'getModule'])->name('modules.show');
                Route::post('/tasks/{task}/init', [TasksController::class, 'postInitTask'])->name('tasks.init');
                Route::post('/tasks/{progress}/{action}', [TasksController::class, 'postTaskAction'])->name('tasks.action');
                Route::get('/tasks/{taskProgress}', [TasksController::class, 'getTask'])->name('tasks.show');
            });
    });


