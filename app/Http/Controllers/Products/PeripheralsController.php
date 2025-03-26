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
        ->allowedFilters('manufacturer')
        ->with(['category', 'subcategory'])
        ->where('category_id', 2) 
        ->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();


        return Inertia::render('Perifericos/perifericosPage', [
            'buttons' => $buttons,
            'products' => $products,
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 2)->where('subcategory_id', 6)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('Perifericos/RatoTecladoPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory,
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
