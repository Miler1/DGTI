<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabAlunosHasTabDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos_disciplinas', function (Blueprint $table) {
            $table->integer('tab_disciplinas_id_disciplina')->unsigned();
            $table->integer('tab_alunos_id_aluno')->unsigned();
            $table->foreign('tab_disciplinas_id_disciplina')
                ->references('id_disciplina')->on('tab_disciplinas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('tab_alunos_id_aluno')
                ->references('id_aluno')->on('tab_alunos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_alunos_has_tab_disciplinas');
    }
}
