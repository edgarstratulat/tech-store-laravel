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

        return Inertia::render('ComponentesPC/componentePcPage', [
            'Componentes' => $componentesPC,
            'Utilizador' => Auth::user(),
            'Buttons' => $buttons,
        ]);
    }

    public function showProcessadores()
    {
        $buttons = Button::all();

        $cpu = ComponentePC::where('subCategory', 'processadores')->get();
            return Inertia::render('ComponentesPC/cpuPage', [
                'Componentes' => $cpu,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
    }

    public function showMotherboards()
    {
        $buttons = Button::all();

        $motherboard = ComponentePC::where('subCategory', 'motherboards')->get();
            return Inertia::render('ComponentesPC/motherboardsPage', [
                'Componentes' => $motherboard,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
    }

    public function showGPU()
    {
        $buttons = Button::all();

        $gpu = ComponentePC::where('subCategory', 'placas-graficas')->get();
            return Inertia::render('ComponentesPC/gpuPage', [
                'Componentes' => $gpu,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
    }

    public function showRAM()
    {
        $buttons = Button::all();

        $ram = ComponentePC::where('subCategory', 'memorias-ram')->get();
            return Inertia::render('ComponentesPC/ramPage', [
                'Componentes' => $ram,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
    }

    public function showArmazenamento()
    {
        $buttons = Button::all();

        $armazenamento = ComponentePC::where('subCategory', 'armazenamento')->get();
            return Inertia::render('ComponentesPC/armazenamentoPage', [
                'Componentes' => $armazenamento,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
    }

    public function showFontes()
    {
        $buttons = Button::all();

        $fonte = ComponentePC::where('subCategory', 'fontes-de-alimentacao')->get();
            return Inertia::render('ComponentesPC/fontePage', [
                'Componentes' => $fonte,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
    }

    public function showCaixas()
    {
        $buttons = Button::all();

        $caixaspc = ComponentePC::where('subCategory', 'caixas-de-computadores')->get();
            return Inertia::render('ComponentesPC/caixasPcPage', [
                'Componentes' => $caixaspc,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
            ]);
    }

    public function showCPUCoolers()
    {
        $buttons = Button::all();

        $caixaspc = ComponentePC::where('subCategory', 'cpu-coolers')->get();
            return Inertia::render('ComponentesPC/cpu-coolPage', [
                'Componentes' => $caixaspc,
                'Utilizador' => Auth::user(),
                'Buttons' => $buttons
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
