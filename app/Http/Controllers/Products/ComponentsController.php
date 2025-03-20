<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ComponentsController extends Controller
{
    public function showComponents()
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
        $products = Product::where('category_id', 4)->get();

        return Inertia::render('ComponentesPC/componentePcPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showCPU()
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
        $products = Product::where('category_id', 4)->where('subcategory_id', 12)->get();

        return Inertia::render('ComponentesPC/cpuPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showRAM()
    {
        $buttons = Button::all(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        );
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::where('category_id', 4)->where('subcategory_id', 13)->get();

        return Inertia::render('ComponentesPC/ramPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showArmazenamento()
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
        $products = Product::where('category_id', 4)->where('subcategory_id', 14)->get();

        return Inertia::render('ComponentesPC/armazenamentoPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showMotherboards()
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
        $products = Product::where('category_id', 4)->where('subcategory_id', 15)->get();

        return Inertia::render('ComponentesPC/motherboardsPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showGPU()
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
        $products = Product::where('category_id', 4)->where('subcategory_id', 16)->get();

        return Inertia::render('ComponentesPC/gpuPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showFontes()
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
        $products = Product::where('category_id', 4)->where('subcategory_id', 17)->get();

        return Inertia::render('ComponentesPC/fontePage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showCPUCoolers()
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
        $products = Product::where('category_id', 4)->where('subcategory_id', 18)->get();

        return Inertia::render('ComponentesPC/cpu-coolPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }

    public function showCaixas()
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
        $products = Product::where('category_id', 4)->where('subcategory_id', 19)->get();

        return Inertia::render('ComponentesPC/caixasPcPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }
}
