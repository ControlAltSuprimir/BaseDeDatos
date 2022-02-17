<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTesisinternaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tesisinterna', function (Blueprint $table) {
            $table->foreign(['id_tesis'], 'tesisinterna_ibfk_2')->references(['id'])->on('tesis');
            $table->foreign(['tesista'], 'tesisinterna_ibfk_1')->references(['id'])->on('personas_programas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tesisinterna', function (Blueprint $table) {
            $table->dropForeign('tesisinterna_ibfk_2');
            $table->dropForeign('tesisinterna_ibfk_1');
        });
    }
}
