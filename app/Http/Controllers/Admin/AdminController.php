<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function showAdminPanel()
    {
        return Inertia::render('Admin/adminPage');
    }
}
