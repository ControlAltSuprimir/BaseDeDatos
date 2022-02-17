<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonasExtensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas_extension', function (Blueprint $table) {
            $table->foreign(['id_actividad'], 'personas_extension_ibfk_2')->references(['id'])->on('actividadextension');
            $table->foreign(['id_persona'], 'personas_extension_ibfk_1')->references(['id'])->on('personas');
            $table->foreign(['id_viaje'], 'personas_extension_ibfk_3')->references(['id'])->on('viajes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas_extension', function (Blueprint $table) {
            $table->dropForeign('personas_extension_ibfk_2');
            $table->dropForeign('personas_extension_ibfk_1');
            $table->dropForeign('personas_extension_ibfk_3');
        });
    }
}
