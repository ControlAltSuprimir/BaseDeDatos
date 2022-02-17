<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProyectoExtensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proyecto_extension', function (Blueprint $table) {
            $table->foreign(['id_actividad'], 'proyecto_extension_ibfk_2')->references(['id'])->on('actividadextension');
            $table->foreign(['id_proyecto'], 'proyecto_extension_ibfk_1')->references(['id'])->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proyecto_extension', function (Blueprint $table) {
            $table->dropForeign('proyecto_extension_ibfk_2');
            $table->dropForeign('proyecto_extension_ibfk_1');
        });
    }
}
