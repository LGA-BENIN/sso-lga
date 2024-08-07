<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', function () {
    return view('home');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('auth/redirect', [App\Http\Controllers\AuthController::class, 'redirectToGoogle']);
Route::get('auth/callback/google', [App\Http\Controllers\AuthController::class, 'handleGoogleCallback']);

// Routes de réinitialisation de mot de passe...
Route::get('/password/forgot', [AuthController::class, 'showForgotForm'])->name('forgot.password.from');
Route::post('/password/forgot', [AuthController::class, 'sendResetLink'])->name('forgot.password.link');
Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('reset.password.from');
Route::post('/password/reset', [AuthController::class, 'resetPassword'])->name('reset.password');
