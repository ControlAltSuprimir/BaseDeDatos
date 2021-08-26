<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Actividades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        if (!Schema::hasTable('seminarios')) {
            Schema::create('seminarios', function (Blueprint $table) {
                $table->id();
                $table->integer('organizador');
                $table->foreign('organizador')->references('id')->on('personas');
                $table->integer('id_institucion');
                $table->foreign('id_institucion')->references('id')->on('instituciones');
                $table->string('titulo');
                $table->date('fecha')->nullable();
                $table->string('url',255);
                $table->string('youtube',255);
                $table->text('abstract')->nullable();
                $table->boolean('is_valid')->default(1);
                $table->timestamps();
            });    
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
