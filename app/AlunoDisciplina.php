<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlunoDisciplina extends Model
{
    //
    protected $table = 'alunos_disciplinas';

    protected $fillable = [
    	'tab_disciplinas_id_disciplina',
    	'tab_alunos_id_aluno'
    ] 

    public $timestamp = false;

    public function disciplinas(){
        return $this->hasMany(Disciplina::class);
    }
}
