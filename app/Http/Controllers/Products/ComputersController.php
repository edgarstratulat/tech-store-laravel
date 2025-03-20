<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ComputersController extends Controller
{
    public function showComputers()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 1)->get();

        return Inertia::render('Computadores/computadoresPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showDesktopComputers()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 1)->where('subcategory_id', 1)->get();

        return Inertia::render('Computadores/DesktopPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showGamingComputers()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 1)->where('subcategory_id', 2)->get();

        return Inertia::render('Computadores/GamingPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showLaptopsComputers()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 1)->where('subcategory_id', 3)->get();

        return Inertia::render('Computadores/LaptopPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showWorkStationComputers()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 1)->where('subcategory_id', 4)->get();

        return Inertia::render('Computadores/workstationPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showMicroComputers()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 1)->where('subcategory_id', 5)->get();

        return Inertia::render('Computadores/MicroPcPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }
}
