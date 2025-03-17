<?php

namespace App\Http\Controllers\Computadores;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

use App\Models\Computer;
use App\Models\Button;


class ComputadoresController extends Controller
{
    public function indexComputadores()
    {
        $pc = Computer::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();

        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('Computadores/computadoresPage', [
            'Computer' => $pc,
            'Utilizador' => $user,
            'Buttons' => $buttons,
            'isAdmin' => $isAdmin,
        ]);
    }

    public function showGamingPC(){
        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $gaming = Computer::where('subCategory', 'gaming')->get();
        return Inertia::render('Computadores/GamingPage', [
            'Computer' => $gaming,
            'Utilizador' => $user,
            'Buttons' => $button,
            'isAdmin' => $isAdmin
        ]);

    }

    public function showPortatil(){
        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $gaming = Computer::where('subCategory', 'portateis')->get();
        return Inertia::render('Computadores/LaptopPage', [
            'Computer' => $gaming,
            'Utilizador' => $user,
            'Buttons' => $button,
            'isAdmin' => $isAdmin
        ]);

    }

    public function showWorkstation(){
        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $gaming = Computer::where('subCategory', 'workstation')->get();
        return Inertia::render('Computadores/workstationPage', [
            'Computer' => $gaming,
            'Utilizador' => $user,
            'Buttons' => $button,
            'isAdmin' => $isAdmin
        ]);

    }

    public function showMicroPC(){
        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $gaming = Computer::where('subCategory', 'micro-computadores')->get();
        return Inertia::render('Computadores/MicroPcPage', [
            'Computer' => $gaming,
            'Utilizador' => $user,
            'Buttons' => $button,
            'isAdmin' => $isAdmin
        ]);

    }

    public function showDesktopPC(){
        $button = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $gaming = Computer::where('subCategory', 'desktop')->get();
        return Inertia::render('Computadores/DesktopPage', [
            'Computer' => $gaming,
            'Utilizador' => $user,
            'Buttons' => $button,
            'isAdmin' => $isAdmin
        ]);

    }

    public function showComputadores($subCategory, $id)
    {
        $promo = Computer::find($id);

        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;


        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }
}
