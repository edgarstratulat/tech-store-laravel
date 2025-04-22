<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Smartphone;
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
            AllowedFilter::callback('stock', function ($query) {
                $query->where('stock', '>', 0);
            }),
            AllowedFilter::callback('nostock', function ($query) {
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
            AllowedFilter::callback('promotion', function ($query) {
                $query->where('sale_price', '>', 0);
            }),
            AllowedFilter::callback('reconditioned', function ($query) {
                $query->where('reconditioned', '=', true);
            }),
            AllowedFilter::callback('smartphone_capacity', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('storage', $models);
                });
            }),
            AllowedFilter::callback('smartphone_sim', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('SIM', $models);
                });
            }),
            AllowedFilter::callback('group_processor', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('family_processor', $models);
                });
            }),
            AllowedFilter::callback('smartphone_processor', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('processor', $models);
                });
            }),
            AllowedFilter::callback('smartphone_operating_system', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('operating_system', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_resolution', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_resolution', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_inches', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_inches', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_hz', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_hz', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_type', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_type', $models);
                });
            }),
            
        ])
        ->defaultSort('created_at')
        ->allowedSorts([
            'price', '-price', '-created_at'
        ])
        ->with(['category', 'subcategory'])
        ->where('category_id', 3)
        ->paginate(12)->appends(request()->query());

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 3);
        })->select('id', 'name')->get();

        $smartphone = Smartphone::select('model', 'ram', 'storage', 'family_processor', 'processor', 'SIM', 'operating_system', 'screen_resolution', 'screen_inches', 'screen_hz', 'screen_type', '5G', 'NFC')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->where('category_id', 3)->get();

        return Inertia::render('Smartphones/SmartphonesPage', [
            'buttons' => $buttons,
            'products' => $products,
            'manufacturer' => $manufacturer,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory,
            'smartphone' => $smartphone
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
        $products = QueryBuilder::for(Product::class)
        ->allowedFilters([
            AllowedFilter::callback('stock', function ($query) {
                $query->where('stock', '>', 0);
            }),
            AllowedFilter::callback('nostock', function ($query) {
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
            AllowedFilter::callback('promotion', function ($query) {
                $query->where('sale_price', '>', 0);
            }),
            AllowedFilter::callback('reconditioned', function ($query) {
                $query->where('reconditioned', '=', true);
            }),
            AllowedFilter::callback('smartphone_capacity', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('storage', $models);
                });
            }),
            AllowedFilter::callback('smartphone_sim', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('SIM', $models);
                });
            }),
            AllowedFilter::callback('group_processor', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('family_processor', $models);
                });
            }),
            AllowedFilter::callback('smartphone_processor', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('processor', $models);
                });
            }),
            AllowedFilter::callback('smartphone_operating_system', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('operating_system', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_resolution', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_resolution', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_inches', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_inches', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_hz', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_hz', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_type', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_type', $models);
                });
            }),
            
        ])
        ->defaultSort('created_at')
        ->allowedSorts([
            'price', '-price', '-created_at'
        ])
        ->with('category', 'subcategory')->where('category_id', 3)->where('subcategory_id', 8)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 3)->where('subcategory_id', 8);
        })->select('id', 'name')->get();

        $smartphone = Smartphone::whereHas('product', function($query) {
            $query->where('category_id', 3)->where('subcategory_id', 8);
        })->select('model', 'ram', 'storage', 'family_processor', 'processor', 'SIM', 'operating_system', 'screen_resolution', 'screen_inches', 'screen_hz', 'screen_type', '5G', 'NFC')->get();

        return Inertia::render('Smartphones/IphonePage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'smartphone' => $smartphone
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
        $products = QueryBuilder::for(Product::class)
        ->allowedFilters([
            AllowedFilter::callback('stock', function ($query) {
                $query->where('stock', '>', 0);
            }),
            AllowedFilter::callback('nostock', function ($query) {
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
            AllowedFilter::callback('promotion', function ($query) {
                $query->where('sale_price', '>', 0);
            }),
            AllowedFilter::callback('reconditioned', function ($query) {
                $query->where('reconditioned', '=', true);
            }),
            AllowedFilter::callback('smartphone_capacity', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('storage', $models);
                });
            }),
            AllowedFilter::callback('smartphone_sim', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('SIM', $models);
                });
            }),
            AllowedFilter::callback('group_processor', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('family_processor', $models);
                });
            }),
            AllowedFilter::callback('smartphone_processor', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('processor', $models);
                });
            }),
            AllowedFilter::callback('smartphone_operating_system', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('operating_system', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_resolution', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_resolution', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_inches', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_inches', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_hz', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_hz', $models);
                });
            }),
            AllowedFilter::callback('smartphone_screen_type', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('smartphone', function($q) use ($models){
                    $q->whereIn('screen_type', $models);
                });
            }),
            
        ])
        ->defaultSort('created_at')
        ->allowedSorts([
            'price', '-price', '-created_at'
        ])
        ->with('category', 'subcategory')->where('category_id', 3)->where('subcategory_id', 9)->paginate(12);


        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 3)->where('subcategory_id', 9);
        })->select('id', 'name')->get();

        $smartphone = Smartphone::whereHas('product', function($query) {
            $query->where('category_id', 3)->where('subcategory_id', 9);
        })->select('model', 'ram', 'storage', 'family_processor', 'processor', 'SIM', 'operating_system', 'screen_resolution', 'screen_inches', 'screen_hz', 'screen_type', '5G', 'NFC')->get();

        return Inertia::render('Smartphones/AndroidPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'smartphone' => $smartphone
        ]);
    }
}
