<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\AdminButton;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProductController extends Controller
{
    public function showUpdateProductsForm()
    {
        $buttons = AdminButton::select(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        )->get();
        $product = Product::select('id', 'name', 'price', 'stock')->get();

        $user = Auth::user();

        return Inertia::render('Admin/Products/updateProduto', [
            'adminBtn' => $buttons,
            'product' => $product,
            'Utilizador' => $user,
         ]);
    }

    public function updateProduct(Request $request){
        $request->validate([
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $prod = Product::find($request->id);

        if($prod){
            $prod->update([
                    'price' => $request->price,
                    'stock' => $request->stock,
            ]);
        }

        return Inertia::location('/dashboard');
    }

}
