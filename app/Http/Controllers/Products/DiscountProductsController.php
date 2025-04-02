<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
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
        ->allowedFilters([
            AllowedFilter::callback('stock', function ($query, $value) {
                $query->where('stock', '>', 0);
            }),
            AllowedFilter::callback('nostock', function ($query, $value) {
                $query->where('stock', '=', 0);
            }),
            AllowedFilter::callback('manufacturer', function ($query, $value) {
                $query->where('manufacturer_id', '=', $value);
            }),
            AllowedFilter::callback('category', function ($query, $value) {
                $query->where('category_id', '=', $value);
            })
        ])
        ->defaultSort('created_at')
        ->allowedSorts([
            'price', '-price', '-created_at'
        ])
        ->with(['category', 'subcategory'])
        ->select('id', 'name', 'slug', 'price', 'sale_price', 'description', 'category_id',     'subcategory_id', 'manufacturer_id', 'image_path', 'stock', 'created_at')
        ->where('sale_price', '>', 1)
        ->paginate(12)->appends(request()->query());

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('sale_price', '>', 1);
        })->select('id', 'name', 'slug')->get();

        $category = Category::select('id', 'name', 'slug')->get();
        $subCategory = subCategory::select('id', 'name', 'slug')->get();

        return Inertia::render('promoPage', [
            'products' => $products,
            'category' => $category,
            'manufacturer' => $manufacturer,
            'subcategory' => $subCategory, 
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin
        ]);
    }

}
