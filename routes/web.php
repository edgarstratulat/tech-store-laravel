<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', [ProductController::class, 'showProductsHome']);

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produtos/{id}', [ProductController::class, 'show']);

Route::middleware('auth')->get('/produto/adicionar', [ProductController::class, 'showProducts']);
Route::middleware('auth')->post('/produto/adicionar', [ProductController::class, 'createProducts']);

Route::get('/registo', [UserController::class, 'showPageRegister']);
Route::post('/registo', [UserController::class, 'createUser']);

Route::get('/login', [UserController::class, 'showPageLogin'])->name('login');
Route::post('/login', [UserController::class, 'userAuth'])->name('login');

Route::get('/logout', [UserController::class, 'userLogout']);