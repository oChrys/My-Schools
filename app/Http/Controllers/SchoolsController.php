<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Escola;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SchoolsController extends Controller
{
    //----Escolas----//

    public function schools(){
        $schools = Escola::all();
        return view('schools.index', ['schools'=>$schools]);
    }
    public function create_school(){
        return view('schools.register_school');
    }
    public function schools_store(Request $request){
        Escola::create($request->all());
        return redirect()->route('escolas');
    }

    //----Professores----//

    public function teachers(){
        $teachers = Professor::all();
        return view('teachers.index',['teachers'=>$teachers]);
    }

    public function create_teacher(){
        $schools = Escola::all();
        return view('teachers.register_teacher', compact('schools'));
    }

    public function teachers_store(Request $request){
        $teachers = new Professor($request->all());
        $teachers->name = $request->name;
        $teachers->CPF = $request->CPF;
        $teachers->nascimento = $request->nascimento;
        $teachers->escola = $request->escola;
        $teachers->senha = Hash::make($request->senha);
        $CPF=$request->input('CPF');
        $registered = Professor::where('CPF',$CPF)->exists();
        if($registered){
            return redirect()->route('registro_professor')->withErrors(['CPF'=>'CPF já cadastrado.']);
        } else {
            $teachers->save();
        }
        return redirect()->route('professores');

    }

    //----Alunos----//

    public function index(){
        $students = Aluno::all();
        return view('students.index', ['students'=>$students]);
    }

    public function create(){
        $teachers = Professor::all();
        return view('students.register_student', compact('teachers'));
    }

    public function store(Request $request){
        $students = new Aluno($request->all());
        $students->name = $request->name;
        $students->CPF = $request->CPF;
        $students->nascimento = $request->nascimento;
        $students->professor = $request->professor;
        $students->senha = Hash::make($request->senha);
        $CPF=$request->input('CPF');
        $registered = Aluno::where('CPF',$CPF)->exists();
        if($registered){
            return redirect()->route('registro_aluno')->withErrors(['CPF'=>'CPF já cadastrado.']);
        } else {
            $students->save();
        }
        return redirect()->route('alunos_index');

    }
}
