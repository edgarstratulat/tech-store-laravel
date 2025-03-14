<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Acessorio;
use Inertia\Inertia;
use App\Models\Button;
use App\Models\ComponentePC;
use App\Models\Computer;
use App\Models\Periferico;
use App\Models\Promocoes;
use App\Models\Telemovel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    public function showDeleteForm()
    {
        $button = Button::all();

        $telemovel = Telemovel::select('id', 'name')->get();
        $comp = ComponentePC::select('id', 'name')->get();
        $pc = Computer::select('id', 'name')->get();
        $peri = Periferico::select('id', 'name')->get();
        $ace = Acessorio::select('id', 'name')->get();
        
        return Inertia::render('Products/deleteProduto', [
            'Buttons' => $button,
            'Telemoveis' => $telemovel,
            'Componentes' => $comp,
            'Computadores' => $pc,
            'Perifericos' => $peri,
            'Acessorios' => $ace,
            'Utilizador' => Auth::user()
        ]);
    }

    public function DeleteProducts(Request $request)
    {

        $tel = Telemovel::find($request->id);
        $comp = ComponentePC::find($request->id);
        $pc = Computer::find($request->id);
        $peri = Periferico::find($request->id);
        $ace = Acessorio::find($request->id);
        
        if($tel){
            $tel->delete();

            if($tel->promocao_id){
                $promo = Promocoes::find($tel->promocao_id);
                    $promo->delete();
            }
        }

        if($comp){
            $comp->delete();

            if($comp->promocao_id){
                $promo = Promocoes::find($comp->promocao_id);
                    $promo->delete();
            }
        }

        if($pc){
            $pc->delete();

            if($pc->promocao_id){
                $promo = Promocoes::find($pc->promocao_id);
                    $promo->delete();
            }
        }

        if($peri){
            $peri->delete();

            if($peri->promocao_id){
                $promo = Promocoes::find($peri->promocao_id);
                    $promo->delete();
            }
        }

        if($ace){
            $ace->delete();

            if($ace->promocao_id){
                $promo = Promocoes::find($ace->promocao_id);
                    $promo->delete();
            }
        }

        return Inertia::location('/');
    }
}
