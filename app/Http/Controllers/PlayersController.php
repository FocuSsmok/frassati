<?php

namespace App\Http\Controllers;

use App\Models\Players\Player;
use App\Models\Players\PlayersAgeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayersController extends Controller
{
    //
    public function getPlayers(Request $request)
    {
        $ageGroup = $request["team"];
        $players = DB::table("players_age_groups")
            ->join("players", "player_id", "=", "players.id")
            ->join("age_groups", "age_group_id", "=", "age_groups.id")
            ->join("positions", "position_id", "=", "positions.id")
            ->select(
                "players_age_groups.goals",
                "players_age_groups.assists",
                "players_age_groups.yellow_cards",
                "players_age_groups.red_cards",
                "players.id as player_id",
                "players.first_name",
                "players.surname",
                "players.date_of_birth as date_of_birth",
                "positions.name as position",
                "age_groups.name as age_group")
            ->where("age_groups.name", '=', $ageGroup)
            ->get();
        // $players = Player::all();
        // $players = DB::table("players")->get();
        // $positions = DB::table("positions")->get();
        // $ageGroups = DB::table("age_groups")->get();

        return response()->json($players, 200);

        // return view('playground.players', ["playersList" => $players, "positions" => $positions, "ageGroups" => $ageGroups]);
    }

    public function getAllPlayers(Request $request)
    {
        $players = Player::all();

        return response()->json($players);
    }

    public function addPlayer(Request $request, $player_id = null)
    {
        $data = $request->all();
        $data = [
            "first_name" => $data["first_name"],
            "surname" => $data["surname"],
            "date_of_birth" => $data["date_of_birth"],
            "position" => $data["position_id"],
            "age_group" => $data["team"],
            "goals" => $data["goals"],
            "assists" => $data["assists"],
            "yellow_cards" => $data["yellow_cards"],
            "red_cards" => $data["red_cards"],
        ];

        $age_group_id = DB::table("age_groups")->where("name", $data["age_group"])->value("id");
        $data["age_group"] = $age_group_id;

        if ($player_id) {
            $playerAgeGroup = new PlayersAgeGroup();
            $playerAgeGroup->position_id = $data["position"];
            $playerAgeGroup->player_id = $player_id;
            $playerAgeGroup->age_group_id = $data["age_group"];
            $playerAgeGroup->goals = $data["goals"];
            $playerAgeGroup->assists = $data["assists"];
            $playerAgeGroup->yellow_cards = $data["yellow_cards"];
            $playerAgeGroup->red_cards = $data["red_cards"];
            $result = $playerAgeGroup->save();
            return response()->json($result);
        } else {
            $player = new Player();
            $player->first_name = $data["first_name"];
            $player->surname = $data["surname"];
            $player->date_of_birth = $data["date_of_birth"];
            // return 1;
            if ($player->save()) {
                $playerToAgeGroup = new PlayersAgeGroup();
                $playerToAgeGroup->player_id = $player->id;
                $playerToAgeGroup->position_id = $data["position"];
                $playerToAgeGroup->age_group_id = $data["age_group"];
                $playerToAgeGroup->goals = $data["goals"];
                $playerToAgeGroup->assists = $data["assists"];
                $playerToAgeGroup->yellow_cards = $data["yellow_cards"];
                $playerToAgeGroup->red_cards = $data["red_cards"];
                $result = $playerToAgeGroup->save();
                return response()->json($result);
            }
        }
    }

    public function updatePlayer(Request $request, $team, $player_id)
    {

        $ageGroupId = DB::table("age_groups")->where("name", $team)->value('id');

        $data = $request->all();
        $data = [
            "player" => $data["player"],
        ];

        $player = Player::find($player_id);
        $player->first_name = $data["player"]["first_name"];
        $player->surname = $data["player"]["surname"];
        $player->date_of_birth = $data["player"]["date_of_birth"];
        $player->updated_at = date('Y-m-d G:i:s');
        $player->save();

        // $player_age_group = DB::table("players_age_groups")
        //     ->select("players_age_groups.id")
        //     ->whereRaw("player_id = " . $player_id . " AND age_group_id = " . $ageGroupId)
        //     ->get();
        $player_age_group = PlayersAgeGroup::where("player_id", "=", $player_id)->where("age_group_id", "=", $ageGroupId)->first();

        if ($player_age_group) {
            $position = DB::table("positions")->where("name", $data["player"]["position"])->value("id");
            $player_age_group->goals = $data["player"]["goals"];
            $player_age_group->assists = $data["player"]["assists"];
            $player_age_group->position_id = $position;
            $player_age_group->yellow_cards = $data["player"]["yellow_cards"];
            $player_age_group->red_cards = $data["player"]["red_cards"];
            $player_age_group->updated_at = date('Y-m-d G:i:s');
            $player_age_group->save();
            return $player_age_group;

        }

    }
}
