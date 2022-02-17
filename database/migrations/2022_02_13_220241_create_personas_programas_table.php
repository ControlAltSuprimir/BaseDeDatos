<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_programas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_Persona')->nullable()->index('id_Persona');
            $table->integer('id_Programa')->nullable()->index('id_Programa');
            $table->date('fecha_comienzo')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->integer('estado')->nullable();
            $table->string('distincion')->nullable();
            $table->integer('id_programa_de_origen')->nullable()->index('id_programa_de_origen');
            $table->boolean('es_maximo')->nullable()->default(false);
            $table->boolean('is_valid')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas_programas');
    }
}
