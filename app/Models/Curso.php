<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Aluno;
class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['curso'];

    public function alunos(){
        return $this->hasMany(Aluno::class);
    }

}
