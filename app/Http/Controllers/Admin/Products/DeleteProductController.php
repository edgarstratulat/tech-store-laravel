<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\AdminButton;
use App\Models\Product;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    public function showDeleteForm()
    {
        $button = AdminButton::all();
        $products = Product::select('id','name')->get();     
        
        return Inertia::render('Admin/Products/deleteProduto', [
            'adminBtn' => $button,
            'products' => $products,
        ]);
    }

    public function DeleteProducts(Request $request)
    {

        $products = Product::find($request->id);
        
        if($products){
            $products->delete();
        }
        
        return Inertia::location('/dashboard');
    }
}
