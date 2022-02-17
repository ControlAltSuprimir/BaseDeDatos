<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectoAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyecto_academica', function (Blueprint $table) {
            $table->foreign(['id_proyecto'], 'proyecto_academica_ibfk_2')->references(['id'])->on('proyectos');
            $table->foreign(['id_academica'], 'proyecto_academica_ibfk_1')->references(['id'])->on('actividadacademica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyecto_academica', function (Blueprint $table) {
            $table->dropForeign('proyecto_academica_ibfk_2');
            $table->dropForeign('proyecto_academica_ibfk_1');
        });
    }
}
