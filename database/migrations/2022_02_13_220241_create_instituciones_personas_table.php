<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstitucionesPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instituciones_personas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_Institucion')->nullable()->index('id_Institucion');
            $table->integer('id_persona')->nullable()->index('id_persona');
            $table->string('cargo')->nullable();
            $table->date('comienzo')->nullable();
            $table->date('termino')->nullable();
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
        Schema::dropIfExists('instituciones_personas');
    }
}
