<?php

namespace App\Http\Controllers\Admin\Games;

use App\Http\Controllers\Controller;
use App\Models\Games\Fixture;
use App\Models\Games\Team;
use App\Models\Games\TeamsAgeGroup;
use App\Models\Players\AgeGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Illuminate

class GamesController extends Controller
{
    public function games()
    {
        return view("admin.games.game");
    }

    public function teamGames(Request $request)
    {
        return view("admin.games.game");
    }

    public function editTeam(Request $request, $age_group, $team_id)
    {
        $data = $request->all();
        $data = [
            'team' => $data["team"]
        ];
        // return response()->json($data);
        $team = Team::find($team_id);
        $team->name = $data["team"];
        $result = $team->save();
        if ($result) {
            return response()->json("true", 200);
        } else {
            return response()->json("false", 200);
        }
    }

    public function deleteTeam(Request $request, $age_group, $team_id) {
        $age_group = DB::table('age_groups')->where("name", $age_group)->first()->id;
        $team = Team::find($team_id);
        $team->agegroups()->detach($age_group);
        
        return response()->json($team, 200);
    }

    public function addTeam(Request $request, $age_group)
    {
        $data = $request->all();
        $data = ['team' => $data["team"]];
        $result = "";

        if ((!$team = Team::where("name", $data["team"])->first())) {
            $team = new Team();
            $team->name = $data["team"];
            $result = $team->save();
        }

        if ($team->id) {
            $teamAgeGroup = new TeamsAgeGroup();
            $teamAgeGroup->team_id = $team->id;
            $teamAgeGroup->age_group_id = DB::table('age_groups')->where("name", "=", $age_group)->value("id");
            if (!(TeamsAgeGroup::where("team_id", $teamAgeGroup->team_id)->where("age_group_id", $teamAgeGroup->age_group_id)->first())) {
                $result = $teamAgeGroup->save();
            }
        }
        return response()->json($result);
    }

    public function getTeams($age_group)
    {
        $teams = AgeGroup::where("name", $age_group)->first()->teams;
        return response()->json($teams);
    }

    public function addFixture(Request $request, $age_group)
    {
        date_default_timezone_set("Europe/Warsaw");

        DB::transaction(function () use ($age_group, $request) {
            try {
                $age_group = DB::table('age_groups')->where("name", "=", $age_group)->value("id");
                $data = $request->all();
                $data = [
                    "matches" => $data["matches"],
                    "num" => $data["num"],
                ];
                foreach ($data["matches"] as $match) {
                    $time = $match["time"]["HH"] . ":" . $match["time"]["mm"] . ":00";
                    // return ;
                    DB::table("fixtures")->insert(
                        [
                            "fixture_num" => $data["num"],
                            "team_home_id" => $match["home"]["team"],
                            "home_goals" => $match["home"]["goals"],
                            "team_away_id" => $match["away"]["team"],
                            "away_goals" => $match["away"]["goals"],
                            "age_group_id" => $age_group,
                            "match_date" => $match["date"],
                            "match_time" => $time,
                        ]);
                }
                return response()->json("true");
            } catch (\Illuminate\Database\QueryException $e) {
                throw $e;
            } catch (\Exception $e) {throw $e;}
        });

    }

    public function allFixture(Request $request, $age_group)
    {
        $age_group = DB::table('age_groups')->where("name", "=", $age_group)->value("id");
        $team_count = AgeGroup::find($age_group)->teams->count();
        $fixtures_max = AgeGroup::find($age_group)->fixtures->max("fixture_num");
        $fixtures = [];
        for ($i = 1; $i <= $fixtures_max; $i++) {
            $fixtures[$i] = DB::table("fixtures")->where("age_group_id", $age_group)->where("fixture_num", $i)->get();
        }
        // var_dump($fixtures);
        return response()->json($fixtures);
    }

    public function updateFixture(Request $request, $age_group)
    {
        $data = $request->all();
        $age_group = DB::table('age_groups')->where("name", "=", $age_group)->value("id");

        $data = [
            "fixture" => $data["fixture"],
        ];

        try {
            foreach ($data["fixture"] as $match) {
                Fixture::where("id", $match["id"])->update(
                    [
                        "team_home_id" => $match["team_home_id"],
                        "team_away_id" => $match["team_away_id"],
                        "home_goals" => $match["home_goals"],
                        "away_goals" => $match["away_goals"],
                        "match_date" => $match["match_date"],
                        "match_time" => $match["match_time"],
                    ]
                );
            }
            return response()->json(true);
        } catch (Exception $e) {
            return response()->json($e);
        }

    }

