@extends('layout')

@section('content')
<h1>Registrar Venda</h1>

<a href="{{ route('vendas.index') }}">Voltar</a>
<br/><br/>
<a href="{{ route('produtos.create') }}">Cadastrar novo produto</a>
<br/><br/>

<form method="POST" action="{{ route('vendas.store') }}">
    @csrf
    <label>Produto:</label>
    <select name="produto_id" required>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}">{{ $produto->nome }} (Estoque: {{ $produto->quantidade_em_estoque }})</option>
        @endforeach
    </select>
    <label>Quantidade Vendida:</label>
    <input type="number" name="quantidade_vendida" required>
    <button type="submit">Registrar Venda</button>
</form>


@endsection
