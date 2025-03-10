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
            return Inertia::render('Smartphones/iphonePage', [
                'Telemovel' => $iphone,
                'Utilizador' => Auth::user(),
            ]);
        } 
        if($subCategory === 'android'){
            $android = Telemovel::where('subCategory', 'android')->get();
            return Inertia::render('Smartphones/androidPage', [
                'Telemovel' => $android,
                'Utilizador' => Auth::user(),
            ]);
        }

        return Inertia::render('Smartphones/telemoveisPage', [
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

        return Inertia::render('ComponentesPC/componentePcPage', [
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
    
    public function indexPerifericos(Request $request)
    {

        $subCategory = $request->query('periferico');

        $peri = Periferico::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        if($subCategory === 'ratos-e-teclados'){
            $ratoTeclado = Periferico::where('subCategory', 'ratos-e-teclados')->get();
            return Inertia::render('Perifericos/RatoTecladoPage', [
                'Perifericos' => $ratoTeclado,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'pc-audio'){
            $pcaudio = Periferico::where('subCategory', 'pc-audio')->get();
            return Inertia::render('Perifericos/PCAudioPage', [
                'Perifericos' => $pcaudio,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'monitores'){
            $monitores = Periferico::where('subCategory', 'monitores')->get();
            return Inertia::render('Perifericos/MonitorPage', [
                'Perifericos' => $monitores,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'webcams'){
            $webcam = Periferico::where('subCategory', 'webcams')->get();
            return Inertia::render('Perifericos/WebcamPage', [
                'Perifericos' => $webcam,
                'Utilizador' => Auth::user(),
            ]);
        }

        return Inertia::render('Perifericos/perifericosPage', [
            'Perifericos' => $peri,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showPerifericos($subCategory, $id)
    {
        $promo = Periferico::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }

    //Acessorios
    public function indexAcessorios(Request $request)
    {

        $subCategory = $request->query('acessorio');

        $aces = Acessorio::select('id', 'name', 'price', 'sale_price', 'desc', 'category', 'subCategory', 'image_path', 'stock')->get();

        if($subCategory === 'acessorios-para-computador'){
            $comp = Acessorio::where('subCategory', 'acessorios-para-computador')->get();
            return Inertia::render('Acessorios/AcessoriosPcPage', [
                'Acessorio' => $comp,
                'Utilizador' => Auth::user(),
            ]);
        }


        if($subCategory === 'acessorios-para-smartphone'){
            $smart = Acessorio::where('subCategory', 'acessorios-para-smartphone')->get();
            return Inertia::render('Acessorios/AcessoriosSmartPhonePage', [
                'Acessorio' => $smart,
                'Utilizador' => Auth::user(),
            ]);
        }
        
        if($subCategory === 'acessorios-para-casa'){
            $casa = Acessorio::where('subCategory', 'acessorios-para-casa')->get();
            return Inertia::render('Acessorios/AcessorioscasaPage', [
                'Acessorio' => $casa,
                'Utilizador' => Auth::user(),
            ]);
        }

        return Inertia::render('Acessorios/acessoriosPage', [
            'Acessorio' => $aces,
            'Utilizador' => Auth::user(),
            ]);
    }

    public function showAcessorios($subCategory, $id)
    {
        $ace = Acessorio::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $ace,
        ]);
    }

    //Computadores
    public function indexComputadores(Request $request)
    {

        $subCategory = $request->query('computador');

        $pc = Computer::select('id', 'name', 'price', 'sale_price', 'desc','category','subCategory', 'image_path', 'stock')->get();

        if($subCategory === 'desktop'){
            $desktop = Computer::where('subCategory', 'desktop')->get();
            return Inertia::render('Computadores/DesktopPage', [
                'Computer' => $desktop,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'gaming'){
            $gaming = Computer::where('subCategory', 'gaming')->get();
            return Inertia::render('Computadores/GamingPage', [
                'Computer' => $gaming,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'laptop'){
            $gaming = Computer::where('subCategory', 'laptop')->get();
            return Inertia::render('Computadores/LaptopPage', [
                'Computer' => $gaming,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'workstation'){
            $gaming = Computer::where('subCategory', 'workstation')->get();
            return Inertia::render('Computadores/workstationPage', [
                'Computer' => $gaming,
                'Utilizador' => Auth::user(),
            ]);
        }

        if($subCategory === 'micro-computadores'){
            $gaming = Computer::where('subCategory', 'micro-computadores')->get();
            return Inertia::render('Computadores/MicroPcPage', [
                'Computer' => $gaming,
                'Utilizador' => Auth::user(),
            ]);
        }

        return Inertia::render('Computadores/computadoresPage', [
            'Computer' => $pc,
            'Utilizador' => Auth::user(),
        ]);
    }

    public function showComputadores($subCategory, $id)
    {
        $promo = Computer::find($id);

        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $promo,
        ]);
    }
}
