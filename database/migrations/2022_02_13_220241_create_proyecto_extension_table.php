<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoExtensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_extension', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_proyecto')->nullable()->index('id_proyecto');
            $table->integer('id_actividad')->nullable()->index('id_actividad');
            $table->integer('contribucion_financiera')->nullable();
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
        Schema::dropIfExists('proyecto_extension');
    }
}
