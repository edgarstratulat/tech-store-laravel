<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Acessorio;
use App\Models\Button;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Computer;
use App\Models\Periferico;
use App\Models\Telemovel;
use App\Models\ComponentePC;
use App\Models\Promocoes;
use Illuminate\Support\Facades\Auth;
class CreateProductController extends Controller
{
    public function showProducts() {

        $buttons = Button::all();

        return Inertia::render('Admin/Products/addProduto', [
            'Utilizador' => Auth::user(),
            'Buttons' => $buttons
        ]);
    }

    public function createProducts(Request $request) {
        $request->validate([
            'name' => 'required|min:2',
            'price' => 'numeric|min:0.01',
            'sale_price' => 'numeric|min:0|max:100',
            'desc' => 'required',
            'category' => 'required',
            'subCategory' => 'required',
            'stock' => 'required|numeric',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        if($request->category == 'Telemóveis' && $request->subCategory) {

            $promocaoId = null;

            if ($request->sale_price > 0) {
                $promocao = Promocoes::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath
            ]);
    
            $promocaoId = $promocao->id;
    
            }

            Telemovel::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath,
                'promocao_id' => $promocaoId
            ]);  
        }

        if($request->category == 'Computadores' && $request->subCategory ){

            $promocaoId = null;

            if ($request->sale_price > 0) {
                $promocao = Promocoes::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath
            ]);

            $promocaoId = $promocao->id;
    
            }

            Computer::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath,
                'promocao_id' => $promocaoId
            ]);
        }
        
        if($request->category == 'Periféricos' && $request->subCategory ) {

            $promocaoId = null;

            if ($request->sale_price > 0) {
                $promocao = Promocoes::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath
            ]);

            $promocaoId = $promocao->id;
    
        }

            Periferico::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath,
                'promocao_id' => $promocaoId
            ]);
        } 
   
        if($request->category == 'Componentes' && $request->subCategory) {

            $promocaoId = null;

            if ($request->sale_price > 0) {
                $promocao = Promocoes::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath
            ]);

            $promocaoId = $promocao->id;
    
        }

            ComponentePC::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath,
                'promocao_id' => $promocaoId
            ]);
        }

        if($request->category == 'Acessórios' && $request->subCategory ) {

            $promocaoId = null;

            if ($request->sale_price > 0) {
                $promocao = Promocoes::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath
            ]);

            $promocaoId = $promocao->id;
    
        }

            Acessorio::create([
                'name' => $request->name,
                'price' => $request->price,
                'sale_price' => $request->sale_price,
                'desc' => $request->desc,
                'category' => $request->category,
                'subCategory' => $request->subCategory,
                'stock' => $request->stock,
                'image_path' => $imagePath,
                'promocao_id' => $promocaoId
            ]);
        } 
        
        return Inertia::location('/');
    
        }

    }
