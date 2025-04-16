@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <div class="container mt-5">
        <h1 class="text-white">Novo aluno</h1>
        <br>
        <form action="{{ route( 'alunos_store') }}" method="POST">
        @csrf
            <div class="form-group">
                <div class="form-group">
                    <label class="text-white" for="nome">Nome:</label>
                    <input type="text" class="form-control" name="name" pattern="[A-Za-zÁ-ÿ\s]+" title="Apenas letras." placeholder="Digite seu nome" required>
                </div>
                <br>
                <div class="form-group">
                    <label class="text-white" for="cpf">CPF:</label>
                    <input type="number" class="form-control" name="cpf" placeholder="Digite seu cpf" required>
                    @error('cpf')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <label class="text-white" for="nascimento">Data de nascimento:</label>
                    <input type="date" class="form-control" name="nascimento" placeholder="Digite sua data de nascimento" required>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary text-white" name="submit">
                </div>

            </div>
        </form>
    </div>

@endsection