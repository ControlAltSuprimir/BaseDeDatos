<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academicos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_Persona')->index('id_Persona');
            $table->string('area_investigacion')->nullable();
            $table->string('estudios')->nullable();
            $table->date('comienzo')->nullable();
            $table->date('termino')->nullable();
            $table->string('carrera')->nullable();
            $table->string('jerarquia')->nullable();
            $table->string('genero')->nullable();
            $table->string('oficina')->nullable();
            $table->integer('telefono')->nullable();
            $table->integer('horas_Semanales')->nullable();
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
        Schema::dropIfExists('academicos');
    }
}
