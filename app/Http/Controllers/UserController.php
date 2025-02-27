<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    // Register

    public function showPageRegister() {
        return Inertia::render('addUser');
    }

    public function createUser(Request $request) {
        $request->validate([
            'name' => 'string|required|max:18',
            'email' => 'required|email|unique:Users,email',
            'password' => 'required',
        ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);
            
        return Inertia::location('/');
    }

    //Login

    public function showPageLogin() {
        return Inertia::render('loginUser');
    }

    public function userAuth(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return Inertia::location('/'); 
        } else {
            return 'Dados Inválidos!';
        }
    }

    // Logout

    public function userLogout() {
        Auth::logout();
        return Inertia::location('/login'); 
    }
}
