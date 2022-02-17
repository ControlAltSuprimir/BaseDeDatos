<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectosPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos_personas', function (Blueprint $table) {
            $table->foreign(['id_proyecto'])->references(['id'])->on('proyectos');
            $table->foreign(['id_persona'])->references(['id'])->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos_personas', function (Blueprint $table) {
            $table->dropForeign('proyectos_personas_id_proyecto_foreign');
            $table->dropForeign('proyectos_personas_id_persona_foreign');
        });
    }
}
