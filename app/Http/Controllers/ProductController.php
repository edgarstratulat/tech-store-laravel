<?php

namespace App\Http\Controllers;

use App\Models\Promocoes;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $promo = Promocoes::all();

        return Inertia::render('produtosPage', [
            'Promocoes' => $promo,
        ]);
    }

    public function show($id)
    {
        $promo = Promocoes::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo
        ]);
    }
}
