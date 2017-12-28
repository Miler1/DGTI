<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tab_disciplinas', function (Blueprint $table) {
            $table->increments('id_disciplina');
            $table->integer('tab_cursos_id_curso')->unsigned()->nullable();
            $table->foreign('tab_cursos_id_curso')
                ->references('id_curso')->on('tab_cursos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('descricao', 50);
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
        Schema::dropIfExists('tab_disciplinas');
    }
}
