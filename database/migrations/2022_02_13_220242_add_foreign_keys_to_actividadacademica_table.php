<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToActividadacademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actividadacademica', function (Blueprint $table) {
            $table->foreign(['id_viaje'], 'actividadacademica_ibfk_1')->references(['id'])->on('viajes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actividadacademica', function (Blueprint $table) {
            $table->dropForeign('actividadacademica_ibfk_1');
        });
    }
}
