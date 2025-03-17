<?php

namespace App\Http\Controllers\Perifericos;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Periferico;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PerifericosController extends Controller
{
    public function indexPerifericos() 
    {
        $peri = Periferico::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;


        return Inertia::render('Perifericos/perifericosPage', [
            'Perifericos' => $peri,
            'Buttons' => $button,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }

    public function showRatoSeTeclados() 
    {

        $ratoTeclado = Periferico::where('subCategory', 'ratos-e-teclados')->get();

        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('Perifericos/RatoTecladoPage', [
            'Perifericos' => $ratoTeclado,
            'Buttons' => $button,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }

    public function showPcAudio() 
    {

        $ratoTeclado = Periferico::where('subCategory', 'pc-audio')->get();

        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('Perifericos/PCAudioPage', [
            'Perifericos' => $ratoTeclado,
            'Buttons' => $button,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }

    public function showMonitores() 
    {

        $ratoTeclado = Periferico::where('subCategory', 'monitores')->get();

        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('Perifericos/MonitorPage', [
            'Perifericos' => $ratoTeclado,
            'Buttons' => $button,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }

    public function showWebcams() 
    {

        $ratoTeclado = Periferico::where('subCategory', 'webcams')->get();

        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('Perifericos/WebcamPage', [
            'Perifericos' => $ratoTeclado,
            'Buttons' => $button,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }

    public function showPerifericos($subCategory, $id)
    {
        $promo = Periferico::find($id);

        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }
}