    public function generateTable($age_group)
    {
        $age_group = DB::table('age_groups')->where("name", "=", $age_group)->value("id");
        $teams = AgeGroup::find($age_group)->teams;

        foreach ($teams as $team) {
            $team["fixtures"] = DB::table("fixtures")
                ->whereRaw("(team_home_id = ? OR team_away_id = ?) AND age_group_id = ? AND (home_goals IS NOT NULL AND away_goals IS NOT NULL)", [$team->id, $team->id, $age_group])->get();
        }

        $table = [];
        for ($i = 0; $i < \count($teams); $i++) {
            $table[$i]["team"] = $teams[$i]["name"];
            $table[$i]["points"] = 0;
            $table[$i]["matches"] = 0;
            $table[$i]["goals_scored"] = 0;
            $table[$i]["goals_against"] = 0;
            $table[$i]["goals_diff"] = 0;
            $table[$i]["wins"] = 0;
            $table[$i]["draws"] = 0;
            $table[$i]["loses"] = 0;
            for ($j = 0; $j < \count($teams[$i]["fixtures"]); $j++) {
                $current_team = $teams[$i]["id"];
                $fixture = $teams[$i]["fixtures"][$j];
                // return response()->json($fixture);
                if ($current_team == $fixture->team_home_id) {
                    if ($fixture->home_goals > $fixture->away_goals) {
                        $table[$i]["points"] += 3;
                        $table[$i]["goals_scored"] += $fixture->home_goals;
                        $table[$i]["goals_against"] += $fixture->away_goals;
                        $table[$i]["wins"] += 1;
                    } elseif ($fixture->home_goals == $fixture->away_goals) {
                        $table[$i]["points"] += 1;
                        $table[$i]["goals_scored"] += $fixture->home_goals;
                        $table[$i]["goals_against"] += $fixture->away_goals;
                        $table[$i]["draws"] += 1;
                    } else {
                        $table[$i]["points"] += 0;
                        $table[$i]["goals_scored"] += $fixture->home_goals;
                        $table[$i]["goals_against"] += $fixture->away_goals;
                        $table[$i]["loses"] += 1;
                    }
                    $table[$i]["matches"] += 1;
                } elseif ($current_team == $fixture->team_away_id) {
                    if ($fixture->away_goals > $fixture->home_goals) {
                        $table[$i]["points"] += 3;
                        $table[$i]["goals_scored"] += $fixture->away_goals;
                        $table[$i]["goals_against"] += $fixture->home_goals;
                        $table[$i]["wins"] += 1;
                    } elseif ($fixture->home_goals == $fixture->away_goals) {
                        $table[$i]["points"] += 1;
                        $table[$i]["goals_scored"] += $fixture->away_goals;
                        $table[$i]["goals_against"] += $fixture->home_goals;
                        $table[$i]["draws"] += 1;
                    } else {
                        $table[$i]["points"] += 0;
                        $table[$i]["goals_scored"] += $fixture->away_goals;
                        $table[$i]["goals_against"] += $fixture->home_goals;
                        $table[$i]["loses"] += 1;
                    }
                    $table[$i]["matches"] += 1;
                }
            }
        }

        for ($i = 0; $i < count($table); $i++) {
            $table[$i]["goals_diff"] = $table[$i]["goals_scored"] - $table[$i]["goals_against"];
        }

        return $table;
    }

    public function recentlyFixture()
    {
        $nextFixture = DB::table("fixtures")
            ->whereRaw("age_group_id = 1 AND match_date >= NOW()")
            ->orderBy("match_date", "desc")
            ->take(7)
            ->get();
        $lastFixture = DB::table("fixtures")->whereRaw("age_group_id = 1 AND match_date < NOW()")->orderBy("match_date", "desc")->take(7)->get();

        for ($i = 0; $i < count($nextFixture); $i++) {
            $nextFixture[$i]->home_team = Team::find($nextFixture[$i]->team_home_id)->name;
            $nextFixture[$i]->away_team = Team::find($nextFixture[$i]->team_away_id)->name;
        }
        for ($i = 0; $i < count($lastFixture); $i++) {
            $lastFixture[$i]->home_team = Team::find($lastFixture[$i]->team_home_id)->name;
            $lastFixture[$i]->away_team = Team::find($lastFixture[$i]->team_away_id)->name;
        }
        // return $lastFixture["team_home_id"];
        return ["next" => $nextFixture, "last" => $lastFixture];
    }

}
