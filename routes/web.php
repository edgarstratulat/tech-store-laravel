<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreateProductController;
use App\Http\Controllers\HomeController;

//Home
Route::get('/', [HomeController::class, 'showProductsHome']);

//Promocoes
Route::get('/promocoes', [ProductController::class, 'indexPromocoes']);
Route::get('/promocoes/{id}', [ProductController::class, 'showPromocoes']);

//Add produtos
Route::middleware('auth')->get('/produto/adicionar', [CreateProductController::class, 'showProducts']);
Route::middleware('auth')->post('/produto/adicionar', [CreateProductController::class, 'createProducts']);

// Telemoveis
Route::get('/telemoveis', [ProductController::class, 'indexTelemoveis']);
Route::get('/telemoveis/{subCategory}/{id}', [ProductController::class, 'showTelemoveis']);

//Componentes PC
Route::get('/componentes-para-pc', [ProductController::class, 'indexComponentes']);
Route::get('/componentes-para-pc/{subCategory}/{id}', [ProductController::class, 'showComponentePC']);

//Perifericos
Route::get('/perifericos', [ProductController::class, 'indexPerifericos']);
Route::get('/perifericos/{subCategory}/{id}', [ProductController::class, 'showPerifericos']);

//Acessorios
Route::get('/acessorios', [ProductController::class, 'indexAcessorios']);
Route::get('/acessorios/{subCategory}/{id}', [ProductController::class, 'showAcessorios']);

//Computador
Route::get('/computadores', [ProductController::class, 'indexComputadores']);
Route::get('/computadores/{id}', [ProductController::class, 'showComputadores']);


//Registo
Route::get('/registo', [UserController::class, 'showPageRegister']);
Route::post('/registo', [UserController::class, 'createUser']);

// Login & Logout
Route::get('/login', [LoginController::class, 'showPageLogin'])->name('login');
Route::post('/login', [LoginController::class, 'userAuth'])->name('login');
Route::get('/logout', [LoginController::class, 'userLogout']);