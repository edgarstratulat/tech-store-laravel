<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $produtos = Produto::all(); 

        return Inertia::render('produtos', [
            'produtos' => $produtos,
        ]);
    }

    public function show($id)
    {
        $produtos = Produto::find($id);

        return Inertia::render('produto', [
            'produto' => $produtos
        ]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|double',
            'desc' => 'nullable|string',
        ]);

        Produto::create($validated);

        return redirect()->route('produtos.index')->with('success', 'Computador adicionado com sucesso!');
    }
}
