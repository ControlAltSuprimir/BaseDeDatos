<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersPersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_persona')->index('users_personas_id_persona_foreign');
            $table->unsignedBigInteger('id_user')->index('users_personas_id_user_foreign');
            $table->boolean('is_valid')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_personas');
    }
}
