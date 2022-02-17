<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToVisitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visita', function (Blueprint $table) {
            $table->foreign(['id_Institucion'], 'visita_ibfk_2')->references(['id'])->on('instituciones');
            $table->foreign(['personaInvita'], 'visita_ibfk_1')->references(['id'])->on('personas');
            $table->foreign(['id_viaje'], 'visita_ibfk_3')->references(['id'])->on('viajes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visita', function (Blueprint $table) {
            $table->dropForeign('visita_ibfk_2');
            $table->dropForeign('visita_ibfk_1');
            $table->dropForeign('visita_ibfk_3');
        });
    }
}
