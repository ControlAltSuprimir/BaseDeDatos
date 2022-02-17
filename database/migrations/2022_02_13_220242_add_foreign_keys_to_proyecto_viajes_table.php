<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectoViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyecto_viajes', function (Blueprint $table) {
            $table->foreign(['id_viaje'], 'proyecto_viajes_ibfk_2')->references(['id'])->on('viajes');
            $table->foreign(['id_proyecto'], 'proyecto_viajes_ibfk_1')->references(['id'])->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyecto_viajes', function (Blueprint $table) {
            $table->dropForeign('proyecto_viajes_ibfk_2');
            $table->dropForeign('proyecto_viajes_ibfk_1');
        });
    }
}
