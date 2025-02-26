<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Models\Produto;

Route::get('/', function () {
    return Inertia::render('home');
});

Route::get('/produtos', [ProductController::class, 'index']);
Route::get('/produtos/{id}', [ProductController::class, 'show']);

Route::get('/produto/adicionar', [ProductController::class, 'showProducts']);
Route::post('/produto/adicionar', [ProductController::class, 'createProducts']);