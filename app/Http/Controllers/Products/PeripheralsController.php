<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PeripheralsController extends Controller
{
    public function showPeripherals()
    {
        $buttons = Button::select(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        )->get();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 2)->get();

        return Inertia::render('Perifericos/perifericosPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
        ]);
    }

    public function showPeripheralsMouseAndKeyboard()
    {
        $buttons = Button::select(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        )->get();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 2)->where('subcategory_id', 6)->get();

        return Inertia::render('Perifericos/RatoTecladoPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
        ]);
    }

    public function showPeripheralsAudio()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 2)->where('subcategory_id', 8)->get();

        return Inertia::render('Perifericos/PCAudioPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
        ]);
    }

    public function showPeripheralsMonitor()
    {
        $buttons = Button::select(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        )->get();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 2)->where('subcategory_id', 7)->get();

        return Inertia::render('Perifericos/MonitorPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
        ]);
    }

    public function showPeripheralsVideo()
    {
        $buttons = Button::select(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        )->get();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 2)->where('subcategory_id', 9)->get();

        return Inertia::render('Perifericos/VideoPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
        ]);
    }
}
