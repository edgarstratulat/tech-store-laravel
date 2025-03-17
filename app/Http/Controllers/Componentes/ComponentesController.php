<?php

namespace App\Http\Controllers\Componentes;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

use App\Models\ComponentePC;
use App\Models\Button;


class ComponentesController extends Controller
{
    public function indexComponentes()
    {

        $componentesPC = ComponentePC::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();

        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('ComponentesPC/componentePcPage', [
            'Componentes' => $componentesPC,
            'Utilizador' => $user,
            'Buttons' => $buttons,
            'isAdmin' => $isAdmin
        ]);
    }

    public function showProcessadores()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $cpu = ComponentePC::where('subCategory', 'processadores')->get();
            return Inertia::render('ComponentesPC/cpuPage', [
                'Componentes' => $cpu,
                'Utilizador' => $user,
                'Buttons' => $buttons,
                'isAdmin' => $isAdmin
            ]);
    }

    public function showMotherboards()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $motherboard = ComponentePC::where('subCategory', 'motherboards')->get();
            return Inertia::render('ComponentesPC/motherboardsPage', [
                'Componentes' => $motherboard,
                'Utilizador' => $user,
                'Buttons' => $buttons,
                'isAdmin' => $isAdmin
            ]);
    }

    public function showGPU()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $gpu = ComponentePC::where('subCategory', 'placas-graficas')->get();
            return Inertia::render('ComponentesPC/gpuPage', [
                'Componentes' => $gpu,
                'Utilizador' => $user,
                'Buttons' => $buttons,
                'isAdmin' => $isAdmin
            ]);
    }

    public function showRAM()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $ram = ComponentePC::where('subCategory', 'memorias-ram')->get();
            return Inertia::render('ComponentesPC/ramPage', [
                'Componentes' => $ram,
                'Utilizador' => $user,
                'Buttons' => $buttons,
                'isAdmin' => $isAdmin
            ]);
    }

    public function showArmazenamento()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $armazenamento = ComponentePC::where('subCategory', 'armazenamento')->get();
            return Inertia::render('ComponentesPC/armazenamentoPage', [
                'Componentes' => $armazenamento,
                'Utilizador' => $user,
                'Buttons' => $buttons,
                'isAdmin' => $isAdmin
            ]);
    }

    public function showFontes()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $fonte = ComponentePC::where('subCategory', 'fontes-de-alimentacao')->get();
            return Inertia::render('ComponentesPC/fontePage', [
                'Componentes' => $fonte,
                'Utilizador' => $user,
                'Buttons' => $buttons,
                'isAdmin' => $isAdmin
            ]);
    }

    public function showCaixas()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $caixaspc = ComponentePC::where('subCategory', 'caixas-de-computadores')->get();
            return Inertia::render('ComponentesPC/caixasPcPage', [
                'Componentes' => $caixaspc,
                'Utilizador' => $user,
                'Buttons' => $buttons,
                'isAdmin' => $isAdmin
            ]);
    }

    public function showCPUCoolers()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;

        $caixaspc = ComponentePC::where('subCategory', 'cpu-coolers')->get();
            return Inertia::render('ComponentesPC/cpu-coolPage', [
                'Componentes' => $caixaspc,
                'Utilizador' => $user,
                'Buttons' => $buttons,
                'isAdmin' => $isAdmin
            ]);
    }

    public function showComponentePC($subCategory, $id)
    {
        $promo = ComponentePC::find($id);

        $buttons = Button::all();

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
        ]);
    }

    
}
