<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tesis', function (Blueprint $table) {
            $table->foreign(['id_programa'], 'tesis_ibfk_2')->references(['id'])->on('programas');
            $table->foreign(['autor'], 'tesis_ibfk_1')->references(['id'])->on('personas');
            $table->foreign(['id_Institucion'], 'tesis_ibfk_3')->references(['id'])->on('instituciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tesis', function (Blueprint $table) {
            $table->dropForeign('tesis_ibfk_2');
            $table->dropForeign('tesis_ibfk_1');
            $table->dropForeign('tesis_ibfk_3');
        });
    }
}
