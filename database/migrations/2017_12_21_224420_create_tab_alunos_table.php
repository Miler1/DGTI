<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_alunos', function (Blueprint $table) {
            $table->increments('id_aluno');
            $table->integer('tab_cursos_id_curso')->unsigned()->nullable();
            $table->foreign('tab_cursos_id_curso')
                ->references('id_curso')->on('tab_cursos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('nome', 50);
            $table->string('cpf', 14)->unique();
            $table->date('data_nasc');
            $table->string('nome_mae', 50);
            $table->string('ano_semestre', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tab_alunos');
    }
}
