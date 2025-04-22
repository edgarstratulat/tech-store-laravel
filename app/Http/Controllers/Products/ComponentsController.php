<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Storage;
use App\Models\Button;
use App\Models\Category;
use App\Models\Computer;
use App\Models\ComputerCase;
use App\Models\cpuCooler;
use App\Models\GPU;
use App\Models\Manufacturer;
use App\Models\Motherboard;
use App\Models\PowerSupply;
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
            AllowedFilter::callback('capacidade_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('storage', function($q) use ($models){
                    $q->whereIn('size', $models);
                });
            }),
            AllowedFilter::callback('tipo_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('storage', function($q) use ($models){
                    $q->whereIn('type', $models);
                });
            }),
            AllowedFilter::callback('velocidade_escrita_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('storage', function($q) use ($models){
                    $q->whereIn('writing_speed', $models);
                });
            }),
            AllowedFilter::callback('velocidade_rotacao_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('storage', function($q) use ($models){
                    $q->whereIn('rotation_speed', $models);
                });
            }),

            AllowedFilter::callback('cpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu', function($q) use ($models){
                    $q->whereIn('model', $models);
                });
            }),
            AllowedFilter::callback('cpu_socket', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu', function($q) use ($models){
                    $q->whereIn('socket', $models);
                });
            }),
            AllowedFilter::callback('cpu_tdp', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu', function($q) use ($models){
                    $q->whereIn('tdp',  $models);
                });
            }),
            AllowedFilter::callback('categoria_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('gpu', function($q) use ($models){
                    $q->whereIn('category', $models);
                });
            }),
            AllowedFilter::callback('modelo_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('gpu', function($q) use ($models){
                    $q->whereIn('model', $models);
                });
            }),
            AllowedFilter::callback('vram_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('gpu', function($q) use ($models){
                    $q->whereIn('vram', $models);
                });
            }),
            AllowedFilter::callback('tipo_vram_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('gpu', function($q) use ($models){
                    $q->whereIn('type_vram', $models);
                });
            }),
            AllowedFilter::callback('interface_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('gpu', function($q) use ($models){
                    $q->whereIn('interface', $models);
                });
            }),
            AllowedFilter::callback('formato_motherboard', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('motherboard', function($q) use ($models){
                    $q->whereIn('format', $models);
                });
            }),
            AllowedFilter::callback('chipset_motherboard', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('motherboard', function($q) use ($models){
                    $q->whereIn('chipset', $models);
                });
            }),
            AllowedFilter::callback('cpu_socket_motherboard', function($query, $value){
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
            AllowedFilter::callback('formato_psu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('powerSupply', function($q) use ($models){
                    $q->whereIn('format', $models);
                });
            }),
            AllowedFilter::callback('watts_psu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('powerSupply', function($q) use ($models){
                    $q->whereIn('wattage', $models);
                });
            }),
            AllowedFilter::callback('efficiency_80_plus', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('powerSupply', function($q) use ($models){
                    $q->whereIn('efficiency', $models);
                });
            }),
            AllowedFilter::callback('modular_psu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('powerSupply', function($q) use ($models){
                    $q->whereIn('modular', $models);
                });
            }),
            AllowedFilter::callback('tipo_cooler', function($query, $value){
                $query->whereHas('cpu_cooler', function($q) use ($value){
                    $q->where('type', $value);
                });
            }),
            AllowedFilter::callback('cooler_socket', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu_cooler', function($q) use ($models){
                    $q->whereIn('socket', $models);
                });
            }),
            AllowedFilter::callback('cooler_fan_rpm', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu_cooler', function($q) use ($models){
                    $q->whereIn('fan_rpm', $models);
                });
            }),
            AllowedFilter::callback('fan_rgb', function($query, $value){

                $query->whereHas('cpu_cooler', function($q) use ($value){
                    $q->where('rgb', $value);
                });
            }),
            AllowedFilter::callback('case_format', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('format', $models);
                });
            }),
            AllowedFilter::callback('tempered_glass', function($query, $value){

                $query->whereHas('pc_case', function($q) use ($value){
                    $q->where('tempered_glass', $value);
                });
            }),
            AllowedFilter::callback('case_number_upper_fans', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('number_upper_fans', $models);
                });
            }),
            AllowedFilter::callback('case_number_lower_fans', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('number_lower_fans', $models);
                });
            }),
            AllowedFilter::callback('case_number_front_fans', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('number_front_fans', $models);
                });
            }),
            AllowedFilter::callback('case_number_rear_fans', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('number_rear_fans', $models);
                });
            }),
            AllowedFilter::callback('case_number_upper_fans', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('number_upper_fans', $models);
                });
            }),
            AllowedFilter::callback('case_max_gpu_length', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('max_gpu_length', $models);
                });
            }),
            AllowedFilter::callback('case_max_cooler_height', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('max_cooler_height', $models);
                });
            }),
            
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

        $ram = Ram::whereHas('product', function($query) {
            $query->where('category_id', 4);
        })->select('type','size','frequency','latency')->get();

        $storage = Storage::whereHas('product', function($query) {
            $query->where('category_id', 4);
        })->select('size', 'type', 'rotation_speed', 'writing_speed', 'reading_speed')->get();

        $cpu = Processor::whereHas('product', function($query) {
            $query->where('category_id', 4);
        })->select('model', 'tdp', 'socket')->get();

        $gpu = GPU::whereHas('product', function($query) {
            $query->where('category_id', 4);
        })->select('category', 'model','vram','type_vram','interface','tdp')->get();

        $motherboard = Motherboard::whereHas('product', function($query) {
            $query->where('category_id', 4);
        })->select('format', 'chipset', 'cpu_socket', 'ram_support', 'max_ram')->get();

        $powersupply = PowerSupply::whereHas('product', function($query) {
            $query->where('category_id', 4);
        })->select('format', 'wattage','efficiency','modular')->get();

        $cpucooler = cpuCooler::whereHas('product', function($query) {
            $query->where('category_id', 4);
        })->select('socket', 'type', 'fan_rpm', 'air_flow', 'rgb')->get();

        $case = ComputerCase::whereHas('product', function($query) {
            $query->where('category_id', 4);
        })->select('format','motherboard_supported','number_front_fans','number_lower_fans', 'number_upper_fans','number_rear_fans','max_gpu_length','max_cooler_height','tempered_glass')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->where('category_id', 4)->get();

        return Inertia::render('PCcomponents/PCcomponentsPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'manufacturer' => $manufacturer,
            'category' => $category,
            'subcategory' => $subCategory,
            'ram' => $ram,
            'storage' => $storage,
            'cpu' => $cpu,
            'gpu' => $gpu,
            'motherboard' => $motherboard,
            'powersupply' => $powersupply,
            'cpuCooler' => $cpucooler,
            'PCcase' => $case
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
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 10)->paginate(12)->appends(request()->query());

        $cpu = Processor::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 10);
        })->select('id', 'model', 'tdp', 'socket')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 10);
        })->select('id', 'name')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();


        return Inertia::render('PCcomponents/ProcessorPage', [
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
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 11)->paginate(12)->appends(request()->query());

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 11);
        })->select('id', 'name')->get();


        $ram = Ram::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 11);
        })->select('id', 'type','size', 'frequency', 'latency')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('PCcomponents/RamPage', [
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

    public function showStorage()
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

                $query->whereHas('storage', function($q) use ($models){
                    $q->whereIn('size', $models);
                });
            }),
            AllowedFilter::callback('tipo_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('storage', function($q) use ($models){
                    $q->whereIn('type', $models);
                });
            }),
            AllowedFilter::callback('velocidade_escrita_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('storage', function($q) use ($models){
                    $q->whereIn('writing_speed', $models);
                });
            }),
            AllowedFilter::callback('velocidade_rotacao_drive', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('storage', function($q) use ($models){
                    $q->whereIn('rotation_speed', $models);
                });
            }),
            
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 12)->paginate(12)->appends(request()->query());

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 12);
        })->select('id', 'name')->get();
 
        $storage = Storage::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 12);
        })->select('id', 'size', 'type', 'rotation_speed', 'writing_speed', 'reading_speed')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        return Inertia::render('PCcomponents/StoragePage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'storage' => $storage
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
            AllowedFilter::callback('formato_motherboard', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('motherboard', function($q) use ($models){
                    $q->whereIn('format', $models);
                });
            }),
            AllowedFilter::callback('chipset_motherboard', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('motherboard', function($q) use ($models){
                    $q->whereIn('chipset', $models);
                });
            }),
            AllowedFilter::callback('cpu_socket_motherboard', function($query, $value){
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
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 13)->paginate(12)->appends(request()->query());

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 13);
        })->select('id', 'name')->get();


        $motherboard = Motherboard::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 13);
        })->select('id', 'format', 'chipset', 'cpu_socket', 'ram_support', 'max_ram')->get();


        return Inertia::render('PCcomponents/MotherboardsPage', [
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
            AllowedFilter::callback('categoria_gpu', function($query, $value){
                $query->whereHas('gpu', function($q) use ($value){
                    $q->where('category', '=', $value);
                });
            }),
            AllowedFilter::callback('modelo_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('gpu', function($q) use ($models){
                    $q->whereIn('model', $models);
                });
            }),
            AllowedFilter::callback('vram_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('gpu', function($q) use ($models){
                    $q->whereIn('vram', $models);
                });
            }),
            AllowedFilter::callback('tipo_vram_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('gpu', function($q) use ($models){
                    $q->whereIn('type_vram', $models);
                });
            }),
            AllowedFilter::callback('interface_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('gpu', function($q) use ($models){
                    $q->whereIn('interface', $models);
                });
            }),
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 14)->paginate(12)->appends(request()->query());

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 14);
        })->select('id', 'name')->get();


        $gpu = GPU::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 14);
        })->select('category', 'model','vram','type_vram','interface','tdp')->get();

        return Inertia::render('PCcomponents/GpuPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'gpu' => $gpu
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
            AllowedFilter::callback('efficiency_80_plus', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('powerSupply', function($q) use ($models){
                    $q->whereIn('efficiency', $models);
                });
            }),
            AllowedFilter::callback('watts_psu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('powerSupply', function($q) use ($models){
                    $q->whereIn('wattage', $models);
                });
            }),
            AllowedFilter::callback('formato_psu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('powerSupply', function($q) use ($models){
                    $q->whereIn('format', $models);
                });
            }),
            AllowedFilter::callback('modular_psu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('powerSupply', function($q) use ($models){
                    $q->whereIn('modular', $models);
                });
            }),
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 15)->paginate(12)->appends(request()->query());

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 15);
        })->select('id', 'name')->get();

        $powersupply = PowerSupply::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 15);
        })->select('format', 'wattage','efficiency','modular')->get();

        return Inertia::render('PCcomponents/PowerSupplyPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'powersupply' => $powersupply
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
            AllowedFilter::callback('cooler_fan_rpm', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu_cooler', function($q) use ($models){
                    $q->whereIn('fan_rpm', $models);
                });
            }),
            AllowedFilter::callback('tipo_cooler', function($query, $value){
                $query->whereHas('cpu_cooler', function($q) use ($value){
                    $q->where('type', '=', $value);
                });
            }),
            AllowedFilter::callback('cooler_socket', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('cpu_cooler', function($q) use ($models){
                    $q->whereIn('socket', $models);
                });
            }),
            AllowedFilter::callback('fan_rgb', function($query, $value){

                $query->whereHas('cpu_cooler', function($q) use ($value){
                    $q->where('rgb', $value);
                });
            }),

        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 16)->paginate(12)->appends(request()->query());

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 16);
        })->select('id', 'name')->get();

        $cpucooler = cpuCooler::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 16);
        })->select('id', 'socket', 'type', 'fan_rpm', 'air_flow', 'rgb')->get();

        return Inertia::render('PCcomponents/CPUcoolersPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'cpuCooler' => $cpucooler
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
            AllowedFilter::callback('tempered_glass', function($query, $value){

                $query->whereHas('pc_case', function($q) use ($value){
                    $q->where('tempered_glass', $value);
                });
            }),
            AllowedFilter::callback('case_format', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('format', $models);
                });
            }),
            AllowedFilter::callback('case_number_front_fans', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('number_front_fans', $models);
                });
            }),
            AllowedFilter::callback('case_number_rear_fans', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('number_rear_fans', $models);
                });
            }),
            AllowedFilter::callback('case_number_lower_fans', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('number_lower_fans', $models);
                });
            }),
            AllowedFilter::callback('case_number_upper_fans', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('number_upper_fans', $models);
                });
            }),
            AllowedFilter::callback('case_max_gpu_length', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('max_gpu_length', $models);
                });
            }),
            AllowedFilter::callback('case_max_cooler_height', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('pc_case', function($q) use ($models){
                    $q->whereIn('max_cooler_height', $models);
                });
            }),
            
        ])
        ->defaultSort('-created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])
        ->with('category')->with('subcategory')->where('category_id', 4)->where('subcategory_id', 17)->paginate(12)->appends(request()->query());

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 17);
        })->select('id', 'name')->get();

        $case = ComputerCase::select(
            'id',
            'format',
            'motherboard_supported',
            'number_front_fans',
            'number_lower_fans',
            'number_upper_fans',
            'number_rear_fans',
            'max_gpu_length',
            'max_cooler_height',
            'tempered_glass')
        ->get();

        $case = ComputerCase::whereHas('product', function($query) {
            $query->where('category_id', 4)->where('subcategory_id', 17);
        })->select(
            'id',
            'format',
            'motherboard_supported',
            'number_front_fans',
            'number_lower_fans',
            'number_upper_fans',
            'number_rear_fans',
            'max_gpu_length',
            'max_cooler_height',
            'tempered_glass')
        ->get();

        return Inertia::render('PCcomponents/PCcasesPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'PCcases' => $case
        ]);
    }
}
