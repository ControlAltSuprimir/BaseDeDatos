<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCursosDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos_docentes', function (Blueprint $table) {
            $table->foreign(['id_persona'])->references(['id'])->on('personas');
            $table->foreign(['id_curso'], 'cursos_docentes_ibfk_1')->references(['id'])->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos_docentes', function (Blueprint $table) {
            $table->dropForeign('cursos_docentes_id_persona_foreign');
            $table->dropForeign('cursos_docentes_ibfk_1');
        });
    }
}
