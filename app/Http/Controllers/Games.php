<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class Games extends Controller
{
    public function index(){
        $gamesAv = Game::where("visible", 1)->get();
        return view("games_available", [
            "games" => $gamesAv
        ]);
    }
}
