<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

//Product Controller
Route::get('/', [ProductController::class, 'showProductsHome']);

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produtos/{id}', [ProductController::class, 'show']);

Route::middleware('auth')->get('/produto/adicionar', [ProductController::class, 'showProducts']);
Route::middleware('auth')->post('/produto/adicionar', [ProductController::class, 'createProducts']);

//User Controller
Route::get('/registo', [UserController::class, 'showPageRegister']);
Route::post('/registo', [UserController::class, 'createUser']);

// Login Controller
Route::get('/login', [LoginController::class, 'showPageLogin'])->name('login');
Route::post('/login', [LoginController::class, 'userAuth'])->name('login');

Route::get('/logout', [LoginController::class, 'userLogout']);