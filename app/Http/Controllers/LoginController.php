<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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
