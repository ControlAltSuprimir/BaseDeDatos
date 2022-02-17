<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPersonasComisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personas_comision', function (Blueprint $table) {
            $table->foreign(['id_persona'])->references(['id'])->on('personas');
            $table->foreign(['id_comision'])->references(['id'])->on('comisiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personas_comision', function (Blueprint $table) {
            $table->dropForeign('personas_comision_id_persona_foreign');
            $table->dropForeign('personas_comision_id_comision_foreign');
        });
    }
}
