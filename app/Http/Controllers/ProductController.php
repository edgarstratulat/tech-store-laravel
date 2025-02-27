<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $produtos = Produto::all(); 

        return Inertia::render('produtos', [
            'produtos' => $produtos,
        ]);
    }

    public function showProductsHome()
    {
        $produtos = Produto::all(); 

        return Inertia::render('home', [
            'produtos' => $produtos,
        ]);
    }

    public function show($id)
    {
        $produtos = Produto::find($id);

        return Inertia::render('detalhes-produto', [
            'produto' => $produtos
        ]);
    }

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
    
    }
}
