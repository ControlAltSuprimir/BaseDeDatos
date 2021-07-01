<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProyectosPersonas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('proyectos_personas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_persona');
            $table->foreign('id_persona')->references('id')->on('personas');
            $table->integer('id_proyecto');
            $table->foreign('id_proyecto')->references('id')->on('proyectos');
            $table->string('participación')->nullable();
            $table->date('fecha')->nullable();
            $table->text('descripcionParticipacion')->nullable();
            $table->boolean('is_valid')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('proyectos_personas');
    }
}
