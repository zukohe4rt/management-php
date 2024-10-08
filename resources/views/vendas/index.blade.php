@extends('layout')

@section('content')
<h1>Lista de Vendas</h1>

<p>Total de Vendas: R$ {{ $totalVendas }}</p>

<a href="{{ route('vendas.create') }}">Registrar Nova Venda</a>

<ul>
    @foreach ($vendas as $venda)
        <li>
            Produto: {{ $venda->produto->nome }} - Quantidade: {{ $venda->quantidade_vendida }} - Total: R$ {{ $venda->total_venda }}
        </li>
    @endforeach
</ul>
@endsection
