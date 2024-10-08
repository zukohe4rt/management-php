@extends('layout')

@section('content')
<h1>Lista de Livros</h1>

<a href="{{ route('livros.create') }}">Cadastrar Novo Livro</a>
<br/><br/>

<form method="GET" action="{{ route('livros.index') }}">
    <input type="text" name="search" placeholder="Buscar por título ou autor" value="{{ request('search') }}">
    <button type="submit">Buscar</button>
</form>

<ul>
    @foreach ($books as $book)
        <li>
            {{ $book->title }} - {{ $book->author }}
            <form action="{{ route('livros.destroy', $book->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </li>
    @endforeach
</ul>


@endsection
