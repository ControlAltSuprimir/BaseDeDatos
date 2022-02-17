<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonasAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas_academica', function (Blueprint $table) {
            $table->foreign(['id_viaje'], 'personas_academica_ibfk_2')->references(['id'])->on('viajes');
            $table->foreign(['id_persona'], 'personas_academica_ibfk_1')->references(['id'])->on('personas');
            $table->foreign(['id_academica'], 'personas_academica_ibfk_3')->references(['id'])->on('actividadacademica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas_academica', function (Blueprint $table) {
            $table->dropForeign('personas_academica_ibfk_2');
            $table->dropForeign('personas_academica_ibfk_1');
            $table->dropForeign('personas_academica_ibfk_3');
        });
    }
}
