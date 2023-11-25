<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'image',
        'curso_id',
        'esta_formado'
    ];


    public function alunos(){
        return $this->belongsTo(Curso::class, 'curso_id');
    }

}
