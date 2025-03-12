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

        return Inertia::render('Smartphones/telemoveisPage', [
            'Telemovel' => $tel,
            'Utilizador' => Auth::user(),
            'Buttons' => $buttons,
        ]);

    }

    public function IphoneShowTelemoveis()
    {
        $buttons = Button::all();

        
        $iphone = Telemovel::where('subCategory', 'iphone')->get();
        return Inertia::render('Smartphones/iphonePage', [
            'Telemovel' => $iphone,
            'Utilizador' => Auth::user(),
            'Buttons' => $buttons,
        ]);    
    }

    public function AndroidShowTelemoveis()
    {
        $buttons = Button::all();

        
        $android = Telemovel::where('subCategory', 'android')->get();
        return Inertia::render('Smartphones/androidPage', [
            'Telemovel' => $android,
            'Utilizador' => Auth::user(),
            'Buttons' => $buttons,
        ]);    
    }

    public function showTelemoveis($subCategory,$id)
    {
        $promo = Telemovel::find($id);
        $buttons = Button::all();

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
        ]);
    }
}
