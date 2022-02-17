<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('titulo')->nullable();
            $table->string('DOI')->nullable();
            $table->integer('id_Revista')->nullable()->index('id_Revista');
            $table->string('url', 300)->nullable();
            $table->string('intervalo_paginas')->nullable();
            $table->string('issue')->nullable();
            $table->string('volumen')->nullable();
            $table->enum('estado_publicacion', ['publicado', 'aceptado', 'enRevision', 'enPrensa'])->nullable();
            $table->year('fecha_publicacion')->nullable();
            $table->string('codigos_MSC')->nullable();
            $table->string('MSC_version')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('arxiv')->nullable();
            $table->boolean('is_uchile')->default(false);
            $table->unsignedBigInteger('created_by')->default('1');
            $table->unsignedBigInteger('updated_by')->default('1');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('is_valid')->nullable()->default(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
