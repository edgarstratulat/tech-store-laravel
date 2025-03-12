<?php

namespace App\Http\Controllers;

use App\Models\Acessorio;
use App\Models\Button;
use App\Models\Promocoes;
use App\Models\Telemovel;
use App\Models\ComponentePC;
use App\Models\Periferico;
use App\Models\Computer;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // Promocoes

    public function indexPromocoes()
    {
        $promo = Promocoes::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        $buttons = Button::all();

        return Inertia::render('promoPage', [
            'Promocoes' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showPromocoes($id)
    {
        $promo = Promocoes::find($id);
        $buttons = Button::all();

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
        ]);
    }

    //Perifericos
    
    public function indexPerifericos(Request $request)
    {

        $subCategory = $request->query('periferico');

        $peri = Periferico::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        $button = Button::all();

        if($subCategory === 'ratos-e-teclados'){
            $ratoTeclado = Periferico::where('subCategory', 'ratos-e-teclados')->get();
            return Inertia::render('Perifericos/RatoTecladoPage', [
                'Perifericos' => $ratoTeclado,
                'Utilizador' => Auth::user(),
                'Buttons' => $button
            ]);
        }

        if($subCategory === 'pc-audio'){
            $pcaudio = Periferico::where('subCategory', 'pc-audio')->get();
            return Inertia::render('Perifericos/PCAudioPage', [
                'Perifericos' => $pcaudio,
                'Utilizador' => Auth::user(),
                'Buttons' => $button
            ]);
        }

        if($subCategory === 'monitores'){
            $monitores = Periferico::where('subCategory', 'monitores')->get();
            return Inertia::render('Perifericos/MonitorPage', [
                'Perifericos' => $monitores,
                'Utilizador' => Auth::user(),
                'Buttons' => $button
            ]);
        }

        if($subCategory === 'webcams'){
            $webcam = Periferico::where('subCategory', 'webcams')->get();
            return Inertia::render('Perifericos/WebcamPage', [
                'Perifericos' => $webcam,
                'Utilizador' => Auth::user(),
                'Buttons' => $button
            ]);
        }

        return Inertia::render('Perifericos/perifericosPage', [
            'Perifericos' => $peri,
            'Utilizador' => Auth::user(),
            'Buttons' => $button
        ]);
    }

    public function showPerifericos($subCategory, $id)
    {
        $promo = Periferico::find($id);

        $buttons = Button::all();

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
        ]);
    }

    //Acessorios
    public function indexAcessorios(Request $request)
    {

        $subCategory = $request->query('acessorio');

        $aces = Acessorio::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        $button = Button::all();

        if($subCategory === 'acessorios-para-computador'){
            $comp = Acessorio::where('subCategory', 'acessorios-para-computador')->get();
            return Inertia::render('Acessorios/AcessoriosPcPage', [
                'Acessorio' => $comp,
                'Utilizador' => Auth::user(),
                'Buttons' => $button    
            ]);
        }


        if($subCategory === 'acessorios-para-smartphone'){
            $smart = Acessorio::where('subCategory', 'acessorios-para-smartphone')->get();
            return Inertia::render('Acessorios/AcessoriosSmartPhonePage', [
                'Acessorio' => $smart,
                'Utilizador' => Auth::user(),
                'Buttons' => $button 
            ]);
        }
        
        if($subCategory === 'acessorios-para-casa'){
            $casa = Acessorio::where('subCategory', 'acessorios-para-casa')->get();
            return Inertia::render('Acessorios/AcessorioscasaPage', [
                'Acessorio' => $casa,
                'Utilizador' => Auth::user(),
                'Buttons' => $button 
            ]);
        }

        return Inertia::render('Acessorios/acessoriosPage', [
            'Acessorio' => $aces,
            'Utilizador' => Auth::user(),
            'Buttons' => $button
            ]);
    }

    public function showAcessorios($subCategory, $id)
    {
        $ace = Acessorio::find($id);

        $buttons = Button::all();

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $ace,
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
        ]);
    }

    //Computadores
    public function indexComputadores(Request $request)
    {

        $subCategory = $request->query('computador');

        $pc = Computer::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();

        $buttons = Button::all();

        if($subCategory === 'desktop'){
            $desktop = Computer::where('subCategory', 'desktop')->get();
            return Inertia::render('Computadores/DesktopPage', [
                'Computer' => $desktop,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
        }

        if($subCategory === 'gaming'){
            $gaming = Computer::where('subCategory', 'gaming')->get();
            return Inertia::render('Computadores/GamingPage', [
                'Computer' => $gaming,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
        }

        if($subCategory === 'laptop'){
            $gaming = Computer::where('subCategory', 'laptop')->get();
            return Inertia::render('Computadores/LaptopPage', [
                'Computer' => $gaming,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
        }

        if($subCategory === 'workstation'){
            $gaming = Computer::where('subCategory', 'workstation')->get();
            return Inertia::render('Computadores/workstationPage', [
                'Computer' => $gaming,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
        }

        if($subCategory === 'micro-computadores'){
            $gaming = Computer::where('subCategory', 'micro-computadores')->get();
            return Inertia::render('Computadores/MicroPcPage', [
                'Computer' => $gaming,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
        }

        return Inertia::render('Computadores/computadoresPage', [
            'Computer' => $pc,
            'Utilizador' => Auth::user(),
            'Buttons' => $buttons
        ]);
    }

    public function showComputadores($subCategory, $id)
    {
        $promo = Computer::find($id);

        $buttons = Button::all();

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
        ]);
    }
}