<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validação dos campos de entrada (cpf e senha)
        $credentials = $request->only('cpf', 'senha');

        // Tentativa de autenticação utilizando JWT
        if (!$token = auth('api')->attempt(['cpf' => $credentials['cpf'], 'password' => $credentials['senha']])) {
            return response()->json(['error' => 'Credenciais inválidas'], 401);
        }

        // Se o login for bem-sucedido, retorna o token e as informações do usuário autenticado
        return response()->json([
            'token' => $token,
            'usuario' => auth('api')->user(),
        ]);
    }
}