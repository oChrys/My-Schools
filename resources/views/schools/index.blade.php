@extends('layouts.app')

@section('title', 'Escolas')

@section('content')
<div class="container mt-5 text-white">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10 text-center">
            <h1 class="display-5">Lista de Escolas</h1>
        </div>
        @auth
        @if(auth()->user()->tipo_usuario === 'admin')
        <div class="col-md-2 text-center mt-3 mt-md-0">
            <a href="{{ route('registro_escola') }}" class="btn btn-lg btn-primary">Registrar Escola</a>
        </div>
        @endif
        @endauth
    </div>

    <div class="table-responsive w-100 d-flex justify-content-center">
        <table class="table table-striped table-bordered text-center align-middle" style="max-width: 1000px;">
            <thead class="table-dark">
                <tr>
                    <th class="fs-5 px-4">#</th>
                    <th class="fs-5 px-4">Nome</th>
                    <th class="fs-5 px-4">Endereço</th>
                    @auth
                    @if(auth()->user()->tipo_usuario === 'admin')
                    <th class="fs-5 px-4">Ações</th>
                    @endif
                    @endauth
                </tr>
            </thead>
            <tbody>
                @forelse($schools as $school)
                <tr>
                    <td class="px-4">{{ $school->escola_id }}</td>
                    <td class="px-4">{{ $school->name ?? 'N/A' }}</td>
                    <td class="px-4">{{ $school->endereco ?? 'N/A' }}</td>
                    @auth
                    @if(auth()->user()->tipo_usuario === 'admin')
                    <td>
                        <form action="{{ route('escola_destroy', $school->escola_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar esta escola?')">Deletar</button>
                        </form>
                    </td>
                    @endif
                    @endauth
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Nenhuma escola cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection