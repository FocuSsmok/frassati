<?php

namespace App\Models\Players;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function players()
    {
        return $this->belongsToMany("App\Models\Players\Player", "players_age_groups");
    }
}
