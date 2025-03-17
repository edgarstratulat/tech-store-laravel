<?php

namespace App\Http\Controllers\Acessorios;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

use App\Models\Acessorio;
use App\Models\Button;

class AcessoriosController extends Controller
{
    public function indexAcessorios()
    {
        $aces = Acessorio::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;


        return Inertia::render('Acessorios/acessoriosPage', [
            'Acessorio' => $aces,
            'Utilizador' => $user,
            'Buttons' => $button,
            'isAdmin' => $isAdmin

            ]);
    }

    public function AcessoriosPC()
    {
        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;


        $comp = Acessorio::where('subCategory', 'acessorios-para-computador')->get();
            return Inertia::render('Acessorios/AcessoriosPcPage', [
                'Acessorio' => $comp,
                'Utilizador' => $user,
                'Buttons' => $button,
                'isAdmin' => $isAdmin    
            ]);
    }

    public function AcessoriosCasa()
    {
        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;


        $comp = Acessorio::where('subCategory', 'acessorios-para-casa')->get();
            return Inertia::render('Acessorios/AcessorioscasaPage', [
                'Acessorio' => $comp,
                'Utilizador' => $user,
                'Buttons' => $button,
                'isAdmin' => $isAdmin    
            ]);
    }

    public function AcessoriosTel()
    {
        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;


        $comp = Acessorio::where('subCategory', 'acessorios-para-telemovel')->get();
            return Inertia::render('Acessorios/AcessoriosSmartPhonePage', [
                'Acessorio' => $comp,
                'Utilizador' => $user,
                'Buttons' => $button,
                'isAdmin' => $isAdmin    
            ]);
    }

    public function showAcessorios($subCategory, $id)
    {
        $ace = Acessorio::find($id);

        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;


        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $ace,
            'Buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }
}
