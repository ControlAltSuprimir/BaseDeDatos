<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToUsersPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_personas', function (Blueprint $table) {
            $table->foreign(['id_user'])->references(['id'])->on('users');
            $table->foreign(['id_persona'])->references(['id'])->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_personas', function (Blueprint $table) {
            $table->dropForeign('users_personas_id_user_foreign');
            $table->dropForeign('users_personas_id_persona_foreign');
        });
    }
}
