<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Armazenamento;
use App\Models\Button;
use App\Models\Category;
use App\Models\Computer;
use App\Models\ComputerCase;
use App\Models\GPU;
use App\Models\Manufacturer;
use App\Models\Motherboard;
use App\Models\PowerSupply;
use App\Models\Processor;
use App\Models\Product;
use App\Models\Ram;
use App\Models\Storage;
use App\Models\subCategory;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ComputersController extends Controller
{
    public function showComputers()
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
            AllowedFilter::callback('computer_processor', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('processor', $models);
                });
            }),
            AllowedFilter::callback('computer_memory_ram', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('ram', $models);
                });
            }),
            AllowedFilter::callback('computer_motherboard', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('motherboard', $models);
                });
            }),
            AllowedFilter::callback('computer_storage', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('storage', $models);
                });
            }),
            AllowedFilter::callback('computer_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('gpu', $models);
                });
            }),
            AllowedFilter::callback('computer_powersupply', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('powersupply', $models);
                });
            }),
            AllowedFilter::callback('computer_case', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('case', $models);
                });
            }),
            AllowedFilter::callback('computer_integrated_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('integrated_gpu', $models);
                });
            }),
            
        ])
        ->defaultSorts('created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])
        ->with(['category', 'subcategory'])
        ->where('category_id', 1)
        ->paginate(12)->appends(request()->query());

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 1);
        })->select('id', 'name')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->where('category_id', 1)->get();

        $computer = Computer::select(
            'processor',
            'motherboard',
            'ram',
            'storage',
            'gpu',
            'case',
            'powersupply'
        )->get();

        $cpu = Processor::whereHas('computers.product', function($query) {
            $query->where('category_id', 1);
        })->select('id', 'model')->get();

        $ram= Ram::whereHas('computers.product', function($query) {
            $query->where('category_id', 1);
        })->select('id', 'size')->get();

        $mobo= Motherboard::whereHas('computers.product', function($query) {
            $query->where('category_id', 1);
        })->select('id', 'chipset')->get();

        $storage = Storage::whereHas('computers.product', function($query) {
            $query->where('category_id', 1);
        })->select('id', 'size')->get();

        $gpu = GPU::whereHas('computers.product', function($query) {
            $query->where('category_id', 1);
        })->select('id', 'model')->get();

        $psu = PowerSupply::whereHas('computers.product', function($query) {
            $query->where('category_id', 1);
        })->select('id', 'wattage')->get();

        $case = ComputerCase::whereHas('computers.product', function($query) {
            $query->where('category_id', 1);
        })->select('id', 'format')->get();

        $pc = Computer::whereHas('product', function($query) {
            $query->where('category_id', 1);
        })->select('integrated_gpu')->get();

        return Inertia::render('Computers/ComputersPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'manufacturer' => $manufacturer,
            'category' => $category,
            'subcategory' => $subCategory,
            'computer' => $computer,
            'cpu' => $cpu,
            'ram' => $ram,
            'motherboard' => $mobo,
            'storage' => $storage,
            'gpu' => $gpu,
            'powersupply' => $psu,
            'PCcases' => $case,
            'computers' => $pc
        ]);
    }

    public function showDesktopComputers()
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
            AllowedFilter::callback('computer_processor', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('processor', $models);
                });
            }),
            AllowedFilter::callback('computer_memory_ram', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('ram', $models);
                });
            }),
            AllowedFilter::callback('computer_motherboard', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('motherboard', $models);
                });
            }),
            AllowedFilter::callback('computer_storage', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('storage', $models);
                });
            }),
            AllowedFilter::callback('computer_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('gpu', $models);
                });
            }),
            AllowedFilter::callback('computer_powersupply', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('powersupply', $models);
                });
            }),
            AllowedFilter::callback('computer_case', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('case', $models);
                });
            }),
            AllowedFilter::callback('computer_integrated_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('integrated_gpu', $models);
                });
            }),
            
        ])
        ->defaultSorts('created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])
        ->with('category', 'subcategory')->where('category_id', 1)->where('subcategory_id', 1)->paginate(12);

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('id', 'name')->get();

        $cpu = Processor::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('id', 'model')->get();

        $ram = Ram::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('id', 'size')->get();

        $mobo = Motherboard::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('id', 'chipset')->get();

        $storage = Storage::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('id', 'size')->get();

        $gpu = GPU::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('id', 'model')->get();

        $psu = PowerSupply::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('id', 'wattage')->get();

        $case = ComputerCase::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('id', 'format')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $case = ComputerCase::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('id', 'format')->get();

        $pc = Computer::whereHas('product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 1);
        })->select('integrated_gpu')->get();

        return Inertia::render('Computers/DesktopPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'cpu' => $cpu,
            'ram' => $ram,
            'motherboard' => $mobo,
            'storage' => $storage,
            'gpu' => $gpu,
            'powersupply' => $psu,
            'PCcases' => $case,
            'computers' => $pc
        ]);
    }

    public function showLaptopsComputers()
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
            AllowedFilter::callback('computer_processor', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('processor', $models);
                });
            }),
            AllowedFilter::callback('computer_memory_ram', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('ram', $models);
                });
            }),
            AllowedFilter::callback('computer_storage', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('storage', $models);
                });
            }),
            AllowedFilter::callback('computer_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('gpu', $models);
                });
            }),
            AllowedFilter::callback('computer_integrated_gpu', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('computer', function($q) use ($models){
                    $q->whereIn('integrated_gpu', $models);
                });
            }),
            
        ])
        ->defaultSorts('created_at')
        ->allowedSorts([
            'price', '-price', 'created_at'
        ])
        ->with('category', 'subcategory')->where('category_id', 1)->where('subcategory_id', 2)->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 2);
        })->select('id', 'name')->get();

        $cpu = Processor::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 2);
        })->select('id', 'model')->get();

        $ram = Ram::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 2);
        })->select('id', 'size')->get();

        $storage = Storage::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 2);
        })->select('id', 'size')->get();

        $gpu = GPU::whereHas('computers.product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 2);
        })->select('id', 'model')->get();

        $pc = Computer::whereHas('product', function($query) {
            $query->where('category_id', 1)->where('subcategory_id', 2);
        })->select('integrated_gpu')->get();


        return Inertia::render('Computers/LaptopPage', [
            'buttons' => $buttons,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'products' => $products,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'cpu' => $cpu,
            'ram' => $ram,
            'storage' => $storage,
            'gpu' => $gpu,
            'computers' => $pc
        ]);
    }

}
