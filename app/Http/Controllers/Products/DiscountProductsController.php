<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Category;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;

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

        $products = QueryBuilder::for(Product::class)
        ->allowedFilters(['name'])
        ->with(['category', 'subcategory'])
        ->select('id', 'name', 'slug', 'price', 'sale_price', 'description', 'category_id',     'subcategory_id', 'image_path', 'stock')
        ->where('sale_price', '>', 1)
        ->paginate(12);

        $category = Category::select('id', 'name', 'slug')->get();
        $subCategory = subCategory::select('id', 'name', 'slug')->get();

        return Inertia::render('promoPage', [
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory, 
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }

}
