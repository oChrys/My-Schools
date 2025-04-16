<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Professor;
use Illuminate\Support\Facades\Hash;

class TeachersController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:190',
            'cpf' => 'required|string|unique:users,cpf|max:14',
            'nascimento' => 'required|date',
            'senha' => 'required|string|min:6|confirmed',
            'escola_id' => 'required|exists:escolas,escola_id',
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

            $teachers = Professor::all();

            return view('teachers.index', compact('teachers'))->with('success', 'Professor cadastrado com sucesso!');
        }
        
        return redirect()->route('login')->with('success', 'Admin cadastrado com sucesso!');
        
    }
    public function teachers()
    {
        $teachers = Professor::with('user', 'escola')->whereHas('user', function ($query) {
            $query->where('tipo_usuario', 'professor');
        })->with('user')->get();        

        return view('teachers.index', compact('teachers'));
    }
    public function create()
    {   
        $schools = Escola::all();
        $teachers = Professor::all();
        return view('teachers.register_teacher', compact('teachers', 'schools'));
    }
    public function destroy($id)
    {
        $professor = Professor::where('user_id', $id)->first();
        if ($professor) {
            $professor->delete();
        }

        User::where('id', $id)->delete();

        return redirect()->route('professores')->with('success', 'Professor deletado com sucesso!');
    }
}
