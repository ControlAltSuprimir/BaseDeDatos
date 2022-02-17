<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_persona')->nullable()->index('id_persona');
            $table->date('fecha')->nullable();
            $table->string('paisDestino')->nullable();
            $table->string('ciudadDestino')->nullable();
            $table->string('paisOrigen')->nullable();
            $table->string('ciudadOrigen')->nullable();
            $table->string('financiamiento')->nullable();
            $table->string('comentarios', 2000)->nullable();
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
        Schema::dropIfExists('viajes');
    }
}
