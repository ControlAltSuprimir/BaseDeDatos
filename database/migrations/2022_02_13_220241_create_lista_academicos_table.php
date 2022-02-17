<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_academicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_academico');
            $table->longText('datos_personales')->nullable();
            $table->string('email')->nullable();
            $table->longText('articulos')->nullable();
            $table->longText('proyectos')->nullable();
            $table->string('area_investigacion')->nullable();
            $table->string('estudios')->nullable();
            $table->string('encode')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lista_academicos');
    }
}
