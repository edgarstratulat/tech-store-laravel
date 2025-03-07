<?php

namespace App\Http\Controllers;

use App\Models\Acessorio;
use App\Models\Promocoes;
use App\Models\Telemovel;
use App\Models\ComponentePC;
use App\Models\Periferico;
use App\Models\Computer;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    // Promocoes

    public function indexPromocoes()
    {
        $promo = Promocoes::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        return Inertia::render('promoPage', [
            'Promocoes' => $promo,
            'Utilizador' => Auth::user(),
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
        $tel = Telemovel::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();

        return Inertia::render('telemoveisPage', [
            'Telemovel' => $tel,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showIphones(){
        $iphone = Telemovel::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->where('subCategory', 'iphone')->get();

        return Inertia::render('iphonePage', [
            'Telemovel' => $iphone,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showAndroid(){
        $android = Telemovel::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->where('subCategory', 'android')->get();

        return Inertia::render('androidPage', [
            'Telemovel' => $android,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showTelemoveis($subCategory,$id)
    {
        $promo = Telemovel::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }


    // Componentes

    public function indexComponentes()
    {

        $componentesPC = ComponentePC::select('id', 'name', 'price', 'sale_price', 'desc', 'image_path', 'stock')->get();

        return Inertia::render('componentePcPage', [
            'Componentes' => $componentesPC,
            'Utilizador' => Auth::user(),
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
        $peri = Periferico::select('id', 'name', 'price', 'sale_price', 'desc', 'image_path', 'stock')->get();

        return Inertia::render('perifericosPage', [
            'Perifericos' => $peri,
            'Utilizador' => Auth::user(),
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
        $peri = Acessorio::select('id', 'name', 'price', 'sale_price', 'desc', 'image_path', 'stock')->get();

        return Inertia::render('acessoriosPage', [
            'Acessorio' => $peri,
            'Utilizador' => Auth::user(),
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
        $pc = Computer::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();

        return Inertia::render('computadoresPage', [
            'Computer' => $pc,
            'Utilizador' => Auth::user(),
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
