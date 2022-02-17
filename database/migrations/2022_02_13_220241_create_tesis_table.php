<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesis', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('titulo');
            $table->integer('autor')->nullable()->index('autor');
            $table->date('fechaDefensa')->nullable();
            $table->integer('id_programa')->nullable()->index('id_programa');
            $table->integer('id_Institucion')->nullable()->index('id_Institucion');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('is_valid')->nullable()->default(true);
            $table->text('observaciones')->nullable();
            $table->text('resumen')->nullable();
            $table->date('fechaProyecto')->nullable();
            $table->string('estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tesis');
    }
}
