<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\AdminButton;
use App\Models\Category;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CreateProductController extends Controller
{
    public function showProducts() {

        $buttons = AdminButton::select(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        )->get();
        $categories = Category::select('id', 'name')->get();
        $subCategories = subCategory::select('id', 'name')->get();

        $user = Auth::user();
        
        return Inertia::render('Admin/Products/addProduto', [
            'adminBtn' => $buttons,
            'categories' => $categories,
            'subcategories' => $subCategories,
            'Utilizador' => $user
        ]);
    }

    public function createProducts(Request $request) {

        $request->validate([
            'name' => 'required|min:2',
            'price' => 'required|numeric',
            'sale_price' => 'numeric|max:100',
            'description' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            $imagePath = null;
        }

            Product::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'description' => $request->description,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'stock' => $request->stock,
                'image_path' => $imagePath,
            ]);  

        
        return Inertia::location('/dashboard');
    
        }

    }
