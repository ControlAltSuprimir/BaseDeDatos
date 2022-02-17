<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_persona')->index('proyectos_personas_id_persona_foreign');
            $table->integer('id_proyecto')->index('proyectos_personas_id_proyecto_foreign');
            $table->string('participacion')->nullable();
            $table->date('fecha')->nullable();
            $table->text('descripcionParticipacion')->nullable();
            $table->unsignedBigInteger('created_by')->default('1');
            $table->unsignedBigInteger('updated_by')->default('1');
            $table->boolean('is_valid')->default(true);
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
        Schema::dropIfExists('proyectos_personas');
    }
}
