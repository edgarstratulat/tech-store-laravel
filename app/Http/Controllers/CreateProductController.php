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
            'desc' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        Produto::create($createProductsValidation);

        return Inertia::location('/');
    
    }

}
