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
        Schema::create('personas_comision', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_persona')->index('personas_comision_id_persona_foreign');
            $table->integer('id_comision')->index('personas_comision_id_comision_foreign');
            $table->string('cargo')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_termino')->nullable();
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
        Schema::dropIfExists('personas_comision');
    }
}
