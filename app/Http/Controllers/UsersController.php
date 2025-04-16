<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:190',
            'cpf' => 'required|string|unique:users,cpf|max:14',
            'nascimento' => 'required|date',
            'senha' => 'required|string|min:6|confirmed',
            'tipo_usuario' => 'required|in:admin,professor',
        ]);

        // Criar usuário
        $user = User::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'nascimento' => $request->nascimento,
            'senha' => Hash::make($request->senha),
            'tipo_usuario' => $request->tipo_usuario,
        ]);

        if($request->tipo_usuario ==='professor'){
            $professor = new Professor();
            $professor->user_id = $user->id;
            $professor->escola_id = $request->escola_id;
            $professor->save();
        }
            
            //return dd($request);
            return redirect()->route('login')->with('success', 'Professor cadastrado com sucesso!');
    }
    
    public function create()
    {   
        $schools = Escola::all();
        $teachers = Professor::all();
        return view('register', compact('teachers', 'schools'));
    }
}
