@extends('layouts.app')

@section('title', 'Alunos')

@section('content')

<div class="container mt-5">
<div class="row">
    <div class="col-sm-10">
        <h1>Lista de Alunos</h1>
    </div>
    <div class="col-sm-2">
        <a href="{{ route('registro_aluno') }}" class="btn btn-info">Registrar aluno</a>

    </div>
</div>
    <table class="table">
            <thead>
                <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Professor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <th>{{ $student->id }}</th>
            <td>{{ $student->name }}</td>
            <td>{{ $student->CPF }}</td>
            <td>{{ $student->nascimento }}</td>
            <td>{{ $student->professor }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

@endsection