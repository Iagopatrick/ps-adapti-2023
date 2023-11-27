<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
use App\Http\Requests\AlunoUpdateRequest;
use App\Models\Aluno;
use App\Models\Curso;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AlunoController extends Controller
{

    
    private $alunos;
    private $cursos;
    public function __construct(Aluno $aluno, Curso $curso){
        $this->alunos = $aluno;
        $this->cursos = $curso;
    }

    public function index()
    {
        $alunos = $this->alunos->all();
        return view('admin.aluno.index', compact('alunos'));
    }


    public function create()
    {
        $cursos = $this->cursos->all();
        return view('admin.aluno.crud', compact('cursos'));
    }


    public function store(AlunoRequest $request)
    {
       
        $data = $request->all();
        

        if($request->hasFile('imagem')){
            $data['imagem'] = '/storage/' . $request->file('imagem')->store('aluno', 'public');
        }

        if(!$request->has('contratado')){
            $data['contratado'] = 0;
        }
        
        $this->alunos->create($data);
        return redirect()->route('aluno.index')->with('success','Aluno cadastrado com sucesso!');
    }


    public function show($id)
    {
        $aluno = $this->alunos->find($id);
        $aluno = $aluno->load('curso');
        return response()->json($aluno);
    }


    public function edit($id)
    {
        $aluno = $this->alunos->find($id);
        $cursos = $this->cursos->all();
        return view('admin.aluno.crud', compact('aluno','cursos'));
    }


    public function update(AlunoUpdateRequest $request, $id)
    {
        $data = $request->all();
        $aluno = $this->alunos->find($id);
        if($request->hasFile('imagem')){
            Storage::disk('public')->delete(substr($aluno->imagem, 9));
            $data['imagem'] = '/storage/' . $request->file('imagem')->store('aluno', 'public');
        }

        if(!$request->has('contratado')){
            $data['contratado'] = 0;
        }

        $aluno->update($data);

        return redirect()->route('aluno.index')->with('success','Aluno atualizado com sucesso');
    }

    public function destroy($id)
    {
        $aluno = $this->alunos->find($id);
        Storage::delete('public/' . $aluno->imagem);
        $aluno->delete();
        return redirect()->route('aluno.index')->with('success','Aluno excluido');
    }
}
