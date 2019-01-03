<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersAgeGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players_age_group', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("player_id")->references('id')->on('players');
            $table->unsignedInteger("age_group_id")->references('id')->on('age_group');
            $table->unsignedInteger("position_id")->references('id')->on('position');
            $table->unsignedInteger("goals");
            $table->unsignedInteger("assists");
            $table->unsignedInteger("yellow_cards");
            $table->unsignedInteger("red_cards");
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
        Schema::dropIfExists('players_age_group');
    }
}
