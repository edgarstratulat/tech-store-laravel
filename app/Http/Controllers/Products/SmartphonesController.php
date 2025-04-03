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
use Spatie\QueryBuilder\QueryBuilder;

class SmartphonesController extends Controller
{
    public function showSmartphones()
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
            AllowedFilter::callback('min_price', function ($query, $value) {
                $query->where('price', '>=', $value);
            }),
            AllowedFilter::callback('max_price', function ($query, $value) {
                $query->where('price', '<=', $value);
            }),
            AllowedFilter::callback('subcategory', function ($query, $value) {
                $query->where('subcategory_id', '=', $value);
            }),
            
        ])
        ->defaultSort('created_at')
        ->allowedSorts([
            'price', '-price', '-created_at'
        ])
        ->with(['category', 'subcategory'])
        ->where('category_id', 3)
        ->paginate(12)->appends(request()->query());;

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 3);
        })->select('id', 'name', 'slug')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->where('category_id', 3)->get();

        return Inertia::render('Smartphones/telemoveisPage', [
            'buttons' => $buttons,
            'products' => $products,
            'manufacturer' => $manufacturer,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }

    public function showIphoneSmartphone()
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 3)->where('subcategory_id', 10)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('Smartphones/iphonePage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }

    public function showAndroidSmartphone()
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 3)->where('subcategory_id', 11)->paginate(12);


        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('Smartphones/androidPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }
}
