@extends('layouts.app')

@section('title', 'Professores')

@section('content')

<div class="container mt-5">
<div class="row">
    <div class="col-sm-10">
        <h1>Lista de Professores</h1>
    </div>
    <div class="col-sm-2">
    <a href="{{ route('registro_professor') }}" class="btn btn-info">Registrar professor</a>

    </div>
</div>
    <table class="table">
            <thead>
                <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Data de Nascimento</th>
        <th scope="col">Escola</th>
        </tr>
    </thead>
    <tbody>
        @foreach($teachers as $teacher)
        <tr>
            <th>{{ $teacher->id }}</th>
            <td>{{ $teacher->name }}</td>
            <td>{{ $teacher->CPF }}</td>
            <td>{{ $teacher->nascimento }}</td>
            <td>{{ $teacher->escola }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

@endsection