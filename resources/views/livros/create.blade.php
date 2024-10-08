@extends('layout')

@section('content')
<h1>Cadastrar Livro</h1>

<form method="POST" action="{{ route('livros.store') }}">
    @csrf
    <label>Título:</label>
    <input type="text" name="title" required>
    <label>Autor:</label>
    <input type="text" name="author" required>
    <label>Número de Páginas:</label>
    <input type="number" name="pages" required>
    <label>Ano de Publicação:</label>
    <input type="number" name="publication_year" required>
    <button type="submit">Cadastrar</button>
</form>

<a href="{{ route('livros.index') }}">Voltar</a>
@endsection
