<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPerosnaComisionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('perosna_comision', function (Blueprint $table) {
            $table->foreign(['comision_id'], 'perosna_comision_ibfk_2')->references(['id'])->on('comisiones');
            $table->foreign(['id_persona'], 'perosna_comision_ibfk_1')->references(['id'])->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('perosna_comision', function (Blueprint $table) {
            $table->dropForeign('perosna_comision_ibfk_2');
            $table->dropForeign('perosna_comision_ibfk_1');
        });
    }
}
