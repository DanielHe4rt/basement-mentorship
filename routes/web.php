<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ModulesController;
use App\Http\Controllers\TasksController;
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

Route::get('/', [DashboardController::class, 'getDashboard'])
    ->name('landing');


Route::get('/oauth/{provider}/redirect', [AuthController::class, 'getRedirect'])->name('auth.redirect');
Route::get('/oauth/{provider}/callback', [AuthController::class, 'getAuthenticate'])->name('auth.store');


Route::prefix('/modules')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [ModulesController::class, 'getModules'])->name('module.index');
        Route::post('/{module}/init', [ModulesController::class, 'postInitModule'])->name('module.init');
        Route::prefix('/{module}')->group(function () {
            Route::get('/', [ModulesController::class, 'getModule'])->name('modules.show');
            Route::post('/tasks/{task}/init', [TasksController::class, 'postInitTask'])->name('tasks.init');
            Route::post('/tasks/{progress}/{action}', [TasksController::class, 'postTaskAction'])->name('tasks.action');
            Route::get('/tasks/{taskProgress}', [TasksController::class, 'getTask'])->name('tasks.show');
        });
    });


