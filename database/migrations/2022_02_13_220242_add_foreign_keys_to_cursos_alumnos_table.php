<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToCursosAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos_alumnos', function (Blueprint $table) {
            $table->foreign(['id_curso'], 'cursos_alumnos_ibfk_1')->references(['id'])->on('curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cursos_alumnos', function (Blueprint $table) {
            $table->dropForeign('cursos_alumnos_ibfk_1');
        });
    }
}
