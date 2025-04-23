<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\AdminButton;
use App\Models\Button;
use App\Models\Category;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProductsController extends Controller
{
    public function showProducts()
    {
        $buttons = AdminButton::select(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        )->get();

        $products = Product::select(
            'id',
            'name',
            'price',
            'sale_price',
            'description',
            'category_id',
            'subcategory_id',
            'stock',
        )->paginate(10);

        $user = Auth::user();

        $category = Category::select('id','name')->get();
        $subcategory = subCategory::select('id', 'name')->get();

        return Inertia::render('Admin/Products/viewProducts', [
            'adminBtn' => $buttons,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subcategory,
            'Utilizador' => $user
        ]);
    }

    public function ProductSlug($categorySlug, $subcategorySlug, $slug)
    {
        $category = Category::where('slug', $categorySlug)->firstOrFail();

        $subcategory = subCategory::where('slug', $subcategorySlug)->firstOrFail();

        $products = Product::where('slug', $slug)->where('category_id', $category->id)->where('subcategory_id', $subcategory->id)->firstOrFail();


        $buttons = Button::select(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        )->get();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
    
        return Inertia::render('detalhes-produto', [
            'DetalhesProduto' => $products,
            'category' => $category,
            'Buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }

    public function updateProduct(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $prod = Product::find($request->id);

        if($prod){
            $prod->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        } 

        return Inertia::location(route('dashboard.products'));
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
