<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_institucion')->index('cursos_id_institucion_foreign');
            $table->string('titulo');
            $table->string('codigo')->nullable();
            $table->string('codigo2')->nullable();
            $table->string('categoria')->nullable();
            $table->integer('alumnos')->nullable();
            $table->year('ano')->nullable();
            $table->string('periodo')->nullable();
            $table->boolean('u_cursos')->default(true);
            $table->text('resumen')->nullable();
            $table->string('url')->nullable();
            $table->string('programa')->nullable();
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
        Schema::dropIfExists('curso');
    }
}
