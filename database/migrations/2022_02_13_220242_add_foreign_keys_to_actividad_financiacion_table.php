<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToActividadFinanciacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actividad_financiacion', function (Blueprint $table) {
            $table->foreign(['id_proyecto'], 'actividad_financiacion_ibfk_2')->references(['id'])->on('proyectos');
            $table->foreign(['id_institucionfinanciadora'], 'actividad_financiacion_ibfk_4')->references(['id'])->on('institucionfinanciadora');
            $table->foreign(['id_academica'], 'actividad_financiacion_ibfk_1')->references(['id'])->on('actividadacademica');
            $table->foreign(['id_extension'], 'actividad_financiacion_ibfk_3')->references(['id'])->on('actividadextension');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actividad_financiacion', function (Blueprint $table) {
            $table->dropForeign('actividad_financiacion_ibfk_2');
            $table->dropForeign('actividad_financiacion_ibfk_4');
            $table->dropForeign('actividad_financiacion_ibfk_1');
            $table->dropForeign('actividad_financiacion_ibfk_3');
        });
    }
}
