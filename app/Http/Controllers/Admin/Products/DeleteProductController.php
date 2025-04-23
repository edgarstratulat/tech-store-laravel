<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\AdminButton;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteProductController extends Controller
{
    public function showDeleteForm()
    {
        $buttons = AdminButton::select(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        )->get();
        $products = Product::select('id','name')->get();     

        $user = Auth::user();
        
        return Inertia::render('Admin/Products/viewProducts', [
            'adminBtn' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
        ]);
    }

    public function DeleteProducts(Request $request)
    {

        $products = Product::find($request->id);
        
        if($products){
            $products->delete();
        }

        return Inertia::location(route('dashboard.products'));

    }
}
