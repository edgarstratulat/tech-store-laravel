<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Button;
use App\Models\Telemovel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProductController extends Controller
{
    public function showUpdateProductsForm()
    {
        $buttons = Button::all();
        $telemovel = Telemovel::all();

        return Inertia::render('Products/updateProduto', [
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
            'Telemovel' => $telemovel
         ]);
    }

    public function updateProduct(Request $request){
        $request->validate([
            'price' => 'numeric',
            'stock' => 'required|numeric',
        ]);

        $tel = Telemovel::find($request->id);

        $tel->update([
                'price' => $request->price,
                'stock' => $request->stock,
            ]);  

        return Inertia::location('/');
    }

}
