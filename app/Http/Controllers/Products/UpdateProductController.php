<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Acessorio;
use Inertia\Inertia;
use App\Models\Button;
use App\Models\Telemovel;
use App\Models\ComponentePC;
use App\Models\Computer;
use App\Models\Periferico;
use App\Models\Promocoes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProductController extends Controller
{
    public function showUpdateProductsForm()
    {
        $buttons = Button::all();

        $telemovel = Telemovel::select('id', 'name', 'price', 'stock')->get();
        $comp = ComponentePC::select('id', 'name', 'price', 'stock')->get();
        $peri = Periferico::select('id', 'name', 'price', 'stock')->get();
        $pc = Computer::select('id', 'name', 'price', 'stock')->get();
        $ace = Acessorio::select('id', 'name', 'price', 'stock')->get();

        return Inertia::render('Products/updateProduto', [
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
            'Telemovel' => $telemovel,
            'ComponentePC' => $comp,
            'Periferico' => $peri,
            'Computador' => $pc,
            'Acessorio' => $ace
         ]);
    }

    public function updateProduct(Request $request){
        $request->validate([
            'price' => 'numeric',
            'stock' => 'nullable|numeric',
        ]);

        $tel = Telemovel::find($request->id);
        $comp = ComponentePC::find($request->id);
        $peri = Periferico::find($request->id);
        $pc = Computer::find($request->id);
        $ace = Acessorio::find($request->id);

        if($tel){
            $tel->update([
                    'price' => $request->price,
                    'stock' => $request->stock,
            ]);
            
            if($tel->promocao_id){
                $promo = Promocoes::find($tel->promocao_id);
                if($promo){
                $promo->update([
                    'price' => $request->price,
                    'stock' => $request->stock,
                ]);
                }  
            }
        }

        if($comp){
                $comp->update([
                    'price' => $request->price,
                    'stock' => $request->stock,
                ]);
            
            if($comp->promocao_id){
                $promo = Promocoes::find($comp->promocao_id);
                if($promo){
                    $promo->update([
                        'price' => $request->price,
                        'stock' => $request->stock,
                    ]);
                }  
            }
        }

        if($peri){
            $peri->update([
                'price' => $request->price,
                'stock' => $request->stock,
            ]);

            if($peri->promocao_id){
                $promo = Promocoes::find($peri->promocao_id);
                if($promo){
                    $promo->update([
                        'price' => $request->price,
                        'stock' => $request->stock,
                    ]);
                } 
            }
        }

        if($pc){
            $pc->update([
                'price' => $request->price,
                'stock' => $request->stock,
            ]);

            if($pc->promocao_id){
                $promo = Promocoes::find($pc->promocao_id);
                if($promo){
                    $promo->update([
                        'price' => $request->price,
                        'stock' => $request->stock,
                    ]);
                }
            }
        }

        if($ace){
            $ace->update([
                'price' => $request->price,
                'stock' => $request->stock,
            ]);

            if($ace->promocao_id){
                $promo = Promocoes::find($ace->promocao_id);
                if($promo){
                    $promo->update([
                        'price' => $request->price,
                        'stock' => $request->stock,
                    ]);
                }
            }

        }

        return Inertia::location('/');
    }

}
