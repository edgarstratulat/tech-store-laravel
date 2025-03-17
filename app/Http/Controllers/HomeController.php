<?php

namespace App\Http\Controllers;

use App\Models\Button;
use Inertia\Inertia;
use App\Models\Promocoes;
use App\Models\Computer;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showProductsHome()
    {
        $promocoes = Promocoes::select('id', 'name', 'price', 'sale_price', 'desc','category', 'subCategory', 'image_path', 'stock')->get();
        $computadores = Computer::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        $buttons = Button::all();
        $user = Auth::user();

        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('home', [
            'Promocoes' => $promocoes,
            'Computadores' => $computadores,
            'Buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
        ]);
    }
}
