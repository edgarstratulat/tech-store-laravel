<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Produto;

class CreateProductController extends Controller
{
    public function showProducts() {
        return Inertia::render('addProduto');
    }

    public function createProducts(Request $request) {
        $request->validate([
            'name' => 'required|min:2',
            'price' => 'numeric',
            'desc' => 'required',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Produto::create([
            'name' => $request->name,
            'price' => $request->price,
            'desc' => $request->desc,
            'image_path' => $imagePath
        ]);

        return Inertia::location('/');
    
    }

}
