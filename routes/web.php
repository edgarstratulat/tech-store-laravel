<?php

use App\Http\Controllers\Acessorios\AcessoriosController;
use App\Http\Controllers\Componentes\ComponentesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\Products\CreateProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Products\DeleteProductController;
use App\Http\Controllers\Admin\Products\UpdateProductController;
use App\Http\Controllers\Users\LoginRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Products\ComputersController;
use App\Http\Controllers\Products\DiscountProductsController;
use App\Http\Controllers\Products\PeripheralsController;
use App\Http\Controllers\Products\SmartphonesController;

//Home
Route::get('/', [HomeController::class, 'showProductsHome']);

//Promocoes
Route::get('/promocoes', [DiscountProductsController::class, 'showDiscountProducts']);
Route::get('/promocoes/{id}', [ProductController::class, 'showPromocoes']);

//Admin Dashboard
Route::middleware(['auth', 'permission:Manage Store'])->get('/dashboard', [AdminController::class, 'showAdminPanel']);

//Add produtos
Route::middleware(['auth', 'permission:Manage Store'])->get('/dashboard/produto/adicionar', [CreateProductController::class, 'showProducts']);
Route::middleware(['auth', 'permission:Manage Store'])->post('/dashboard/produto/adicionar', [CreateProductController::class, 'createProducts']);

//Change Products
Route::middleware(['auth', 'permission:Manage Store'])->get('/dashboard/produto/atualizar', [UpdateProductController::class, 'showUpdateProductsForm']);
Route::middleware(['auth', 'permission:Manage Store'])->put('/dashboard/produto/atualizar', [UpdateProductController::class, 'updateProduct']);

//Delete Products
Route::middleware(['auth', 'permission:Manage Store'])->get('/dashboard/produto/eliminar', [DeleteProductController::class,'showDeleteForm']);
Route::middleware(['auth', 'permission:Manage Store'])->delete('/dashboard/produto/eliminar/{id}', [DeleteProductController::class, 'DeleteProducts']);

// Telemoveis
Route::get('/telemoveis', [SmartphonesController::class, 'showSmartphones']);
Route::get('/telemoveis/iphone', [SmartphonesController::class, 'showIphoneSmartphone']);
Route::get('/telemoveis/android', [SmartphonesController::class, 'showAndroidSmartphone']);
// Route::get('/telemoveis/{subCategory}/{id}', [TelemovelController::class, 'showTelemoveis']);

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
Route::get('/perifericos', [PeripheralsController::class, 'showPeripherals']);
Route::get('/perifericos/ratos-e-teclados', [PeripheralsController::class, 'showPeripheralsMouseAndKeyboard']);
Route::get('/perifericos/audio', [PeripheralsController::class, 'showPeripheralsAudio']);
Route::get('/perifericos/monitores', [PeripheralsController::class, 'showPeripheralsMonitor']);
Route::get('/perifericos/video', [PeripheralsController::class, 'showPeripheralsVideo']);
// Route::get('/perifericos/{subCategory}/{id}', [PerifericosController::class, 'showPerifericos']);

//Acessorios
Route::get('/acessorios', [AcessoriosController::class, 'indexAcessorios']);
Route::get('/acessorios/acessorios-para-computador', [AcessoriosController::class, 'AcessoriosPC']);
Route::get('/acessorios/acessorios-para-casa', [AcessoriosController::class, 'AcessoriosCasa']);
Route::get('/acessorios/acessorios-para-telemovel', [AcessoriosController::class, 'AcessoriosTel']);
Route::get('/acessorios/{subCategory}/{id}', [AcessoriosController::class, 'showAcessorios']);

//Computador
Route::get('/computadores', [ComputersController::class, 'showComputers']);
Route::get('/computadores/gaming', [ComputersController::class, 'showGamingComputers']);
Route::get('/computadores/portateis', [ComputersController::class, 'showLaptopsComputers']);
Route::get('/computadores/workstations', [ComputersController::class, 'showWorkStationComputers']);
Route::get('/computadores/micro-computadores', [ComputersController::class, 'showMicroComputers']);
Route::get('/computadores/desktop', [ComputersController::class, 'showDesktopComputers']);


//Registo
Route::get('/registo', [LoginRegisterController::class, 'showPageRegister']);
Route::post('/registo', [LoginRegisterController::class, 'createUser']);

// Login & Logout
Route::get('/login', [LoginRegisterController::class, 'showPageLogin'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'userAuth']);
Route::get('/logout', [LoginRegisterController::class, 'userLogout']);