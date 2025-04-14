@extends('layouts.app')

@section('title', 'Escolas')

@section('content')

<div class="container mt-5">
<div class="row">
    <div class="col-sm-10">
        <h1>Lista de Escolas</h1>
    </div>
    <div class="col-sm-2">
    <a href="{{ route('registro_escola') }}" class="btn btn-info">Registrar escola</a>

    </div>
</div>
    <table class="table">
            <thead>
                <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Endereço</th>
        </tr>
    </thead>
    <tbody>
        @foreach($schools as $school)
        <tr>
            <th>{{ $school->id }}</th>
            <td>{{ $school->name }}</td>
            <td>{{ $school->endereco }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

@endsection