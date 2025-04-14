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
            'CPF' => 'required|CPF',
            'senha' => 'required'
        ],[
            'CPF.required' => 'O CPF é obrigatório.',
            'CPF.CPF' => 'CPF inválido.'
        ]);

        return dd('Sucesso');

    }
    public function destroy(){
        return dd('Sair');
    }
}
