<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddObservacionTesis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tesis', function($table) {
            $table->text('observaciones')->nullable();
            $table->date('fechaProyecto')->nullable();
            $table->string('estado')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('tesis', function($table) {
            $table->dropColumn('observaciones');
            $table->dropColumn('fechaProyecto');
            $table->dropColumn('estado');
        });
    }
}
