<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{

    public function showPageRegister() {
        return Inertia::render('addUser');
    }

    public function createUser(Request $request) {
        $createUserValidation  = $request->validate([
            'name' => 'string|required|max:18',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required',
        ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            
        return Inertia::render('home');
    }


    //Login

    public function showPageLogin() {
        return Inertia::render('loginUser');
    }

}
