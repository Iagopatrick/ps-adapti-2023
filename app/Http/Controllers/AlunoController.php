<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlunoRequest;
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
        
        if($request->hasFile('image')){
            $data['image'] = '/storage/' . $request->file('image')->store('aluno', 'public');
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
    }


    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
