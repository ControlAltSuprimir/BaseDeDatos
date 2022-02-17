<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArticuloTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulo_tesis', function (Blueprint $table) {
            $table->foreign(['id_tesis'], 'articulo_tesis_ibfk_2')->references(['id'])->on('tesis');
            $table->foreign(['id_articulo'], 'articulo_tesis_ibfk_1')->references(['id'])->on('articulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulo_tesis', function (Blueprint $table) {
            $table->dropForeign('articulo_tesis_ibfk_2');
            $table->dropForeign('articulo_tesis_ibfk_1');
        });
    }
}
