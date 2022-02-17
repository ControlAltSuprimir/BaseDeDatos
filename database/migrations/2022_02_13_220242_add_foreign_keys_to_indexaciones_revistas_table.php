<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToIndexacionesRevistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('indexaciones_revistas', function (Blueprint $table) {
            $table->foreign(['id_Indexacion'], 'indexaciones_revistas_ibfk_2')->references(['id'])->on('indexaciones');
            $table->foreign(['id_Revista'], 'indexaciones_revistas_ibfk_1')->references(['id'])->on('revistas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('indexaciones_revistas', function (Blueprint $table) {
            $table->dropForeign('indexaciones_revistas_ibfk_2');
            $table->dropForeign('indexaciones_revistas_ibfk_1');
        });
    }
}
