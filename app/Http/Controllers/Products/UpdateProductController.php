<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\Button;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProductController extends Controller
{
    public function showUpdateProductsForm()
    {
        $buttons = Button::all();

        return Inertia::render('Products/updateProduto', [
            'Buttons' => $buttons,
            'Utilizador' => Auth::user(),
         ]);
    }
}
