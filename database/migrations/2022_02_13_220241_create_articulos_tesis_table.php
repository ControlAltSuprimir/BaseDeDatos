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
        Schema::create('articulos_tesis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_articulo')->index('articulos_tesis_id_articulo_foreign');
            $table->integer('id_tesis')->index('articulos_tesis_id_tesis_foreign');
            $table->unsignedInteger('created_by')->default('1');
            $table->unsignedInteger('updated_by')->default('1');
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
        Schema::dropIfExists('articulos_tesis');
    }
}
