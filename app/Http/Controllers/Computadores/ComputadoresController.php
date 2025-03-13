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

        return Inertia::render('Computadores/computadoresPage', [
            'Computer' => $pc,
            'Utilizador' => Auth::user(),
            'Buttons' => $buttons
        ]);
    }

    public function showGamingPC(){
        $button = Button::all();

        $gaming = Computer::where('subCategory', 'gaming')->get();
        return Inertia::render('Computadores/GamingPage', [
            'Computer' => $gaming,
            'Utilizador' => Auth::user(),
            'Buttons' => $button
        ]);

    }

    public function showPortatil(){
        $button = Button::all();

        $gaming = Computer::where('subCategory', 'portateis')->get();
        return Inertia::render('Computadores/LaptopPage', [
            'Computer' => $gaming,
            'Utilizador' => Auth::user(),
            'Buttons' => $button
        ]);

    }

    public function showWorkstation(){
        $button = Button::all();

        $gaming = Computer::where('subCategory', 'workstation')->get();
        return Inertia::render('Computadores/workstationPage', [
            'Computer' => $gaming,
            'Utilizador' => Auth::user(),
            'Buttons' => $button
        ]);

    }

    public function showMicroPC(){
        $button = Button::all();

        $gaming = Computer::where('subCategory', 'micro-computadores')->get();
        return Inertia::render('Computadores/MicroPcPage', [
            'Computer' => $gaming,
            'Utilizador' => Auth::user(),
            'Buttons' => $button
        ]);

    }

    public function showDesktopPC(){
        $button = Button::all();

        $gaming = Computer::where('subCategory', 'desktop')->get();
        return Inertia::render('Computadores/DesktopPage', [
            'Computer' => $gaming,
            'Utilizador' => Auth::user(),
            'Buttons' => $button
        ]);

    }

    public function showComputadores($subCategory, $id)
    {
        $promo = Computer::find($id);

        $buttons = Button::all();

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
        ]);
    }
}
