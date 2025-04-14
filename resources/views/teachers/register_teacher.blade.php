@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <div class="container mt-5">
        <h1>Novo professor</h1>
        <hr>
        <form action="{{ route( 'professores_store') }}" method="POST">
        @csrf
            <div class="form-group">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" name="name" pattern="[A-Za-zÁ-ÿ\s]+" title="Apenas letras." placeholder="Digite seu nome" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="CPF">CPF:</label>
                    <input type="number" class="form-control" name="CPF" placeholder="Digite seu cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" req>
                    @error('CPF')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <br>
                <div class="form-group">
                    <label for="nascimento">Data de nascimento:</label>
                    <input type="date" class="form-control" name="nascimento" placeholder="Digite sua data de nascimento" required>
                </div>
                <br>
                <div class="form-group">
                <label for="escola">Selecione a escola:</label>
                <select id="escola" name="escola">
                    @foreach( $schools as $school)
                    <option value="{{ $school->name }}">{{ $school->name }}</option>
                    @endforeach
                </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit">
                </div>

            </div>
        </form>
    </div>

@endsection