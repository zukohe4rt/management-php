@extends('layout')

@section('content')
<h1>Cadastrar Produto</h1>

<a href="{{ route('vendas.create') }}">Voltar para lista de vendas</a>
<br/><br/>
<a href="{{ route('produtos.index') }}">Voltar para lista de produtos</a>
<br/><br/>

<form method="POST" action="{{ route('produtos.store') }}">
    @csrf
    <label>Nome:</label>
    <input type="text" name="nome" required>
    <label>Preço:</label>
    <input type="number" name="preco" step="0.01" required>
    <label>Quantidade em Estoque:</label>
    <input type="number" name="quantidade_em_estoque" required>
    <button type="submit">Cadastrar</button>
</form>

@endsection
