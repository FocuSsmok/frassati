<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsAgeGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams_age_group', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("team_id");
            $table->unsignedInteger("age_group_id");
            $table->timestamps();

            $table->unique(["team_id", "age_group_id"]);
            $table->foreign("team_id")->references('id')->on("teams");
            $table->foreign("age_group_id")->references('id')->on("age_group");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams_age_group');
    }
}
