<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameInfo;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Games extends Controller
{
    public function index(){
        $gamesAv = Game::where("visible", '>=', 1)->orderBy("visible", "desc")->get();
        $games = [];
        foreach($gamesAv as $game){
            $information = GameInfo::where("gameid", $game->gameid)->first();
            $games[] = [$game->gameid,
                "information" => $this->parse($information->fixedinfo)
            ];
        }
        return view("games_available", [
            "games" => $games
        ]);
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
        $game = Game::where("gameid", $name)->where("visible", 1)->first();
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
}
