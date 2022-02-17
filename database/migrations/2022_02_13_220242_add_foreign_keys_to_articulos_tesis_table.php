<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToArticulosTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articulos_tesis', function (Blueprint $table) {
            $table->foreign(['id_tesis'])->references(['id'])->on('tesis');
            $table->foreign(['id_articulo'])->references(['id'])->on('articulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articulos_tesis', function (Blueprint $table) {
            $table->dropForeign('articulos_tesis_id_tesis_foreign');
            $table->dropForeign('articulos_tesis_id_articulo_foreign');
        });
    }
}
