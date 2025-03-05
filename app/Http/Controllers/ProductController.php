<?php

namespace App\Http\Controllers;

use App\Models\Promocoes;
use App\Models\Telemovel;
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

    public function indexTelemoveis()
    {
        $tel = Telemovel::all();

        return Inertia::render('telemoveisPage', [
            'Telemovel' => $tel,
        ]);
    }

    public function showTelemoveis($id)
    {
        $promo = Telemovel::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo
        ]);
    }

    
}
