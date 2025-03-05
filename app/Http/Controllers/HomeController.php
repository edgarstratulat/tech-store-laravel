<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Promocoes;
use App\Models\Computer;

class HomeController extends Controller
{
    public function showProductsHome()
    {
        $promocoes = Promocoes::all();
        $computadores = Computer::all();

        return Inertia::render('home', [
            'Promocoes' => $promocoes,
            'Computadores' => $computadores
        ]);
    }
}
