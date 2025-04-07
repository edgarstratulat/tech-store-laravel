<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Armazenamento;
use App\Models\Button;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Processor;
use App\Models\Product;
use App\Models\Ram;
use App\Models\subCategory;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ComponentsController extends Controller
{
    public function showComponents()
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
            AllowedFilter::callback('reconditioned', function ($query) {
                $query->where('reconditioned', '=', true);
            }),

            AllowedFilter::callback('capacidade_ram', function($query, $value){
                $query->whereHas('ram', function($q) use ($value){
                    $q->where('size', '=', $value);
                });
            }),

            AllowedFilter::callback('capacidade_armazenamento', function($query, $value){
                $query->whereHas('armazenamento', function($q) use ($value){
                    $q->where('size', '=', $value);
                });
            }),
            
            AllowedFilter::callback('cpu', function($query, $value){
                $query->whereHas('cpu', function($q) use ($value){
                    $q->where('model', '=', $value);
                });
            })
            
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])
        ->with(['category', 'subcategory'])
        ->where('category_id', 4)
        ->paginate(12)->appends(request()->query());;

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4);
        })->select('id', 'name')->get();

        $ram = Ram::select('id', 'size')->get();
        $armazenamento = Armazenamento::select('id', 'size')->get();
        $cpu = Processor::select('id', 'model')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->where('category_id', 4)->get();

        return Inertia::render('ComponentesPC/componentePcPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'manufacturer' => $manufacturer,
            'category' => $category,
            'subcategory' => $subCategory,
            'ram' => $ram,
            'armazenamento' => $armazenamento,
            'cpu' => $cpu
        ]);
    }

    public function showCPU()
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
            AllowedFilter::callback('reconditioned', function ($query) {
                $query->where('reconditioned', '=', true);
            }),
            AllowedFilter::callback('cpu', function($query, $value){
                $query->whereHas('cpu', function($q) use ($value){
                    $q->where('model', '=', $value);
                });
            }),
            AllowedFilter::callback('cpu_cores', function($query, $value){
                $query->whereHas('cpu', function($q) use ($value){
                    $q->where('cores', '=', $value);
                });
            }),
            AllowedFilter::callback('cpu_threads', function($query, $value){
                $query->whereHas('cpu', function($q) use ($value){
                    $q->where('threads', '=', $value);
                });
            }),

            AllowedFilter::callback('cpu_tdp', function($query, $value){
                $query->whereHas('cpu', function($q) use ($value){
                    $q->where('tdp', '=', $value);
                });
            }),

            AllowedFilter::callback('cpu_socket', function($query, $value){
                $query->whereHas('cpu', function($q) use ($value){
                    $q->where('socket', '=', $value);
                });
            }),

            
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 12)->paginate();


        $cpu = Processor::select('id', 'model', 'cores', 'threads', 'base_clock', 'boost_clock', 'tdp', 'socket')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 12);
        })->select('id', 'name')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();


        return Inertia::render('ComponentesPC/cpuPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'cpu' => $cpu
        ]);
    }

    public function showRAM()
    {
        $buttons = Button::all(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        );
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
            AllowedFilter::callback('reconditioned', function ($query) {
                $query->where('reconditioned', '=', true);
            }),

            AllowedFilter::callback('capacidade_ram', function($query, $value){
                $query->whereHas('ram', function($q) use ($value){
                    $q->where('size', '=', $value);
                });
            }),
            AllowedFilter::callback('tipo_ram', function($query, $value){
                $query->whereHas('ram', function($q) use ($value){
                    $q->where('type', '=', $value);
                });
            }),
            AllowedFilter::callback('velocidade_ram', function($query, $value){
                $query->whereHas('ram', function($q) use ($value){
                    $q->where('frequency', '=', $value);
                });
            }),
            AllowedFilter::callback('latencia_ram', function($query, $value){
                $query->whereHas('ram', function($q) use ($value){
                    $q->where('latency', '=', $value);
                });
            }),
            
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 13)->paginate(12);

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 13);
        })->select('id', 'name')->get();

        $ram = Ram::select(
            'id',
            'type',
            'size',
            'frequency',
            'latency'
        )->get();
        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('ComponentesPC/ramPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'ram' => $ram
        ]);
    }

    public function showArmazenamento()
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
            AllowedFilter::callback('reconditioned', function ($query) {
                $query->where('reconditioned', '=', true);
            }),
            AllowedFilter::callback('capacidade_drive', function($query, $value){
                $query->whereHas('armazenamento', function($q) use ($value){
                    $q->where('size', '=', $value);
                });
            }),
            AllowedFilter::callback('type_drive', function($query, $value){
                $query->whereHas('armazenamento', function($q) use ($value){
                    $q->where('type', '=', $value);
                });
            }),
            AllowedFilter::callback('writing_speed_drive', function($query, $value){
                $query->whereHas('armazenamento', function($q) use ($value){
                    $q->where('writing_speed', '=', $value);
                });
            }),
            AllowedFilter::callback('rotation_speed_drive', function($query, $value){
                $query->whereHas('armazenamento', function($q) use ($value){
                    $q->where('rotation_speed', '=', $value);
                });
            }),
            
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 14)->paginate(12);

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 14);
        })->select('id', 'name')->get();

        $armazenamento = Armazenamento::select('id', 'size', 'type', 'rotation_speed', 'writing_speed', 'reading_speed')->get(); 

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('ComponentesPC/armazenamentoPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'armazenamento' => $armazenamento
        ]);
    }

    public function showMotherboards()
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 15)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('ComponentesPC/motherboardsPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }

    public function showGPU()
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 16)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('ComponentesPC/gpuPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }

    public function showFontes()
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 17)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();


        return Inertia::render('ComponentesPC/fontePage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }

    public function showCPUCoolers()
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 18)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('ComponentesPC/cpu-coolPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory
        ]);
    }

    public function showCaixas()
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
        $products = Product::with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 19)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('ComponentesPC/caixasPcPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
        ]);
    }
}
