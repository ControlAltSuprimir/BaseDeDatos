<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividadFinanciacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividad_financiacion', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_academica')->nullable()->index('id_academica');
            $table->integer('id_extension')->nullable()->index('id_extension');
            $table->integer('id_proyecto')->nullable()->index('id_proyecto');
            $table->integer('id_institucionfinanciadora')->nullable()->index('id_institucionfinanciadora');
            $table->integer('contribucion_financiera')->nullable()->default(0);
            $table->string('comentarios', 2000)->nullable();
            $table->unsignedBigInteger('created_by')->default('1');
            $table->unsignedBigInteger('updated_by')->default('1');
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
        Schema::dropIfExists('actividad_financiacion');
    }
}
