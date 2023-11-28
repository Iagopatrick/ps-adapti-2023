<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Models\Curso;


class SiteController extends Controller
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
        
        return view('site.index', compact('alunos'));
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
    }


    public function show($id)
    {
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
