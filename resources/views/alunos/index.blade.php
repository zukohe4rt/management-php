@extends('layout')

@section('content')
<h1>Lista de Alunos</h1>

<a href="{{ route('alunos.create') }}">Cadastrar Novo Aluno</a>

<ul>
    @foreach ($alunos as $aluno)
        <li>
            {{ $aluno->nome }} - Matrícula: {{ $aluno->matricula }} 
            <a href="{{ route('alunos.show', $aluno->id) }}">Ver Notas</a>
            <form action="{{ route('alunos.destroy', $aluno->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
