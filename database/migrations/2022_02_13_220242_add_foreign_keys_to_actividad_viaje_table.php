<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToActividadViajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actividad_viaje', function (Blueprint $table) {
            $table->foreign(['id_viaje'], 'actividad_viaje_ibfk_2')->references(['id'])->on('viajes');
            $table->foreign(['id_academica'], 'actividad_viaje_ibfk_1')->references(['id'])->on('actividadacademica');
            $table->foreign(['id_extension'], 'actividad_viaje_ibfk_3')->references(['id'])->on('actividadextension');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actividad_viaje', function (Blueprint $table) {
            $table->dropForeign('actividad_viaje_ibfk_2');
            $table->dropForeign('actividad_viaje_ibfk_1');
            $table->dropForeign('actividad_viaje_ibfk_3');
        });
    }
}
