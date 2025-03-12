<?php

use App\Http\Controllers\Componentes\ComponentesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreateProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Telemovel\TelemovelController;

//Home
Route::get('/', [HomeController::class, 'showProductsHome']);

//Promocoes
Route::get('/promocoes', [ProductController::class, 'indexPromocoes']);
Route::get('/promocoes/{id}', [ProductController::class, 'showPromocoes']);

//Add produtos
Route::middleware('auth')->get('/produto/adicionar', [CreateProductController::class, 'showProducts']);
Route::middleware('auth')->post('/produto/adicionar', [CreateProductController::class, 'createProducts']);

// Telemoveis
Route::get('/telemoveis', [TelemovelController::class, 'indexTelemoveis']);
Route::get('/telemoveis/iphone', [TelemovelController::class, 'IphoneShowTelemoveis']);
Route::get('/telemoveis/android', [TelemovelController::class, 'AndroidShowTelemoveis']);
Route::get('/telemoveis/{subCategory}/{id}', [TelemovelController::class, 'showTelemoveis']);

//Componentes PC
Route::get('/componentes', [ComponentesController::class, 'indexComponentes']);
Route::get('/componentes/processadores', [ComponentesController::class, 'showProcessadores']);
Route::get('/componentes/motherboards', [ComponentesController::class, 'showMotherboards']);
Route::get('/componentes/placas-graficas', [ComponentesController::class, 'showGPU']);
Route::get('/componentes/memorias-ram', [ComponentesController::class, 'showRAM']);
Route::get('/componentes/armazenamento', [ComponentesController::class, 'showArmazenamento']);
Route::get('/componentes/fontes-de-alimentacao', [ComponentesController::class, 'showFontes']);
Route::get('/componentes/caixas-de-computadores', [ComponentesController::class, 'showCaixas']);
Route::get('/componentes/{subCategory}/{id}', [ComponentesController::class, 'showComponentePC']);

//Perifericos
Route::get('/perifericos', [ProductController::class, 'indexPerifericos']);
Route::get('/perifericos/{subCategory}/{id}', [ProductController::class, 'showPerifericos']);

//Acessorios
Route::get('/acessorios', [ProductController::class, 'indexAcessorios']);
Route::get('/acessorios/{subCategory}/{id}', [ProductController::class, 'showAcessorios']);

//Computador
Route::get('/computadores', [ProductController::class, 'indexComputadores']);
Route::get('/computadores/{subCategory}/{id}', [ProductController::class, 'showComputadores']);


//Registo
Route::get('/registo', [UserController::class, 'showPageRegister']);
Route::post('/registo', [UserController::class, 'createUser']);

// Login & Logout
Route::get('/login', [LoginController::class, 'showPageLogin']);
Route::post('/login', [LoginController::class, 'userAuth']);
Route::get('/logout', [LoginController::class, 'userLogout']);