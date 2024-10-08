<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alunos = Aluno::all();
        return view('alunos.index', compact('alunos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'matricula' => 'required|unique:alunos',
            'notas' => 'nullable|array',
            'notas.*' => 'numeric|min:0|max:10', // Limita as notas entre 0 e 10
        ]);

        Aluno::create([
            'nome' => $request->nome,
            'matricula' => $request->matricula,
            'notas' => json_encode($request->notas),
        ]);

        return redirect()->route('alunos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.show', compact('aluno'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('alunos.edit', compact('aluno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'notas' => 'nullable|array',
            'notas.*' => 'numeric|min:0|max:10',
        ]);

        $aluno = Aluno::findOrFail($id);
        $notas = json_decode($aluno->notas, true) ?? [];
        $notas = array_merge($notas, $request->notas ?? []);
        
        $aluno->update([
            'notas' => json_encode($notas),
        ]);

        return redirect()->route('alunos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();
        return redirect()->route('alunos.index');
    }

    public function calcularMedia($id)
    {
        $aluno = Aluno::findOrFail($id);
        $notas = json_decode($aluno->notas, true) ?? [];
        
        $media = count($notas) ? array_sum($notas) / count($notas) : 0;
        
        $mediaFormatada = number_format($media, 2, '.', '');

        return response()->json(['media' => $mediaFormatada]);
    }

}
