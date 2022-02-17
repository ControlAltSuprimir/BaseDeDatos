<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasExtensionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas_extension', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_persona')->nullable()->index('id_persona');
            $table->string('cargo')->nullable();
            $table->integer('id_actividad')->nullable()->index('id_actividad');
            $table->boolean('is_funded')->default(false);
            $table->unsignedBigInteger('created_by')->default('1');
            $table->unsignedBigInteger('updated_by')->default('1');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->boolean('is_valid')->nullable()->default(true);
            $table->integer('id_viaje')->nullable()->index('id_viaje');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personas_extension');
    }
}
