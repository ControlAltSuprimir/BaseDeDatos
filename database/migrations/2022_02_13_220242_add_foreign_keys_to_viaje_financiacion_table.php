<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToViajeFinanciacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('viaje_financiacion', function (Blueprint $table) {
            $table->foreign(['id_proyecto'], 'viaje_financiacion_ibfk_2')->references(['id'])->on('proyectos');
            $table->foreign(['id_viaje'], 'viaje_financiacion_ibfk_1')->references(['id'])->on('viajes');
            $table->foreign(['id_institucion'], 'viaje_financiacion_ibfk_3')->references(['id'])->on('institucionfinanciadora');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('viaje_financiacion', function (Blueprint $table) {
            $table->dropForeign('viaje_financiacion_ibfk_2');
            $table->dropForeign('viaje_financiacion_ibfk_1');
            $table->dropForeign('viaje_financiacion_ibfk_3');
        });
    }
}
