<?php

namespace App\Http\Controllers;

use App\Models\Button;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function showProductsHome()
    {
        $products = Product::select('id', 'name', 'price', 'sale_price', 'description', 'category_id', 'subcategory_id', 'image_path', 'stock')->get();

        $buttons = Button::all();
        $user = Auth::user();

        $isAdmin = $user ? $user->hasRole('admin') : false;

        return Inertia::render('home', [
            'Buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products
        ]);
    }
}
