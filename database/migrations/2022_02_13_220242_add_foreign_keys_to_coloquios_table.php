<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToColoquiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coloquios', function (Blueprint $table) {
            $table->foreign(['id_institucion'], 'coloquios_ibfk_2')->references(['id'])->on('instituciones');
            $table->foreign(['id_persona'], 'coloquios_ibfk_1')->references(['id'])->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coloquios', function (Blueprint $table) {
            $table->dropForeign('coloquios_ibfk_2');
            $table->dropForeign('coloquios_ibfk_1');
        });
    }
}
