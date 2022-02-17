<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonaArticuloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('persona_articulo', function (Blueprint $table) {
            $table->foreign(['id_Articulo'], 'persona_articulo_ibfk_2')->references(['id'])->on('articulos');
            $table->foreign(['id_Persona'], 'persona_articulo_ibfk_1')->references(['id'])->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('persona_articulo', function (Blueprint $table) {
            $table->dropForeign('persona_articulo_ibfk_2');
            $table->dropForeign('persona_articulo_ibfk_1');
        });
    }
}
