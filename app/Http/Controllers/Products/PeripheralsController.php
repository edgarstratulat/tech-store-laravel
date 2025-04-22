<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Button;
use App\Models\Category;
use App\Models\Keyboard;
use App\Models\Manufacturer;
use App\Models\Monitor;
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
            AllowedFilter::callback('keyboard_interface', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('keyboard', function($q) use ($models){
                    $q->whereIn('interface', $models);
                });
            }),
            AllowedFilter::callback('keyboard_type', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('keyboard', function($q) use ($models){
                    $q->whereIn('type', $models);
                });
            }),
            AllowedFilter::callback('keyboard_light', function($query, $value){

                $query->whereHas('keyboard', function($q) use ($value){
                    $q->where('light', $value);
                });
            }),
            AllowedFilter::callback('keyboard_numpad', function($query, $value){

                $query->whereHas('keyboard', function($q) use ($value){
                    $q->where('numpad', $value);
                });
            }),
            AllowedFilter::callback('keyboard_layout', function($query, $value){

                $query->whereHas('keyboard', function($q) use ($value){
                    $q->where('layout', $value);
                });
            }),
            AllowedFilter::callback('monitor_inclination', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('inclination', $value);
                });
            }),
            AllowedFilter::callback('monitor_format', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('format', $value);
                });
            }),
            AllowedFilter::callback('monitor_ratio', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('ratio', $value);
                });
            }),
            AllowedFilter::callback('monitor_resolution', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('resolution', $value);
                });
            }),
            AllowedFilter::callback('monitor_inches', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('inches', $value);
                });
            }),
            AllowedFilter::callback('monitor_refresh_rate', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('refresh_rate', $value);
                });
            }),
            AllowedFilter::callback('monitor_response_time', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('response_time', $value);
                });
            }),
            AllowedFilter::callback('monitor_type_panel', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('type_panel', $value);
                });
            }),
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

        $mice = Mouse::whereHas('product', function($query) {
            $query->where('category_id', 2)->where('subcategory_id', 4);
        })->select('format', 'interface', 'dpi', 'response_time')->get();

        $keyboard = Keyboard::whereHas('product', function($query) {
            $query->where('category_id', 2);
        })->select('interface','type','light','numpad','layout')->get();

        $monitor = Monitor::whereHas('product', function($query) {
            $query->where('category_id', 2)->where('subcategory_id', 5);
        })->select('inclination','format','ratio','resolution','inches','refresh_rate','response_time','type_panel')->get();

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->where('category_id', 2)->get();


        return Inertia::render('Peripherals/PeripheralsPage', [
            'buttons' => $buttons,
            'products' => $products,
            'manufacturer' => $manufacturer,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory,
            'mouse' => $mice,
            'keyboard' => $keyboard,
            'monitor' => $monitor
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

        return Inertia::render('Peripherals/MousePage', [
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

    public function showPeripheralsKeyboard()
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
            AllowedFilter::callback('keyboard_interface', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('keyboard', function($q) use ($models){
                    $q->whereIn('interface', $models);
                });
            }),
            AllowedFilter::callback('keyboard_type', function($query, $value){
                $models = is_array($value) ? $value : [$value];

                $query->whereHas('keyboard', function($q) use ($models){
                    $q->whereIn('type', $models);
                });
            }),
            AllowedFilter::callback('keyboard_light', function($query, $value){

                $query->whereHas('keyboard', function($q) use ($value){
                    $q->where('light', $value);
                });
            }),
            AllowedFilter::callback('keyboard_numpad', function($query, $value){

                $query->whereHas('keyboard', function($q) use ($value){
                    $q->where('numpad', $value);
                });
            }),
            AllowedFilter::callback('keyboard_layout', function($query, $value){

                $query->whereHas('keyboard', function($q) use ($value){
                    $q->where('layout', $value);
                });
            }),
        ])
        ->allowedSorts([
            'price', '-price', '-created_at'
        ])
        ->with('category', 'subcategory')
        ->where('category_id', 2)
        ->where('subcategory_id', 18)
        ->paginate(12)
        ->appends(request()->query());

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 2)->where('subcategory_id', 18);
        })->select('id', 'name')->get();

        $keyboard = Keyboard::whereHas('product', function($query) {
            $query->where('category_id', 2)->where('subcategory_id', 18);
        })->select('interface','type','light','numpad','layout')->get();

        return Inertia::render('Peripherals/KeyboardPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory,
            'keyboard' => $keyboard,
            'manufacturer' => $manufacturer
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
            AllowedFilter::callback('monitor_inclination', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('inclination', $value);
                });
            }),
            AllowedFilter::callback('monitor_format', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('format', $value);
                });
            }),
            AllowedFilter::callback('monitor_ratio', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('ratio', $value);
                });
            }),
            AllowedFilter::callback('monitor_resolution', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('resolution', $value);
                });
            }),
            AllowedFilter::callback('monitor_inches', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('inches', $value);
                });
            }),
            AllowedFilter::callback('monitor_refresh_rate', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('refresh_rate', $value);
                });
            }),
            AllowedFilter::callback('monitor_response_time', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('response_time', $value);
                });
            }),
            AllowedFilter::callback('monitor_type_panel', function($query, $value){

                $query->whereHas('monitor', function($q) use ($value){
                    $q->where('type_panel', $value);
                });
            }),
        ])
            ->allowedSorts([
                'price', '-price', '-created_at'
            ])
            ->with('category', 'subcategory')
                ->where('category_id', 2)
                ->where('subcategory_id', 5)
                ->paginate(12);

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();

        $manufacturer = Manufacturer::whereHas('product', function($query) {
            $query->where('category_id', 2)->where('subcategory_id', 5);
        })->select('id', 'name')->get();

        $monitor = Monitor::whereHas('product', function($query) {
            $query->where('category_id', 2)->where('subcategory_id', 5);
        })->select('inclination','format','ratio','resolution','inches','refresh_rate','response_time','type_panel')->get();

        return Inertia::render('Peripherals/MonitorPage', [
            'buttons' => $buttons,
            'products' => $products,
            'Utilizador' => $user,
            'isAdmin' => $isAdmin,
            'category' => $category,
            'subcategory' => $subCategory,
            'manufacturer' => $manufacturer,
            'monitor' => $monitor
        ]);
    }

}
