<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToListaArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lista_articulos', function (Blueprint $table) {
            $table->foreign(['id_articulo'], 'lista_articulos_ibfk_1')->references(['id'])->on('articulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lista_articulos', function (Blueprint $table) {
            $table->dropForeign('lista_articulos_ibfk_1');
        });
    }
}
