<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fixture_num');
            $table->unsignedInteger('team_home_id')->references('id')->on("teams");
            $table->unsignedInteger('team_away_id')->references('id')->on("teams");
            $table->unsignedInteger('age_group_id')->references('id')->on("age_groups");
            $table->unsignedInteger('home_goals');
            $table->unsignedInteger('away_goals');
            $table->date('match_date');
            $table->time('match_time');
            $table->timestamps();

            $table->unique(['team_home_id', "team_away_id", "age_group_id"]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
}
