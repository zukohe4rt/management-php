@extends('layout')

@section('content')
<h1>Lista de Produtos</h1>

<a href="{{ route('produtos.create') }}">Cadastrar Novo Produto</a>

<ul>
    @foreach ($produtos as $produto)
        <li>
            {{ $produto->nome }} - Preço: R$ {{ $produto->preco }} - Estoque: {{ $produto->quantidade_em_estoque }}
            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection
