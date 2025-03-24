<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminButton;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function showAdminPanel()
    {
        $adminBtn = AdminButton::all(
            'id',
            'button_name',
            'route',
            'icon',
            'dropdown',
            'dropdownOptions'
        );
        
        $user = Auth::user();

        return Inertia::render('Admin/adminPage', [
            'adminBtn' => $adminBtn,
            'Utilizador' => $user, 
        ]);
    }
}
