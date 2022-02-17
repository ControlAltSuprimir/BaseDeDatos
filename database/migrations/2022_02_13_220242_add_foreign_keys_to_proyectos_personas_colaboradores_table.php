<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectosPersonasColaboradoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos_personas_colaboradores', function (Blueprint $table) {
            $table->foreign(['id_persona'], 'proyectos_personas_colaboradores_ibfk_2')->references(['id'])->on('personas');
            $table->foreign(['id_proyecto'], 'proyectos_personas_colaboradores_ibfk_1')->references(['id'])->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos_personas_colaboradores', function (Blueprint $table) {
            $table->dropForeign('proyectos_personas_colaboradores_ibfk_2');
            $table->dropForeign('proyectos_personas_colaboradores_ibfk_1');
        });
    }
}
