<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TeamsController extends Controller
{
    //    View country teams
    public function view_teams_specific_country($gameid, $country_id){
        if (!session()->has("gameid_in") || session()->get("gameid_in") !== $gameid){
            return redirect()->route("games.my");
        }
        $game = new Games();
//        Get Teams
        $data = $game->get_game_information($gameid);
//        Get fixtures foreach team
        $teams = DB::connection(env("DB_STARTUP") . $gameid)->table("teams")->where("countryid", $country_id)->where("name", "!=", "[LID:2822][/LID]")->get();

        return view("GameDashboard.index", [
            "game" => [
                "data" => $data,
                "id" => $gameid
            ],
            "with_up_header" => false,
            "type" => "listing_teams",
            "game_header" => true,
            "teams" => $teams,
            "country_id" => $country_id
        ]);
    }

    public function team_cat_redirect($gameid, $teamid){
        if (!session()->has("gameid_in") || session()->get("gameid_in") !== $gameid){
            return redirect()->route("games.my");
        }

        $the_team = DB::connection(env("DB_STARTUP") . $gameid)->table("teams")->where("id", $teamid)->first();
        if (!$the_team){
            throw new NotFoundHttpException();
        }

        $rname = Route::currentRouteName();
        $rname = str_replace("games.manage.teams.", "", $rname);
        $the_type = null;
        switch ($rname){
            case "fixtures":
                $the_type = DB::connection(env("DB_STARTUP") . $gameid)->table("fixtures")->where("hometeamid", $teamid)->orWhere("awayteamid", $teamid)->get();
                break;
            case "information":
                $rname = "";
                break;
            case "players":

                $the_type = DB::connection(env("DB_STARTUP") . $gameid)
                            ->table("players")->where("teamid", $the_team->id)
                            ->get();
                break;
            case "staff":
                $the_type = DB::connection(env("DB_STARTUP") . $gameid)
                    ->table("employees")->where("teamid", $the_team->id)
                    ->get();
                break;
        }

        $game = new Games();
//        Get Teams
        $data = $game->get_game_information($gameid);

        return view("GameDashboard.index", [
            "game" => [
                "data" => $data,
                "id" => $gameid
            ],
            "with_up_header" => false,
            "type" => "team_information",
            "game_header" => true,
                "team_type" => $rname,
            "team_data" => [
                $the_team,
                $the_type
            ]
        ]);
    }
}
