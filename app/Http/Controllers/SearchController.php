<?php

namespace App\Http\Controllers;

use App\Models\Button;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function SearchProduct(Request $request) {
        $query = $request->input('query');

        $search = Product::search($query)->get();

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
        
        return Inertia::render('search',[
            'searchProducts' => $search,
            'Buttons' => $buttons,
            'isAdmin' => $isAdmin,
            'Utilizador' => $user,
            'query' => $query
        ]);
    }
}
