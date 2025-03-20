<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AccessoriesController extends Controller
{
    public function showAccessories()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 5)->get();

        return Inertia::render('Acessorios/acessoriosPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showAccessoriesForComputer()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 5)->where('subcategory_id', 20)->get();

        return Inertia::render('Acessorios/AcessoriosPcPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showAccessoriesForSmartphone()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 5)->where('subcategory_id', 21)->get();

        return Inertia::render('Acessorios/AcessoriosSmartPhonePage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showAccessoriesForHome()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 5)->where('subcategory_id', 22)->get();

        return Inertia::render('Acessorios/AcessorioscasaPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }
}
