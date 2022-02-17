<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadextensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividadextension', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_financiamiento')->nullable();
            $table->integer('montofinanciado')->nullable();
            $table->string('nombre')->nullable();
            $table->string('tipo')->nullable();
            $table->date('fecha_comienzo')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->string('publicoObjetivo')->nullable();
            $table->string('numeroParticipantes')->nullable();
            $table->string('financiamiento')->nullable();
            $table->string('comentarios')->nullable();
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
        Schema::dropIfExists('actividadextension');
    }
}
