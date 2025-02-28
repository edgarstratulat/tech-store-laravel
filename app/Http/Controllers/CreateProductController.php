<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Produto;

class CreateProductController extends Controller
{
    public function showProducts() {
        return Inertia::render('addProduto');
    }

    public function createProducts(Request $request) {
        $createProductsValidation = $request->validate([
            'name' => 'required|min:2',
            'price' => 'numeric',
            'desc' => 'required|max:255'
        ]);

        Produto::create($createProductsValidation);

        return Inertia::render('home', [
            'produtos' => Produto::all()
        ]);

        return Inertia::location('/');
    
    }
}
