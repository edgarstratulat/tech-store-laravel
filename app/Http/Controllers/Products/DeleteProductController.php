<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Button;
use App\Models\ComponentePC;
use App\Models\Computer;
use App\Models\Promocoes;
use App\Models\Telemovel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeleteProductController extends Controller
{
    public function showDeleteForm()
    {
        $button = Button::all();

        $telemovel = Telemovel::select('id', 'name')->get();
        $comp = ComponentePC::select('id', 'name')->get();
        $pc = Computer::select('id', 'name')->get();
        $promo = Promocoes::select('id', 'name')->get();
        
        return Inertia::render('Products/deleteProduto', [
            'Buttons' => $button,
            'Telemoveis' => $telemovel,
            'Componentes' => $comp,
            'Computadores' => $pc,
            'Utilizador' => Auth::user()
        ]);
    }

    public function DeleteProducts($name)
    {

        $tel = Telemovel::where('name', $name)->first();
        $promo = Promocoes::where('name', $name)->first();

        if($tel && $promo && $tel->name === $promo->name){
            $promo->delete() && $tel->delete();
        } else if($tel){
            $tel->delete();
        } else if($promo){
            $promo->delete();
        }

        return Inertia::location('/');
    }
}
