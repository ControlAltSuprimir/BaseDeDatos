<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadacademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividadacademica', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_financiamiento')->nullable();
            $table->integer('montofinanciado')->nullable();
            $table->string('tipo')->nullable();
            $table->string('financiamiento')->nullable();
            $table->string('nombre')->nullable();
            $table->string('participacion')->nullable();
            $table->date('fecha_comienzo')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->integer('id_viaje')->nullable()->index('id_viaje');
            $table->string('comentarios', 2000)->nullable();
            $table->bigInteger('created_by')->default(1);
            $table->integer('updated_by')->default(1);
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
        Schema::dropIfExists('actividadacademica');
    }
}
