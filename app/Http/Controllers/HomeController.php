<?php

namespace App\Http\Controllers;

use App\Models\Button;
use App\Models\Category;
use Inertia\Inertia;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showProductsHome()
    {
        $products = Product::select('id', 'name', 'slug', 'price', 'sale_price', 'description', 'category_id', 'subcategory_id', 'image_path', 'stock')->orderBy('id', 'asc')->take(9)->get();

        $computers = Product::select('id', 'name', 'slug', 'price', 'sale_price', 'description', 'category_id', 'subcategory_id', 'image_path', 'stock')->where('category_id', 1)->orderBy('id', 'asc')->take(4)->get();

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

        $category = Category::select('id','name')->get();
        $subcategory = subCategory::select('id', 'name')->get();

        return Inertia::render('home', [
            'Buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subcategory,
            'computers' => $computers,
        ]);
    }
}
