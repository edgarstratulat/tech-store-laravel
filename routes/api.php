<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\ComputerApiController;
use App\Http\Controllers\UserController;
use App\Models\Computador;
use App\Models\User;

Route::get('/', function () {
    return Inertia::render('home');
});

Route::get('/login', [UserController::class, 'showLoginForm']);
Route::get('/register', [UserController::class, 'registerForm']);

Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::get('/computadores', [ComputerController::class, 'index']);
Route::get('/computadores/{id}', [ComputerController::class, 'show']);

Route::get('api/computadores', [ComputerApiController::class, 'index']);
Route::get('api/computadores/{id}', [ComputerApiController::class, 'show']);

Route::post('api/computadores', [ComputerController::class, 'store']);
Route::put('api/computadores/{id}', [ComputerController::class, 'update']);
Route::delete('api/computadores/{id}', [ComputerController::class, 'destroy']);

