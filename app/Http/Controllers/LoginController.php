<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //----Login----//
    public function home(){
        return view('home');
    }

    public function index(){
        return view('login');
    }
    public function store(Request $request){
        $request->validate([
            'cpf' => 'required|cpf',
            'senha' => 'required'
        ]);
        dd($request);
    }
    
    public function destroy(){
        return dd('Sair');
    }
}
