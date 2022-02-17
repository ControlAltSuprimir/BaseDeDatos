<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPtuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ptu', function (Blueprint $table) {
            $table->foreign(['id_persona'], 'ptu_ibfk_1')->references(['id'])->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ptu', function (Blueprint $table) {
            $table->dropForeign('ptu_ibfk_1');
        });
    }
}
