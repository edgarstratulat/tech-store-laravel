<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Produto;

class HomeController extends Controller
{
    public function showProductsHome()
    {
        $produtos = Produto::all();

        return Inertia::render('home', [
            'Produtos' => $produtos,
        ]);
    }

    public function userLogged() {
        return 'Teste';
    }
}
