@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <div class="container mt-5">
        <h1 class="text-white">Nova escola</h1>
        <br>
        <form action="{{ route( 'escolas_store') }}" method="POST">
        @csrf
            <div class="form-group">
                <div class="form-group">
                    <label class="text-white" for="nome">Nome:</label>
                    <input type="text" class="form-control" name="name" placeholder="Digite o nome" required>
                </div>
                <br>
                <div class="form-group">
                    <label class="text-white" for="endereco">Endereço:</label>
                    <input type="text" class="form-control" name="endereco" placeholder="Digite o endereço" required>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary text-white" name="submit">
                </div>

            </div>
        </form>
    </div>

@endsection