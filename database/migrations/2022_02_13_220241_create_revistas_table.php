<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revistas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre')->nullable();
            $table->string('alias')->nullable();
            $table->string('ISSN')->nullable();
            $table->boolean('Fondecyt')->nullable();
            $table->string('indexacion')->nullable();
            $table->char('clasificacion', 2)->nullable();
            $table->string('clasificacion_Fondecyt')->nullable();
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
        Schema::dropIfExists('revistas');
    }
}
