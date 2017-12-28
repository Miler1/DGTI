<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    //
    protected $table = 'tab_disciplinas';
    protected $primaryKey = 'id_disciplina';
    
    protected $fillable = [
    	'tab_cursos_id_curso',
        'descricao'
    ];
    
    public function cursos(){
        return $this->belongsTo(Curso::class);
    }

    public function alunos(){
        return $this->belongsTo(Aluno::class);
    }
}
