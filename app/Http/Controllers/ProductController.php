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

    public function show($id)
    {
        $produtos = Produto::find($id);

        return Inertia::render('produto', [
            'produto' => $produtos
        ]);
    }

    public function showProducts() {
        return Inertia::render('addProduto');
    }

    public function createProducts() {
        Produto::create([
            'name' => request('name'),
            'price' => request('price'),
            'desc' => request('desc')
        ]);
    
        return redirect('/produtos');
    }
}
