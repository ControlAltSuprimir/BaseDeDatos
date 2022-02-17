<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAcademicosProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('academicos_programas', function (Blueprint $table) {
            $table->foreign(['id_Programa'], 'academicos_programas_ibfk_2')->references(['id'])->on('programas');
            $table->foreign(['id_academico'], 'academicos_programas_ibfk_1')->references(['id'])->on('academicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('academicos_programas', function (Blueprint $table) {
            $table->dropForeign('academicos_programas_ibfk_2');
            $table->dropForeign('academicos_programas_ibfk_1');
        });
    }
}
