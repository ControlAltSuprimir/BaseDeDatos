<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTesisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Schema::dropIfExists('articulos_tesis');
        if (!Schema::hasTable('articulos_tesis')) {
        Schema::create('articulos_tesis', function (Blueprint $table) {
            $table->id();
            $table->integer('id_articulo');
            $table->foreign('id_articulo')->references('id')->on('articulos');
            $table->integer('id_tesis');
            $table->foreign('id_tesis')->references('id')->on('tesis');
            $table->boolean('is_valid')->default(1);
            $table->timestamps();
            //->nullable($value = true)
        });}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos_tesis');
    }
}
