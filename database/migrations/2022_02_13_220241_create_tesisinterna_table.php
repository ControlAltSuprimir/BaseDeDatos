<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesisinternaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tesisinterna', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('tesista')->nullable()->index('tesista');
            $table->date('fechaProyecto')->nullable();
            $table->integer('id_tesis')->nullable()->index('id_tesis');
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('tesisinterna');
    }
}
