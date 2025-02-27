<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();

        return Inertia::render('produtos', [
            'Produtos' => $produtos,
        ]);
    }

    public function show($id)
    {
        $produtos = Produto::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $produtos
        ]);
    }
}
