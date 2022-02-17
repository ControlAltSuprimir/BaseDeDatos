<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToFormularioviajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formularioviajes', function (Blueprint $table) {
            $table->foreign(['id_institucion'], 'formularioviajes_ibfk_5')->references(['id'])->on('institucionfinanciadora');
            $table->foreign(['id_proyecto'], 'formularioviajes_ibfk_2')->references(['id'])->on('proyectos');
            $table->foreign(['id_extension'], 'formularioviajes_ibfk_4')->references(['id'])->on('actividadextension');
            $table->foreign(['id_persona'], 'formularioviajes_ibfk_1')->references(['id'])->on('personas');
            $table->foreign(['id_academica'], 'formularioviajes_ibfk_3')->references(['id'])->on('actividadacademica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formularioviajes', function (Blueprint $table) {
            $table->dropForeign('formularioviajes_ibfk_5');
            $table->dropForeign('formularioviajes_ibfk_2');
            $table->dropForeign('formularioviajes_ibfk_4');
            $table->dropForeign('formularioviajes_ibfk_1');
            $table->dropForeign('formularioviajes_ibfk_3');
        });
    }
}
