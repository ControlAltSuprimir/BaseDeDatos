<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonasTesisTutoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas_tesis_tutores', function (Blueprint $table) {
            $table->foreign(['id_tesis'], 'personas_tesis_tutores_ibfk_2')->references(['id'])->on('tesis');
            $table->foreign(['id_Persona'], 'personas_tesis_tutores_ibfk_1')->references(['id'])->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas_tesis_tutores', function (Blueprint $table) {
            $table->dropForeign('personas_tesis_tutores_ibfk_2');
            $table->dropForeign('personas_tesis_tutores_ibfk_1');
        });
    }
}
