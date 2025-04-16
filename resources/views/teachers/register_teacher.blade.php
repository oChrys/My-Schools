@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div class="container mt-5">
    <h1 class="text-white">Novo professor</h1>
    <br>
    <form action="{{ route( 'professores_store') }}" method="POST">
        @csrf
        <div class="form-group">
            <div class="form-group">
                <label class="text-white" for="name">Nome:</label>
                <input type="text" class="form-control" name="name" pattern="[A-Za-zÁ-ÿ\s]+" title="Apenas letras." placeholder="Digite seu nome" required>
            </div>
            <br>
            <div class="form-group">
                <label class="text-white" for="cpf">CPF:</label>
                <input type="number" class="form-control" name="cpf" placeholder="Digite seu cpf" req>
                @error('cpf')
                <div class="text-danger text-white">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label class="text-white" for="nascimento">Data de nascimento:</label>
                <input type="date" class="form-control" name="nascimento" placeholder="Digite sua data de nascimento" required>
            </div>
            @auth
                @if(auth()->user()->tipo_usuario === 'admin')    
            <br>
            <div class="form-group">
                <label class="text-white" for="tipo_usuario">Selecione o tipo de usuário:</label>
                <select id="tipo_usuario" name="tipo_usuario" required>
                    <option value="">Selecione</option>
                    <option value="admin">Admin</option>
                    <option value="professor">Professor</option>
                </select>
            </div>
            <br>
            @else
            <div class="form-group">
                <label class="text-white" for="tipo_usuario">Usuário:</label>
                <select id="tipo_usuario" name="tipo_usuario" required>
                    <option value="professor">Professor</option>
                </select>
            </div>
            @endif
            @endauth
            <br>
            <div class="form-group">
                <label class="text-white" for="escola_id">Selecione a escola:</label>
                <select name="escola_id" id="escola_id" required>
                    @forelse($schools as $school)
                <option value="{{$school->escola_id}}">{{$school->name}}</option>
                @empty
                <option disabled>Nenhuma escola cadastrada</option>
                @endforelse
            </select>
            </div>
            <br>
            <div class="form-group">
                <label class="text-white" for="senha">Senha:</label>
                <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
            </div>
            <br>
            <div class="form-group">
                <label class="text-white" for="senha_confirmation">Confirmar senha:</label>
                <input type="password" class="form-control" name="senha_confirmation" placeholder="Confirme sua senha" required>
            </div>
            <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary text-white" name="submit">
            </div>

        </div>
    </form>
</div>

@endsection