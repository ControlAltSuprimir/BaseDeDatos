<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerosnaComisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perosna_comision', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_persona')->nullable()->index('id_persona');
            $table->integer('comision_id')->nullable()->index('comision_id');
            $table->string('cargo')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_termino')->nullable();
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
        Schema::dropIfExists('perosna_comision');
    }
}
