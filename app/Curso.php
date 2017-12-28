<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    protected $table = 'tab_cursos';
    protected $primaryKey = 'id_curso';

    protected $fillable = [
    	'descricao'
    ];

    public $timestamps = false;

    public function alunos(){
        return $this->hasMany(Aluno::class);
    }

    public function disciplinas(){
    	return $this->hasMany(Disciplina::class);
    }
}
