<?php

namespace App\Http\Controllers;

use App\Models\Computador;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComputerController extends Controller
{
    public function index()
    {
        $computadores = Computador::all(); 

        return Inertia::render('computadores', [
            'computadores' => $computadores,
        ]);
    }

    public function show($id)
    {
        $computadores = Computador::find($id);

        return Inertia::render('computador', [
            'computador' => $computadores
        ]);
    }

    public function store(Request $request)
    {
        $computadores = Computador::create($request->all());
        return response()->json($computadores, 201);
    }

    public function update(Request $request, $id)
    {
        $computadores = Computador::find($id);
        $computadores->update($request->all());
        return response()->json($computadores, 200);
    }

    public function destroy($id)
    {
        Computador::destroy($id);
        return response()->json(null, 204);
    }
}
