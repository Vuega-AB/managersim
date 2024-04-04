<?php

namespace App\Http\Controllers;

use App\Models\CustomerGame;
use App\Models\Game;
use App\Models\GameInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Games extends Controller
{

    private $db_startup = "manager_";

    public function index(){
        $games = $this->get_av_games();
        return view("games_available", [
            "games" => $games,
            "title" => "Available Games"
        ]);
    }
    public function my_games(){
        $games = $this->get_av_games();
        foreach ($games as $key => $game){
            $customer_game = CustomerGame::where("login", \auth()->user()->login)->where("gameid", $game[0])->first();
            if (!$customer_game){
                unset($games[$key]);
            }
        }

        return view("games_available", [
            "games" => $games,
            "title" => "My Games"
        ]);
    }

    private function get_av_games(){
        $gamesAv = Game::where("visible", '>=', 1)->orderBy("visible", "desc")->get();
        $games = [];
        foreach($gamesAv as $game){
            $information = GameInfo::where("gameid", $game->gameid)->first();
            $games[] = [
                $game->gameid,
                "information" => $this->parse($information->fixedinfo)
            ];
        }

        return $games;
    }

    private function parse($string){
        $parsedData = [];

        $patterns = [
            '/<DISPLAYNAME>(.*?)<\/DISPLAYNAME>/',
            '/<SHORTDESCRIPTION>(.*?)<\/SHORTDESCRIPTION>/',
            '/<LONGDESCRIPTION>(.*?)<\/LONGDESCRIPTION>/',
            '/<TYPE>(.*?)<\/TYPE>/',
            '/<FLAGS>(.*?)<\/FLAGS>/'
        ];

        foreach ($patterns as $pattern) {
            preg_match($pattern, $string, $matches);
            if (isset($matches[1])) {
                $parsedData[$this->getTagName($pattern)] = $matches[1];
            }
        }

        return $parsedData;
    }

    private function getTagName($pattern) {
        preg_match('/<([A-Z]+)>/', $pattern, $matches);
        return strtolower($matches[1]);
    }

    public function specific_game($name){
        $game = Game::where("gameid", $name)->where("visible", ">=", 1)->first();
        if (!$game){
            throw new NotFoundHttpException();
        }
        $information = GameInfo::where("gameid", $game->gameid)->first();
        if(!$information){
            throw new NotFoundHttpException();
        }
        if(!$game){
            throw new NotFoundHttpException();
        }

        return view("game", [
            "game" => $game
        ]);
    }

    public function join($gameid){
        if (!Auth::user()){
            return redirect()->route("login");
        }
        $game = Game::where("gameid", $gameid)->first();
        if (!$game || $game->visible == 0){
            throw new NotFoundHttpException();
        }

//        Store in Managersim -> customergame
        $customerGame = CustomerGame::where("login", \auth()->user()->login)->where("gameid", $gameid)->first();
        if (!$customerGame){
//            Create a new customer game
            $newCG = new CustomerGame();
            $newCG->login = \auth()->user()->login;
            $newCG->gameid = $gameid;
            $newCG->save();
        }

        session()->put("gameid_in", $gameid);
//        Update / Create in manager_{game} -> humanplayers
        $hP = DB::connection($this->db_startup . $gameid)->table("humanplayers")->where("login", \auth()->user()->login)->first();
        if (!$hP){
            DB::connection($this->db_startup . $gameid)->table("humanplayers")->insert([
                "login" => \auth()->user()->login,
                "pass" => \auth()->user()->pass,
                "realname" => \auth()->user()->realname,
                "gameid" => $gameid,
                "personaltextinfo" => "DEFAULT",
                "supportedlanguages" => \auth()->user()->supportedlanguages
            ]);
        }

//        DB::connection("managersim_challenge1");

//        Get game information
        $data = $this->get_game_information($gameid);
        return view("GameDashboard.index", [
            "game" => [
                "data" => $data,
                "id" => $gameid
            ],
            "with_up_header" => false,
            "type" => "index",
            "game_header" => true
        ]);
    }

    private function get_game_information($game_id){
        //        Get game information
        $information = GameInfo::where("gameid", $game_id)->first();
        if (!$information){
            throw new NotFoundHttpException();
        }
        $data = $this->parse($information->fixedinfo);

        return $data;
    }


//    Map
    public function map_game($gameid){
        if (!session()->has("gameid_in") || session()->get("gameid_in") !== $gameid){
            return redirect()->route("games.my");
        }
//        Get game information
        $data = $this->get_game_information($gameid);
        return view("GameDashboard.index", [
            "game" => [
                "data" => $data,
                "id" => $gameid
            ],
            "with_up_header" => false,
            "type" => "map",
            "game_header" => false
        ]);
    }
//    View country teams
    public function view_teams_specific_country($gameid, $country_id){
        if (!session()->has("gameid_in") || session()->get("gameid_in") !== $gameid){
            return redirect()->route("games.my");
        }
//        Get Teams
        $data = $this->get_game_information($gameid);
        $teams = DB::connection($this->db_startup . $gameid)->table("teams")->where("countryid", $country_id)->get();
        return view("GameDashboard.index", [
            "game" => [
                "data" => $data,
                "id" => $gameid
            ],
            "with_up_header" => false,
            "type" => "listing_teams",
            "game_header" => true,
            "teams" => $teams
        ]);
    }
}
