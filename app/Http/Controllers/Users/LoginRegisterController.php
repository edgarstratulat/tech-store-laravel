<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginRegisterController extends Controller
{
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

    public function userLogout() {
        Auth::logout();
        return Inertia::location('/'); 
    }

}

