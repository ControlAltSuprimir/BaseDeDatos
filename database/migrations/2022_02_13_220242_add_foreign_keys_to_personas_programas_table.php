<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonasProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas_programas', function (Blueprint $table) {
            $table->foreign(['id_Programa'], 'personas_programas_ibfk_2')->references(['id'])->on('programas');
            $table->foreign(['id_Persona'], 'personas_programas_ibfk_1')->references(['id'])->on('personas');
            $table->foreign(['id_programa_de_origen'], 'personas_programas_ibfk_3')->references(['id'])->on('programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas_programas', function (Blueprint $table) {
            $table->dropForeign('personas_programas_ibfk_2');
            $table->dropForeign('personas_programas_ibfk_1');
            $table->dropForeign('personas_programas_ibfk_3');
        });
    }
}
