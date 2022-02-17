<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColoquiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coloquios', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('titulo')->nullable();
            $table->integer('id_persona')->nullable()->index('id_persona');
            $table->integer('id_institucion')->nullable()->index('id_institucion');
            $table->string('institucion')->nullable();
            $table->date('fecha')->nullable();
            $table->string('url')->nullable();
            $table->string('youtube')->nullable();
            $table->text('abstract')->nullable();
            $table->string('expositor', 200)->nullable();
            $table->string('organizador')->nullable();
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
        Schema::dropIfExists('coloquios');
    }
}
