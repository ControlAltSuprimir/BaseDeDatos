<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->foreign(['id_financiamiento'], 'proyectos_ibfk_2')->references(['id'])->on('institucionfinanciadora');
            $table->foreign(['investigador_responsable'], 'proyectos_ibfk_1')->references(['id'])->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropForeign('proyectos_ibfk_2');
            $table->dropForeign('proyectos_ibfk_1');
        });
    }
}
