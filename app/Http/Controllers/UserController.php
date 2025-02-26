<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class UserController extends Controller
{
    public function registerForm() {
        return Inertia::render('Auth/register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('Auth/login')->with('success', 'Registado com sucesso!');

    }


    // Login

    public function showLoginForm() {
        return Inertia::render('Auth/login');
    }

    public function login(Request $request)
    {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        return redirect()->intended('/');
    }

    return redirect('Auth/login')->with('error', 'Invalid credentials. Please try again.');
    }
}
