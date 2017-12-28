<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Aluno extends Model
{
    //
    protected $table = 'tab_alunos';
    protected $primaryKey = 'id_aluno';
    //protected $dateFormat = 'd/m/Y';
    
    protected $fillable = [
        'tab_cursos_id_curso',
        'tab_disciplinas_id_disciplina',
        'nome',
        'cpf',
        'data_nasc',
        'nome_mae',
        'ano_semestre'
    ];

    public function cursos(){
        return $this->belongsTo(Curso::class);
    }

    public function disciplinas(){
        return $this->belongsTo(Disciplina::class);
    }

    public function formDateOfBirthAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
