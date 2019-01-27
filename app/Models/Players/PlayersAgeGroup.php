<?php

namespace App\Models\Players;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class PlayersAgeGroup extends Model
{
    // protected $primaryKey = ["player_id", "age_group_id"];

    /**
     * Set the keys for a save update query.
     * This is a fix for tables with composite keys
     * TODO: Investigate this later on
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
        //Put appropriate values for your keys here:
        ->where('player_id', '=', $this->player_id)
            ->where('age_group_id', '=', $this->age_group_id);

        return $query;
    }
}
