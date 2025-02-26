<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ComputerController;
use App\Models\Produto;

Route::get('/', function () {
    return Inertia::render('home');
});

Route::get('/produtos', [ComputerController::class, 'index']);
Route::get('/produtos/{id}', [ComputerController::class, 'show']);

Route::get('/produto/adicionar', function () {
    return Inertia::render('addProduto');
});

Route::post('/produto/adicionar', function() {
    Produto::create([
        'name' => request('name'),
        'price' => request('price'),
        'desc' => request('desc')
    ]);

    return redirect('/produtos');
});