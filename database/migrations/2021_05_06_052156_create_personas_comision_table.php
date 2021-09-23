<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasComisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('personas_comision')) {
        Schema::create('personas_comision', function (Blueprint $table) {
            $table->id();
            $table->integer('id_persona');
            $table->foreign('id_persona')->references('id')->on('personas');
            $table->integer('id_comision');
            $table->foreign('id_comision')->references('id')->on('comisiones');
            $table->string('cargo', 255)->nullable(true);
            $table->date('fecha_ingreso')->nullable(true);
            $table->date('fecha_termino')->nullable(true);
            $table->boolean('is_valid')->default(1);
            $table->timestamps();
            //->nullable($value = true)
        });}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas_comision');
    }
}
