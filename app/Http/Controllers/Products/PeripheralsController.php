<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Mouse;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PeripheralsController extends Controller
{
    public function showPeripherals()
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
                $query->where('sale_price', '>', 1);
            }),
            AllowedFilter::callback('reconditioned', function($query) {
                $query->where('reconditioned', '=', 1);
            })
        ])
        ->allowedSorts([
            'price', '-price', '-created_at'
        ])
        ->with(['category', 'subcategory'])
        ->where('category_id', 2) 
        ->paginate(12)->appends(request()->query());

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 2);
        })->select('id', 'name')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->where('category_id', 2)->get();


        return Inertia::render('Perifericos/perifericosPage', [
            'buttons' => $buttons,
            'products' => $products,
            'manufacturer' => $manufacturer,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory,
        ]);
    }

    public function showPeripheralsMouseAndKeyboard()
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
                $query->where('sale_price', '>', 1);
            }),
            AllowedFilter::callback('reconditioned', function($query) {
                $query->where('reconditioned', '=', 1);
            }),
            AllowedFilter::callback('mouse_format', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('mouse', function($q) use ($models){
                    $q->whereIn('format', $models);
                });
            }),
            AllowedFilter::callback('mouse_interface', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('mouse', function($q) use ($models){
                    $q->whereIn('interface', $models);
                });
            }),
            AllowedFilter::callback('mouse_dpi', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('mouse', function($q) use ($models){
                    $q->whereIn('dpi', $models);
                });
            }),
            AllowedFilter::callback('mouse_response_time', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('mouse', function($q) use ($models){
                    $q->whereIn('response_time', $models);
                });
            }),
        ])
        ->allowedSorts([
            'price', '-price', '-created_at'
        ])
        ->with('category', 'subcategory')
        ->where('category_id', 2)
        ->where('subcategory_id', 4)
        ->orWhere('subcategory_id', 18)
        ->paginate(12)
        ->appends(request()->query());

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 2)->where('subcategory_id', 4)->orWhere('subcategory_id', 18);
        })->select('id', 'name')->get();

        $mice = Mouse::whereHas('product', function($query) {
            $query->where('category_id', 2)->where('subcategory_id', 4);
        })->select('format', 'interface', 'dpi', 'response_time')->get();

        return Inertia::render('Perifericos/RatoTecladoPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory,
            'mouse' => $mice,
            'manufacturer' => $manufacturer
        ]);
    }

    public function showPeripheralsAudio()
    {
        $buttons = Button::all();
        $user = Auth::user();
        $isAdmin = $user ? $user->hasRole('admin') : false;
        $products = Product::with('category')->with('subcategory')->where('category_id', 2)->where('subcategory_id', 8)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('Perifericos/PCAudioPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }

    public function showPeripheralsMonitor()
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 2)->where('subcategory_id', 7)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('Perifericos/MonitorPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }

    public function showPeripheralsVideo()
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 2)->where('subcategory_id', 9)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('Perifericos/VideoPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }
}
