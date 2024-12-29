<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/ddd',[AuthController::class, 'register']);
Route::post('/register',[AuthController::class, 'processRegister'])->name('register');

Route::get('/',[AuthController::class, 'index']);
Route::post('/login',[AuthController::class, 'authenticate'])->name('register');

