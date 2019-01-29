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
            $table->unsignedInteger('team_home_id');
            $table->unsignedInteger('away_home_id');
            $table->unsignedInteger('home_goals');
            $table->unsignedInteger('away_goals');
            $table->date('match_date');
            $table->time('match_time');
            $table->timestamps();

            $table->unique(['team_home_id', "'away_home_id'"]);
            $table->foreign("team_home_id")->references('id')->on("teams_age_group");
            $table->foreign("away_home_id")->references('id')->on("teams_age_group");
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
