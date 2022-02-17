<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_articulos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_articulo')->index('id_articulo');
            $table->string('titulo');
            $table->string('autores', 1000)->nullable();
            $table->string('revista')->nullable();
            $table->year('ano')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_articulos');
    }
}
