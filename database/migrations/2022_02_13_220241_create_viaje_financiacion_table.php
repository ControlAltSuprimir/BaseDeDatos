<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajeFinanciacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viaje_financiacion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_viaje')->nullable()->index('id_viaje');
            $table->integer('id_proyecto')->nullable()->index('id_proyecto');
            $table->integer('id_institucion')->nullable()->index('id_institucion');
            $table->integer('contribucionfinanciera')->nullable();
            $table->string('comentarios', 2000)->nullable();
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
        Schema::dropIfExists('viaje_financiacion');
    }
}
