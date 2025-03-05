<?php

namespace App\Http\Controllers;

use App\Models\Promocoes;
use App\Models\Telemovel;
use App\Models\ComponentePC;
use Inertia\Inertia;

class ProductController extends Controller
{

    // Promocoes

    public function indexPromocoes()
    {
        $promo = Promocoes::all();

        return Inertia::render('produtosPage', [
            'Promocoes' => $promo,
        ]);
    }

    public function showPromocoes($id)
    {
        $promo = Promocoes::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }

    // Telemoveis

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
            'DetalhesProduto' => $promo,
        ]);
    }


    // Componentes

    public function indexComponentes()
    {

        $componentesPC = ComponentePC::all();

        return Inertia::render('componentePcPage', [
            'Componentes' => $componentesPC
        ]);
    }

    public function showComponentePC($id)
    {
        $promo = ComponentePC::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }
    
}
