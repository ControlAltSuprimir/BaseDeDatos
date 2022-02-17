<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectosTesistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos_tesistas', function (Blueprint $table) {
            $table->foreign(['id_tesis'], 'proyectos_tesistas_ibfk_2')->references(['id'])->on('tesis');
            $table->foreign(['id_proyecto'], 'proyectos_tesistas_ibfk_1')->references(['id'])->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos_tesistas', function (Blueprint $table) {
            $table->dropForeign('proyectos_tesistas_ibfk_2');
            $table->dropForeign('proyectos_tesistas_ibfk_1');
        });
    }
}
