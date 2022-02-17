<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexacionesRevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indexaciones_revistas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_Indexacion')->nullable()->index('id_Indexacion');
            $table->integer('id_Revista')->nullable()->index('id_Revista');
            $table->string('clasificacionQ')->nullable();
            $table->decimal('impact_factor', 5, 3)->nullable();
            $table->string('observaciones', 1000)->nullable();
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
        Schema::dropIfExists('indexaciones_revistas');
    }
}
