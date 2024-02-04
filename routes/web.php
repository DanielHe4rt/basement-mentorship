<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
})->name('landing');


Route::get('/oauth/{provider}/redirect', [AuthController::class, 'getRedirect'])->name('auth.redirect');
Route::get('/oauth/{provider}/callback', [AuthController::class, 'getAuthenticate'])->name('auth.store');
