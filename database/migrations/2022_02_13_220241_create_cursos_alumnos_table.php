<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos_alumnos', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_persona')->index('id_persona');
            $table->unsignedBigInteger('id_curso')->index('id_curso');
            $table->string('rol')->nullable();
            $table->decimal('nota', 4)->nullable();
            $table->decimal('asistencia', 6)->nullable();
            $table->text('comentarios')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
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
        Schema::dropIfExists('cursos_alumnos');
    }
}
