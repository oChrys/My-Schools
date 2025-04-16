<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // crie essa view
    }

    public function login(Request $request)
    {
        $request->validate([
            'cpf' => ['required', 'string'],
            'senha' => ['required', 'string'],
        ]);

        $remember = $request->has('remember'); 
        
        if (Auth::attempt(['cpf' => $request->cpf, 'password' => $request->senha], $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }        

        return back()->withErrors([
            'cpf' => 'CPF ou senha incorretos.',
        ])->onlyInput('cpf');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}