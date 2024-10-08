@extends('layout')

@section('content')
<h1>Cadastrar Aluno</h1>

<a href="{{ route('alunos.index') }}">Voltar</a>
<br/><br/>

<form method="POST" action="{{ route('alunos.store') }}">
    @csrf
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <label>Matrícula:</label>
    <input type="text" name="matricula" required>
    <label>Notas:</label>
    <input type="text" name="notas[]" placeholder="Nota 1" step="0.1">
    <input type="text" name="notas[]" placeholder="Nota 2" step="0.1">
    <input type="text" name="notas[]" placeholder="Nota 3" step="0.1">
    <button type="submit">Cadastrar</button>
</form>


@endsection
