<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DiscountProductsController extends Controller
{
    public function showDiscountProducts()
    {
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
        $products = Product::where('sale_price', '>', 1)->get();

        return Inertia::render('promoPage', [
            'products' => $products,
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }
}
