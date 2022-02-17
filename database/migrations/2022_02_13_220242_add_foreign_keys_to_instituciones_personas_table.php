<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToInstitucionesPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('instituciones_personas', function (Blueprint $table) {
            $table->foreign(['id_persona'], 'instituciones_personas_ibfk_2')->references(['id'])->on('personas');
            $table->foreign(['id_Institucion'], 'instituciones_personas_ibfk_1')->references(['id'])->on('instituciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('instituciones_personas', function (Blueprint $table) {
            $table->dropForeign('instituciones_personas_ibfk_2');
            $table->dropForeign('instituciones_personas_ibfk_1');
        });
    }
}
