<?php

namespace App\Http\Controllers;

use App\Models\Button;
use App\Models\Promocoes;
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

}