<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminButton;
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

        return Inertia::render('Admin/adminPage', [
            'adminBtn' => $adminBtn
        ]);
    }
}
