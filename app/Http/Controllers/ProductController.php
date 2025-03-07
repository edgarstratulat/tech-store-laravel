<?php

namespace App\Http\Controllers;

use App\Models\Acessorio;
use App\Models\Promocoes;
use App\Models\Telemovel;
use App\Models\ComponentePC;
use App\Models\Periferico;
use App\Models\Computer;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    // Promocoes

    public function indexPromocoes()
    {
        $promo = Promocoes::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        return Inertia::render('promoPage', [
            'Promocoes' => $promo,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showPromocoes($id)
    {
        $promo = Promocoes::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }

    // Telemoveis
    public function indexTelemoveis(Request $request)
    {
        $subCategory = $request->query('tipo');

        $tel = Telemovel::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();


        if($subCategory === 'iphone'){
            $iphone = Telemovel::where('subCategory', 'iphone')->get();
            return Inertia::render('iphonePage', [
                'Telemovel' => $iphone,
                'Utilizador' => Auth::user(),
            ]);
        } 
        if($subCategory === 'android'){
            $android = Telemovel::where('subCategory', 'android')->get();
            return Inertia::render('androidPage', [
                'Telemovel' => $android,
                'Utilizador' => Auth::user(),
            ]);
        }

        return Inertia::render('telemoveisPage', [
            'Telemovel' => $tel,
            'Utilizador' => Auth::user(),
        ]);

    }

    public function showTelemoveis($subCategory,$id)
    {
        $promo = Telemovel::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }


    // Componentes

    public function indexComponentes(Request $request)
    {
        $subCategory = $request->query('componente');

        $componentesPC = ComponentePC::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();

        if($subCategory === 'processadores'){
            $cpu = ComponentePC::where('subCategory', 'processadores')->get();
            return Inertia::render('ComponentesPC/cpuPage', [
                'Componentes' => $cpu,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'motherboards'){
            $motherboard = ComponentePC::where('subCategory', 'motherboards')->get();
            return Inertia::render('ComponentesPC/motherboardsPage', [
                'Componentes' => $motherboard,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'cpu-coolers'){
            $cpuCoolers = ComponentePC::where('subCategory', 'cpu-coolers')->get();
            return Inertia::render('ComponentesPC/cpu-coolPage', [
                'Componentes' => $cpuCoolers,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'placas-graficas'){
            $gpu = ComponentePC::where('subCategory', 'placas-graficas')->get();
            return Inertia::render('ComponentesPC/gpuPage', [
                'Componentes' => $gpu,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'memorias-ram'){
            $ram = ComponentePC::where('subCategory', 'memorias-ram')->get();
            return Inertia::render('ComponentesPC/ramPage', [
                'Componentes' => $ram,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'armazenamento'){
            $ssd = ComponentePC::where('subCategory', 'armazenamento')->get();
            return Inertia::render('ComponentesPC/armazenamentoPage', [
                'Componentes' => $ssd,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'caixas-de-computadores'){
            $caixas = ComponentePC::where('subCategory', 'caixas-de-computadores')->get();
            return Inertia::render('ComponentesPC/caixasPcPage', [
                'Componentes' => $caixas,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'fontes-de-alimentacao'){
            $fontes = ComponentePC::where('subCategory', 'fontes-de-alimentacao')->get();
            return Inertia::render('ComponentesPC/fontePage', [
                'Componentes' => $fontes,
                'Utilizador' => Auth::user(),
            ]);
        }

        return Inertia::render('componentePcPage', [
            'Componentes' => $componentesPC,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showComponentePC($subCategory, $id)
    {
        $promo = ComponentePC::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }

    //Perifericos
    
    public function indexPerifericos()
    {
        $peri = Periferico::select('id', 'name', 'price', 'sale_price', 'desc', 'image_path', 'stock')->get();

        return Inertia::render('perifericosPage', [
            'Perifericos' => $peri,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showPerifericos($id)
    {
        $promo = Periferico::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }

    //Acessorios
    public function indexAcessorios()
    {
        $peri = Acessorio::select('id', 'name', 'price', 'sale_price', 'desc', 'image_path', 'stock')->get();

        return Inertia::render('acessoriosPage', [
            'Acessorio' => $peri,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showAcessorios($id)
    {
        $ace = Acessorio::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $ace,
        ]);
    }

    //Computadores
    public function indexComputadores()
    {
        $pc = Computer::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();

        return Inertia::render('computadoresPage', [
            'Computer' => $pc,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showComputadores($id)
    {
        $promo = Computer::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }
}
