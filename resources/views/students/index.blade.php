@extends('layouts.app')

@section('title', 'Alunos')

@section('content')
<div class="container mt-5 text-white">
    <div class="row justify-content-center mb-4">
        <div class="col-md-10 text-center">
            <h1 class="display-5">Lista de Alunos</h1>
        </div>
        <div class="col-md-2 text-center mt-3 mt-md-0">
            <a href="{{ route('registro_aluno') }}" class="btn btn-lg btn-primary">Cadastrar aluno</a>
        </div>
    </div>

    <div class="table-responsive w-100 d-flex justify-content-center">
        <table class="table table-striped table-bordered text-center align-middle" style="max-width: 1000px;">
            <thead class="table-dark">
                <tr>
                    <th class="fs-5 px-4">#</th>
                    <th class="fs-5 px-4">Nome</th>
                    <th class="fs-5 px-4">CPF</th>
                    <th class="fs-5 px-4">Data de Nascimento</th>
                    <th class="fs-5 px-4">Professor</th>
                    <th class="fs-5 px-4">Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr>
                    <td class="px-4">{{ $student->id }}</td>
                    <td class="px-4">{{ $student->name ?? 'N/A' }}</td>
                    <td class="px-4">{{ $student->cpf ?? 'N/A' }}</td>
                    <td class="px-4">{{ $student->nascimento ?? 'N/A' }}</td>
                    <td class="px-4">{{ $student->professor->user->name ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('aluno_delete', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja deletar o aluno {{$student->name}}?')">Deletar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Nenhum aluno cadastrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection