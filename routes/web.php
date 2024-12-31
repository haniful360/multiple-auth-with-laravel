<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('frontend.home');
});



Route::prefix('account')->group(function ()  {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'processRegister'])->name('process.register');

    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
});




// Route::group(['middleware' => 'auth'])->group(function () {});

Route::middleware(['middleware', 'auth'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});


// github authentication
Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirectToProvider'])->name('auth.redirect');
Route::get('/auth/callback/{provider}', [SocialController::class, 'handleProviderCallback'])->name('auth.callback');
