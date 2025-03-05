<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Produto;
use App\Models\Promocoes;

class HomeController extends Controller
{
    public function showProductsHome()
    {
        $promocoes = Promocoes::all();

        return Inertia::render('home', [
            'Promocoes' => $promocoes,
        ]);
    }
}
