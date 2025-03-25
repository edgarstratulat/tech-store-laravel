<?php

namespace App\Http\Controllers;

use App\Models\Button;
use App\Models\Category;
use App\Models\Product;
use App\Models\subCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function SearchProduct(Request $request) {
        $query = $request->input('query');

        $search = Product::search($query)->paginate(12);

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

        $category = Category::select('id', 'name')->get();
        $subCategory = subCategory::select('id', 'name')->get();
        
        return Inertia::render('search',[
            'searchProducts' => $search,
            'category' => $category,
            'subcategory' => $subCategory,
            'Buttons' => $buttons,
            'isAdmin' => $isAdmin,
            'Utilizador' => $user,
            'query' => $query
        ]);
    }
}
