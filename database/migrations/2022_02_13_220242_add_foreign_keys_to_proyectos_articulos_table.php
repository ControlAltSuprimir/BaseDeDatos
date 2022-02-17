<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectosArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos_articulos', function (Blueprint $table) {
            $table->foreign(['id_articulo'], 'proyectos_articulos_ibfk_2')->references(['id'])->on('articulos');
            $table->foreign(['id_proyecto'], 'proyectos_articulos_ibfk_1')->references(['id'])->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos_articulos', function (Blueprint $table) {
            $table->dropForeign('proyectos_articulos_ibfk_2');
            $table->dropForeign('proyectos_articulos_ibfk_1');
        });
    }
}
