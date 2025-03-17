<?php

use App\Http\Controllers\Acessorios\AcessoriosController;
use App\Http\Controllers\Componentes\ComponentesController;
use App\Http\Controllers\Computadores\ComputadoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Products\CreateProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Perifericos\PerifericosController;
use App\Http\Controllers\Products\DeleteProductController;
use App\Http\Controllers\Products\UpdateProductController;
use App\Http\Controllers\Telemovel\TelemovelController;
use App\Http\Controllers\Users\LoginRegisterController;


//Home
Route::get('/', [HomeController::class, 'showProductsHome']);

//Promocoes
Route::get('/promocoes', [ProductController::class, 'indexPromocoes']);
Route::get('/promocoes/{id}', [ProductController::class, 'showPromocoes']);


//Add produtos
Route::middleware('auth', 'permission:Manage Store')->get('/produto/adicionar', [CreateProductController::class, 'showProducts']);
Route::middleware('auth')->post('/produto/adicionar', [CreateProductController::class, 'createProducts']);

//Change Products
Route::middleware('auth', 'permission:Manage Store')->get('/produto/atualizar', [UpdateProductController::class, 'showUpdateProductsForm']);
Route::middleware('auth')->put('/produto/atualizar', [UpdateProductController::class, 'updateProduct']);

//Delete Products
Route::middleware('auth', 'permission:Manage Store')->get('/produto/eliminar', [DeleteProductController::class,'showDeleteForm']);
Route::middleware('auth')->delete('/produto/eliminar/{id}', [DeleteProductController::class, 'DeleteProducts']);

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
Route::get('/componentes/cpu-coolers', [ComponentesController::class, 'showCPUCoolers']);
Route::get('/componentes/{subCategory}/{id}', [ComponentesController::class, 'showComponentePC']);

//Perifericos
Route::get('/perifericos', [PerifericosController::class, 'indexPerifericos']);
Route::get('/perifericos/ratos-e-teclados', [PerifericosController::class, 'showRatoSeTeclados']);
Route::get('/perifericos/pc-audio', [PerifericosController::class, 'showPcAudio']);
Route::get('/perifericos/monitores', [PerifericosController::class, 'showMonitores']);
Route::get('/perifericos/webcams', [PerifericosController::class, 'showWebcams']);
Route::get('/perifericos/{subCategory}/{id}', [PerifericosController::class, 'showPerifericos']);

//Acessorios
Route::get('/acessorios', [AcessoriosController::class, 'indexAcessorios']);
Route::get('/acessorios/acessorios-para-computador', [AcessoriosController::class, 'AcessoriosPC']);
Route::get('/acessorios/acessorios-para-casa', [AcessoriosController::class, 'AcessoriosCasa']);
Route::get('/acessorios/acessorios-para-telemovel', [AcessoriosController::class, 'AcessoriosTel']);
Route::get('/acessorios/{subCategory}/{id}', [AcessoriosController::class, 'showAcessorios']);

//Computador
Route::get('/computadores', [ComputadoresController::class, 'indexComputadores']);
Route::get('/computadores/gaming', [ComputadoresController::class, 'showGamingPC']);
Route::get('/computadores/portateis', [ComputadoresController::class, 'showPortatil']);
Route::get('/computadores/workstations', [ComputadoresController::class, 'showWorkstation']);
Route::get('/computadores/micro-computadores', [ComputadoresController::class, 'showMicroPC']);
Route::get('/computadores/desktop', [ComputadoresController::class, 'showDesktopPC']);
Route::get('/computadores/cpu-coolers', [ComputadoresController::class, 'showCPUCoolers']);
Route::get('/computadores/{subCategory}/{id}', [ComputadoresController::class, 'showComputadores']);

//Registo
Route::get('/registo', [LoginRegisterController::class, 'showPageRegister']);
Route::post('/registo', [LoginRegisterController::class, 'createUser']);

// Login & Logout
Route::get('/login', [LoginRegisterController::class, 'showPageLogin'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'userAuth']);
Route::get('/logout', [LoginRegisterController::class, 'userLogout']);