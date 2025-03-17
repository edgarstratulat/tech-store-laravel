<?php

namespace App\Http\Controllers\Telemovel;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

use App\Models\Telemovel;
use App\Models\Button;


class TelemovelController extends Controller
{
    // Telemoveis
    public function indexTelemoveis()
    {
    
        $tel = Telemovel::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();

        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('Smartphones/telemoveisPage', [
            'Telemovel' => $tel,
            'Utilizador' => $user,
            'Buttons' => $buttons,
            'isAdmin' => $isAdmin,
        ]);

    }

    public function IphoneShowTelemoveis()
    {
        $buttons = Button::all();

        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        
        $iphone = Telemovel::where('subCategory', 'iphone')->get();
        return Inertia::render('Smartphones/iphonePage', [
            'Telemovel' => $iphone,
            'Utilizador' => $user,
            'Buttons' => $buttons,
            'isAdmin' => $isAdmin,
        ]);    
    }

    public function AndroidShowTelemoveis()
    {
        $buttons = Button::all();

        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        
        $android = Telemovel::where('subCategory', 'android')->get();
        return Inertia::render('Smartphones/androidPage', [
            'Telemovel' => $android,
            'Utilizador' => $user,
            'Buttons' => $buttons,
            'isAdmin' => $isAdmin,
        ]);    
    }

    public function showTelemoveis($subCategory,$id)
    {
        $promo = Telemovel::find($id);
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;


        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
        ]);
    }
}
