<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Promocoes;
use App\Models\Computer;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showProductsHome()
    {
        $promocoes = Promocoes::select('id', 'name', 'price', 'sale_price', 'desc', 'image_path', 'stock')->get();
        $computadores = Computer::select('id', 'name', 'price', 'sale_price', 'desc', 'image_path', 'stock')->get();

        return Inertia::render('home', [
            'Promocoes' => $promocoes,
            'Computadores' => $computadores,
            'Utilizador' => Auth::user(),
        ]);
    }
}
