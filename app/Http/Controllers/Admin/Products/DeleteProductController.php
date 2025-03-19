<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\AdminButton;
use App\Models\Category;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    public function showDeleteForm()
    {
        $button = AdminButton::all();
        $products = Product::select('id','name')->get();
        $categories = Category::all();        
        
        return Inertia::render('Admin/Products/deleteProduto', [
            'adminBtn' => $button,
            'products' => $products,
            'categories' => $categories,
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
