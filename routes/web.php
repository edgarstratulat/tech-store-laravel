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

Route::get('/{categorySlug}/{subcategorySlug}/{slug}', [ProductsController::class, 'ProductSlug']);

//Promocoes
Route::get('/promotions', [DiscountProductsController::class, 'showDiscountProducts']);

Route::middleware(['auth', 'permission:Manage Store'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'showAdminPanel']);
    Route::get('dashboard/produtos', [ProductsController::class, 'showProducts']);
    Route::get('dashboard/produtos/adicionar', [CreateProductController::class, 'showProducts']);
    Route::post('dashboard/produtos/adicionar', [CreateProductController::class, 'createProducts']);
    Route::get('dashboard/produtos/atualizar', [UpdateProductController::class, 'showUpdateProductsForm']);
    Route::put('dashboard/produtos/atualizar', [UpdateProductController::class, 'updateProduct']);
    Route::get('dashboard/produtos/eliminar', [DeleteProductController::class, 'showDeleteForm']);
    Route::delete('dashboard/produtos/eliminar', [DeleteProductController::class, 'DeleteProducts']);
});

// Telemoveis
Route::prefix('smartphones')->group(function () {
    Route::get('/', [SmartphonesController::class, 'showSmartphones'])->name('telemoveis');
    Route::get('iphone', [SmartphonesController::class, 'showIphoneSmartphone'])->name('iphone');
    Route::get('android', [SmartphonesController::class, 'showAndroidSmartphone'])->name('android');
});

//Componentes PC
Route::prefix('components')->group(function () {
    Route::get('/', [ComponentsController::class, 'showComponents'])->name('componentes');
    Route::get('processors', [ComponentsController::class, 'showCPU'])->name('processadores');
    Route::get('motherboards', [ComponentsController::class, 'showMotherboards'])->name('motherboards');
    Route::get('graphic-cards', [ComponentsController::class, 'showGPU'])->name('placas-graficas');
    Route::get('ram-memory', [ComponentsController::class, 'showRAM'])->name('memoria-ram');
    Route::get('storage', [ComponentsController::class, 'showArmazenamento'])->name('armazenamento');
    Route::get('power-supplies', [ComponentsController::class, 'showFontes'])->name('fontes-de-alimentacao');
    Route::get('computer-cases', [ComponentsController::class, 'showCaixas'])->name('caixas-para-computadores');
    Route::get('cpu-coolers', [ComponentsController::class, 'showCPUCoolers'])->name('cpu-coolers');
});

//Perifericos
Route::prefix('perifericos')->group(function () {
    Route::get('/', [PeripheralsController::class, 'showPeripherals'])->name('perifericos');
    Route::get('ratos-e-teclados', [PeripheralsController::class, 'showPeripheralsMouseAndKeyboard'])->name('ratos-e-teclados');
    Route::get('audio', [PeripheralsController::class, 'showPeripheralsAudio'])->name('audio');
    Route::get('monitores', [PeripheralsController::class, 'showPeripheralsMonitor'])->name('monitores');
    Route::get('video', [PeripheralsController::class, 'showPeripheralsVideo'])->name('video');
});

//Computador
Route::prefix('computers')->group(function () {
    Route::get('/', [ComputersController::class, 'showComputers']);
    Route::get('laptops', [ComputersController::class, 'showLaptopsComputers']);
    Route::get('desktop', [ComputersController::class, 'showDesktopComputers']);
});

//Registo
Route::get('/registo', [LoginRegisterController::class, 'showPageRegister']);
Route::post('/registo', [LoginRegisterController::class, 'createUser']);

// Login & Logout
Route::get('/login', [LoginRegisterController::class, 'showPageLogin'])->name('login');
Route::post('/login', [LoginRegisterController::class, 'userAuth']);
Route::get('/logout', [LoginRegisterController::class, 'userLogout']);