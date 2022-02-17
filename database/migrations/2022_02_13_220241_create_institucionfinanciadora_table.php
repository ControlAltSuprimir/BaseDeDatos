<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionfinanciadoraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institucionfinanciadora', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nombre')->default('Sin Nombre');
            $table->integer('Comentarios');
            $table->integer('created_by');
            $table->integer('updated_by');
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
        Schema::dropIfExists('institucionfinanciadora');
    }
}
