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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProductController extends Controller
{
    public function showUpdateProductsForm()
    {
        $buttons = Button::all();

        $telemovel = Telemovel::select('id', 'name', 'price', 'stock')->get();
        $compPC = ComponentePC::select('id', 'name', 'price', 'stock')->get();
        $pc = Computer::select('id', 'name', 'price', 'stock')->get();
        $ace = Acessorio::select('id', 'name', 'price', 'stock')->get();
        $peri = Periferico::select('id', 'name', 'price', 'stock')->get();

        return Inertia::render('Products/updateProduto', [
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
            'Telemovel' => $telemovel,
            'ComponentePC' => $compPC,
            'Computador' => $pc,
            'Acessorio' => $ace,
            'Periferico' => $peri
         ]);
    }

    public function updateProduct(Request $request){
        $request->validate([
            'price' => 'numeric',
            'stock' => 'required|numeric',
        ]);

        $tel = Telemovel::find($request->id);
        $compPC = ComponentePC::find($request->id);
        $pc = Computer::find($request->id);
        $ace = Acessorio::find($request->id);
        $peri = Periferico::find($request->id);

        if(Telemovel::find($request->id)){
            $tel->update([
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        }

        if(ComponentePC::find($request->id)){
            $compPC->update([
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        }

        if(Computer::find($request->id)){
            $pc->update([
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        }

        if(Acessorio::find($request->id)){
            $ace->update([
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        }

        if(Periferico::find($request->id)){
            $peri->update([
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        }

        return Inertia::location('/');
    }

}
