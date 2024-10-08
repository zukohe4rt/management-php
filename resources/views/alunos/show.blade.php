@extends('layout')

@section('content')
<h1>Notas de {{ $aluno->nome }}</h1>

<a href="{{ route('alunos.index') }}">Voltar</a>

<ul>
    @foreach (json_decode($aluno->notas, true) as $nota)
        <li>{{ $nota }}</li>
    @endforeach
</ul>

<p>Média da nota: 
    <span id="media">{{ number_format(array_sum(json_decode($aluno->notas, true)) / count(json_decode($aluno->notas, true)), 2, '.', '') }}</span>
</p>

<form method="POST" action="{{ route('alunos.update', $aluno->id) }}">
    @csrf
    @method('PUT')
    <label>Adicionar Nota:</label>
    <input type="text" name="notas[]" step="0.1" required>
    <button type="submit">Adicionar</button>
</form>


@endsection
