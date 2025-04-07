<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Armazenamento;
use App\Models\Button;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Motherboard;
use App\Models\Processor;
use App\Models\Product;
use App\Models\Ram;
use App\Models\subCategory;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedSort;
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
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('ram', function($q) use ($models){
                    $q->whereIn('size', $models);
                });
            }),

            AllowedFilter::callback('capacidade_armazenamento', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('armazenamento', function($q) use ($models){
                    $q->whereIn('size', $models);
                });
            }),

            AllowedFilter::callback('cpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu', function($q) use ($models){
                    $q->whereIn('model', $models);
                });
            })
            
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])
        ->with(['category', 'subcategory'])
        ->where('category_id', 4)
        ->paginate(12)->appends(request()->query());

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
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu', function($q) use ($models){
                    $q->whereIn('model', $models);
                });
            }),

            AllowedFilter::callback('cpu_tdp', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu', function($q) use ($models){
                    $q->whereIn('tdp',  $models);
                });
            }),

            AllowedFilter::callback('cpu_socket', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu', function($q) use ($models){
                    $q->whereIn('socket', $models);
                });
            }),

            AllowedFilter::callback('included_cooler', function($query, $value){

                $query->whereHas('cpu', function($q) use ($value){
                    $q->where('included_cooler', $value);
                });
            }),

        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 12)->paginate(12)->appends(request()->query());


        $cpu = Processor::select('id', 'model', 'tdp', 'socket')->get();

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
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('ram', function($q) use ($models){
                    $q->whereIn('size', $models);
                });
            }),
            AllowedFilter::callback('tipo_ram', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('ram', function($q) use ($models){
                $q->whereIn('type', $models);
                });
            }),
            AllowedFilter::callback('velocidade_ram', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('ram', function($q) use ($models){
                    $q->whereIn('frequency', $models);
                });
            }),
            AllowedFilter::callback('latencia_ram', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('ram', function($q) use ($models){
                    $q->whereIn('latency', $models);
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
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('armazenamento', function($q) use ($models){
                    $q->whereIn('size', $models);
                });
            }),
            AllowedFilter::callback('type_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('armazenamento', function($q) use ($models){
                    $q->whereIn('type', $models);
                });
            }),
            AllowedFilter::callback('writing_speed_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('armazenamento', function($q) use ($models){
                    $q->whereIn('writing_speed', $models);
                });
            }),
            AllowedFilter::callback('rotation_speed_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('armazenamento', function($q) use ($models){
                    $q->whereIn('rotation_speed', $models);
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
            AllowedFilter::callback('motherboard_format', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('motherboard', function($q) use ($models){
                    $q->whereIn('format', $models);
                });
            }),
            AllowedFilter::callback('motherboard_chipset', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('motherboard', function($q) use ($models){
                    $q->whereIn('chipset', $models);
                });
            }),
            AllowedFilter::callback('motherboard_cpu_socket', function($query, $value){
                $models = is_bool($value) ? $value : [$value];

                $query->whereHas('motherboard', function($q) use ($models){
                    $q->whereIn('cpu_socket', $models);
                });
            }),
            AllowedFilter::callback('motherboard_bluetooth', function($query, $value){

                $query->whereHas('motherboard', function($q) use ($value){
                    $q->where('bluetooth', $value);
                });
            }),
            AllowedFilter::callback('motherboard_wifi', function($query, $value){

                $query->whereHas('motherboard', function($q) use ($value){
                    $q->where('wifi', $value);
                });
            }),
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 15)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 15);
        })->select('id', 'name')->get();

        $motherboard = Motherboard::select('id', 'format', 'chipset', 'cpu_socket', 'ram_support', 'max_ram')->get();

        return Inertia::render('ComponentesPC/motherboardsPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'motherboard' => $motherboard
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
