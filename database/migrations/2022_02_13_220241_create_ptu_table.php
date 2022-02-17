<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePtuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_persona')->index('id_persona');
            $table->decimal('ensenanzamedia', 6);
            $table->decimal('ranking', 6);
            $table->decimal('matematicas', 6);
            $table->decimal('lenguaje', 6);
            $table->decimal('ciencias', 6);
            $table->decimal('historia', 6);
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
        Schema::dropIfExists('ptu');
    }
}
