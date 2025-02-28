<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreateProductController;
use App\Http\Controllers\HomeController;

//Home Controller
Route::get('/', [HomeController::class, 'showProductsHome']);

Route::get('/promocoes', [ProductController::class, 'index']);
Route::get('/produtos/{id}', [ProductController::class, 'show']);

Route::middleware('auth')->get('/produto/adicionar', [CreateProductController::class, 'showProducts']);
Route::middleware('auth')->post('/produto/adicionar', [CreateProductController::class, 'createProducts']);

//User Controller
Route::get('/registo', [UserController::class, 'showPageRegister']);
Route::post('/registo', [UserController::class, 'createUser']);

// Login Controller
Route::get('/login', [LoginController::class, 'showPageLogin'])->name('login');
Route::post('/login', [LoginController::class, 'userAuth'])->name('login');

Route::get('/logout', [LoginController::class, 'userLogout']);