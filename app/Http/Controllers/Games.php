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

//        Update / Create in manager_{game} -> humanplayers
        $hP = DB::connection("manager_" . $gameid)->table("humanplayers")->where("login", \auth()->user()->login)->first();
        if (!$hP){
            DB::connection("manager_" . $gameid)->table("humanplayers")->insert([
                "login" => \auth()->user()->login,
                "pass" => \auth()->user()->pass,
                "realname" => \auth()->user()->realname,
                "gameid" => $gameid,
                "personaltextinfo" => "DEFAULT",
                "supportedlanguages" => \auth()->user()->supportedlanguages
            ]);
        }

//        Get game information
        $information = GameInfo::where("gameid", $game->gameid)->first();
        if (!$information){
            throw new NotFoundHttpException();
        }
        $data = $this->parse($information->fixedinfo);
        return view("GameDashboard.index", [
            "game" => [
                "data" => $data
            ],
            "with_up_header" => false,
            "type" => "index"
        ]);
    }
}
