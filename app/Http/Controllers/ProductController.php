<?php

namespace App\Http\Controllers;

use App\Models\Acessorio;
use App\Models\Promocoes;
use App\Models\Telemovel;
use App\Models\ComponentePC;
use App\Models\Periferico;
use App\Models\Computer;
use Inertia\Inertia;

class ProductController extends Controller
{

    // Promocoes

    public function indexPromocoes()
    {
        $promo = Promocoes::all();

        return Inertia::render('promoPage', [
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

    //Perifericos
    
    public function indexPerifericos()
    {
        $peri = Periferico::all();

        return Inertia::render('perifericosPage', [
            'Perifericos' => $peri
        ]);
    }

    public function showPerifericos($id)
    {
        $promo = Periferico::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }

    //Acessorios
    public function indexAcessorios()
    {
        $peri = Acessorio::all();

        return Inertia::render('acessoriosPage', [
            'Acessorio' => $peri
        ]);
    }

    public function showAcessorios($id)
    {
        $ace = Acessorio::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $ace,
        ]);
    }

    //Computadores
    public function indexComputadores()
    {
        $pc = Computer::all();

        return Inertia::render('computadoresPage', [
            'Computer' => $pc
        ]);
    }

    public function showComputadores($id)
    {
        $promo = Computer::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }
}
