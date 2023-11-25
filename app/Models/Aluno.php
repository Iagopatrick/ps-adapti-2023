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
        'imagem',
        'curso_id',
        'contratado'
    ];


    public function curso(){
        return $this->belongsTo(Curso::class, 'curso_id');
    }

}
