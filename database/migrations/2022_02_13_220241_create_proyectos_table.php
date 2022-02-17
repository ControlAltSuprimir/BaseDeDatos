<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('titulo')->nullable();
            $table->integer('investigador_responsable')->nullable()->index('investigador_responsable');
            $table->integer('id_financiamiento')->nullable()->index('id_financiamiento');
            $table->integer('monto_adjudicado')->nullable();
            $table->string('codigo_proyecto')->nullable();
            $table->date('comienzo')->nullable();
            $table->date('termino')->nullable();
            $table->string('area')->nullable();
            $table->string('tipo_proyecto')->nullable();
            $table->string('organizacion_financia')->nullable();
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('proyectos');
    }
}
