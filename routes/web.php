<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Products\CreateProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\Products\DeleteProductController;
use App\Http\Controllers\Admin\Products\UpdateProductController;
use App\Http\Controllers\Users\LoginRegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Products\ProductsController;
use App\Http\Controllers\Products\AccessoriesController;
use App\Http\Controllers\Products\ComponentsController;
use App\Http\Controllers\Products\ComputersController;
use App\Http\Controllers\Products\DiscountProductsController;
use App\Http\Controllers\Products\PeripheralsController;
use App\Http\Controllers\Products\SmartphonesController;
use App\Http\Controllers\SearchController;

//Home
Route::get('/', [HomeController::class, 'showProductsHome']);
Route::get('/search', [SearchController::class, 'SearchProduct']);

//Promocoes
Route::get('/promocoes', [DiscountProductsController::class, 'showDiscountProducts']);

//Admin Dashboard
Route::middleware(['auth', 'permission:Manage Store'])->get('/dashboard', [AdminController::class, 'showAdminPanel']);

//Show Products
Route::middleware(['auth', 'permission:Manage Store'])->get('/dashboard/produtos', [ProductsController::class, 'showProducts']);

//Add produtos
Route::middleware(['auth', 'permission:Manage Store'])->get('/dashboard/produtos/adicionar', [CreateProductController::class, 'showProducts']);
Route::middleware(['auth', 'permission:Manage Store'])->post('/dashboard/produtos/adicionar', [CreateProductController::class, 'createProducts']);

//Change Products
Route::middleware(['auth', 'permission:Manage Store'])->get('/dashboard/produtos/atualizar', [UpdateProductController::class, 'showUpdateProductsForm']);
Route::middleware(['auth', 'permission:Manage Store'])->put('/dashboard/produtos/atualizar', [UpdateProductController::class, 'updateProduct']);

//Delete Products
Route::middleware(['auth', 'permission:Manage Store'])->get('/dashboard/produtos/eliminar', [DeleteProductController::class,'showDeleteForm']);
Route::middleware(['auth', 'permission:Manage Store'])->delete('/dashboard/produtos/eliminar/{id}', [DeleteProductController::class, 'DeleteProducts']);


Route::get('/{categorySlug}/{subcategorySlug}/{slug}', [ProductsController::class, 'ProductSlug']);


// Telemoveis
Route::get('/telemoveis', [SmartphonesController::class, 'showSmartphones']);
Route::get('/telemoveis/iphone', [SmartphonesController::class, 'showIphoneSmartphone']);
Route::get('/telemoveis/android', [SmartphonesController::class, 'showAndroidSmartphone']);

//Componentes PC
Route::get('/componentes', [ComponentsController::class, 'showComponents']);
Route::get('/componentes/processadores', [ComponentsController::class, 'showCPU']);
Route::get('/componentes/motherboards', [ComponentsController::class, 'showMotherboards']);
Route::get('/componentes/placas-graficas', [ComponentsController::class, 'showGPU']);
Route::get('/componentes/memoria-ram', [ComponentsController::class, 'showRAM']);
Route::get('/componentes/armazenamento', [ComponentsController::class, 'showArmazenamento']);
Route::get('/componentes/fontes-de-alimentacao', [ComponentsController::class, 'showFontes']);
Route::get('/componentes/caixas-para-computadores', [ComponentsController::class, 'showCaixas']);
Route::get('/componentes/cpu-coolers', [ComponentsController::class, 'showCPUCoolers']);

//Perifericos
Route::get('/perifericos', [PeripheralsController::class, 'showPeripherals']);
Route::get('/perifericos/ratos-e-teclados', [PeripheralsController::class, 'showPeripheralsMouseAndKeyboard']);
Route::get('/perifericos/audio', [PeripheralsController::class, 'showPeripheralsAudio']);
Route::get('/perifericos/monitores', [PeripheralsController::class, 'showPeripheralsMonitor']);
Route::get('/perifericos/video', [PeripheralsController::class, 'showPeripheralsVideo']);

//Acessorios
Route::get('/acessorios', [AccessoriesController::class, 'showAccessories']);
Route::get('/acessorios/acessorios-para-computador', [AccessoriesController::class, 'showAccessoriesForComputer']);
Route::get('/acessorios/acessorios-para-casa', [AccessoriesController::class, 'showAccessoriesForHome']);
Route::get('/acessorios/acessorios-para-telemovel', [AccessoriesController::class, 'showAccessoriesForSmartphone']);


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