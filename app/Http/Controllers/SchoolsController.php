<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Escola;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolsController extends Controller
{
    //----Escolas----//

    public function schools()
    {
        $schools = Escola::all();
        return view('schools.index', ['schools' => $schools]);
    }
    public function create_school()
    {
        return view('schools.register_school');
    }

    public function schools_store(Request $request)
    {
        Escola::create($request->all());
        return redirect()->route('escolas');
    }
    public function destroy($id)
    {
        $school = Escola::find($id);
        abort_if(!$school, 404, 'Escola não encontrada');

        $school->delete();

        return redirect()->route('escolas')->with('success', 'Escola deletada com sucesso!');
    }

    //----Alunos----//

    public function index()
    {
        $students = Aluno::with('professor.user')->get();
        return view('students.index', ['students' => $students]);
    }

    public function create(){
        $teachers = Professor::with('user')->get();
        return view('students.register_student', compact('teachers'));
    
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $teacher = Professor::where('user_id', $user->id)->first();

        if (!$teacher) {
            return back()->withErrors(['error' => 'Professor não encontrado para o usuário logado']);
        }

        $request->validate([
            'name' => 'required|string|max:190',
            'cpf' => 'required|numeric|unique:alunos,cpf',
            'nascimento' => 'required|date'
        ], [
            'cpf.cpf' => 'CPF já cadastrado',
        ]);
        
        Aluno::create([
            'name' => $request->name,
            'cpf' => $request->cpf,
            'nascimento' => $request->nascimento,
            'id_professor' => $teacher->id,
        ]);
        //$students = Aluno::with('professor.user')->get();
        //$students = new Aluno($request->all());
        //$students->name = $request->name;
        //$students->cpf = $request->cpf;
        //$students->nascimento = $request->nascimento;
        //$students->id_professor = $teacher->id;
        //$students->save();
        $students = Aluno::all();

        return view('students.index', compact('students'))->with('success', 'Aluno cadastrado com sucesso!');
    }
    public function delete($id)
    {
        $student = Aluno::find($id);
        abort_if(!$student, 404, 'Aluno não encontrada');

        $student->delete();

        return redirect()->route('alunos_index')->with('success', 'Aluno deletado com sucesso!');
    }
}
