<?php

namespace App\Models\Games;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ["name"];

    public function agegroups()
    {
        return $this->belongsToMany('App\Models\Player\AgeGroup', "teams_age_groups");
    }
}
