<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Games extends Controller
{
    public function index(){
        $gamesAv = Game::where("visible", 1)->get();
        return view("games_available", [
            "games" => $gamesAv
        ]);
    }

    public function specific_game($name){
        $game = Game::where("gameid", $name)->where("visible", 1)->first();
        if(!$game){
            throw new NotFoundHttpException();
        }

        return view("game", [
            "game" => $game
        ]);
    }
}
