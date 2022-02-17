<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasAcademicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_academica', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('descripcion', 1000)->nullable();
            $table->integer('id_persona')->index('id_persona');
            $table->integer('id_academica')->index('id_academica');
            $table->integer('id_viaje')->nullable()->index('id_viaje');
            $table->boolean('is_funded')->default(false);
            $table->unsignedBigInteger('created_by')->default('1');
            $table->unsignedBigInteger('updated_by')->default('1');
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
        Schema::dropIfExists('personas_academica');
    }
}
