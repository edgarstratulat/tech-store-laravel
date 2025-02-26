<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computador;

class ComputerApiController extends Controller
{
    public function index(){
        $computador = Computador::all();

        return response()->json($computador);
    }

    public function show($id)
    {
        $computadores = Computador::find($id);
        return response()->json($computadores);
    }
}
