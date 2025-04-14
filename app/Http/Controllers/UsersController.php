<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aluno;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function store(){
        return view('login');
    }
}
/*
class UsersController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|size:11|unique:users',
            'senha' => 'required|string|min:6',
            'data_nascimento' => 'required|date',
            'tipo_usuario' => 'required|in:aluno,professor',
            'escola_id' => 'required_if:tipo_usuario,professor|exists:escolas,id',
            'professor_id' => 'required_if:tipo_usuario,aluno|exists:professores,id',
        ]);

        $user = User::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'senha' => Hash::make($request->senha),
            'data_nascimento' => $request->data_nascimento,
            'tipo_usuario' => $request->tipo_usuario,
        ]);

        if ($request->tipo_usuario === 'professor') {
            Professor::create([
                'usuario_id' => $user->id,
                'escola_id' => $request->escola_id,
            ]);
        }

        if ($request->tipo_usuario === 'aluno') {
            Aluno::create([
                'usuario_id' => $user->id,
                'professor_id' => $request->professor_id,
            ]);
        }

        return response()->json(['message' => 'Usuário criado com sucesso'], 201);
    }
}*/
