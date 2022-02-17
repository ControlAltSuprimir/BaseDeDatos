<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_actividad')->nullable();
            $table->integer('montofinanciado')->nullable();
            $table->string('tipo')->nullable();
            $table->string('nombre')->nullable();
            $table->string('participacion')->nullable();
            $table->string('publico_objetivo')->nullable();
            $table->date('fecha_comienzo')->nullable();
            $table->date('fecha_termino')->nullable();
            $table->string('comentarios', 2000)->nullable();
            $table->bigInteger('created_by')->default(1);
            $table->bigInteger('updated_by')->default(1);
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
        Schema::dropIfExists('actividades');
    }
}
