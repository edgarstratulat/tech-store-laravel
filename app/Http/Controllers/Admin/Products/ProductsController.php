<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\AdminButton;
use App\Models\Product;
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
            'name',
            'price',
            'sale_price',
            'description',
            'category_id',
            'subcategory_id',
            'stock',
        )->paginate(10);

        $user = Auth::user();

        return Inertia::render('Admin/Products/viewProducts', [
            'adminBtn' => $buttons,
            'products' => $products,
            'Utilizador' => $user
        ]);
    }
}
