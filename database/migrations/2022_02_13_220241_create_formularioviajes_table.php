<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioviajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formularioviajes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('pais_origen');
            $table->string('ciudad_origen')->nullable();
            $table->string('pais_destino');
            $table->string('ciudad_destino')->nullable();
            $table->date('fecha')->nullable();
            $table->date('retorno_aproximado')->nullable();
            $table->integer('contribucionfinanciera')->nullable()->default(0);
            $table->integer('contribucionfinancierainstitucion')->nullable()->default(0);
            $table->string('comentarios', 2000)->nullable();
            $table->text('financiamiento')->nullable();
            $table->integer('id_persona')->nullable()->index('id_persona');
            $table->integer('id_proyecto')->nullable()->index('id_proyecto');
            $table->integer('id_institucion')->nullable()->index('formularioviajes_ibfk_5');
            $table->integer('id_academica')->nullable()->index('id_academica');
            $table->integer('id_extension')->nullable()->index('id_extension');
            $table->boolean('procesado')->nullable()->default(false);
            $table->boolean('rechazado')->nullable()->default(false);
            $table->integer('id_viaje')->nullable();
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
        Schema::dropIfExists('formularioviajes');
    }
}
