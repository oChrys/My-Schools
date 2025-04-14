@extends('layouts.master')

@section('title', 'Login')

@section('content')
<a href="{{ route('home')}}">Home</a>

<h1 class="text-center mt-5">My Schools</h1>
<div class="container">
    <h2 class="text-center">Login</h2>

    <form action="{{ route('login_store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="CPF">CPF:</label>
            <input type="text" id="CPF" name="CPF" value="76546576890" >
            @error('CPF')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" value="12345678" >
            @error('senha')
            <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit">Entrar</button>
    </form>

</div>

@endsection