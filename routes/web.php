<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

// User Routes

Route::middleware('guest')->group(function (){
    Route::get("/login", [\App\Http\Controllers\UserController::class, "login"])->name("login");
    Route::get("/register", [\App\Http\Controllers\UserController::class, "register"])->name("register");
    Route::get("/forgot-password", [\App\Http\Controllers\UserController::class, "forgot_password_to_route"])->name("forgotPassword");

    Route::post("/register", [\App\Http\Controllers\UserController::class, "signup_user"])->name("register");
    Route::post("/login", [\App\Http\Controllers\UserController::class, "login_user"])->name("login");

    Route::post("/forgot-password", [\App\Http\Controllers\UserController::class, "forgot_password"])->name("resubmit_for_password");

});

Route::middleware('auth')->group(function (){
   Route::prefix("/games")->group(function (){
       Route::get("/available", [\App\Http\Controllers\Games::class, "index"])->name("games.available");
       Route::get("/my-games", [\App\Http\Controllers\Games::class, "my_games"])->name("games.my");
       Route::get("/{name}", [\App\Http\Controllers\Games::class, "specific_game"])->name("games.info");
       Route::get("/join/{gameid}", [\App\Http\Controllers\Games::class, "join"])->name("game.join");

       Route::prefix("/manage/{gameid}")->group(function (){
           Route::get("/map", [\App\Http\Controllers\Games::class, "map_game"])->name("games.manage.map");
           Route::prefix("/teams")->group(function (){
               Route::get("/{country_id}", [\App\Http\Controllers\TeamsController::class, "view_teams_specific_country"])->name("games.manage.country.teams");
               Route::get("/information/{team_id}", [\App\Http\Controllers\TeamsController::class, "specific_team_information"])->name("games.manage.teams.information");
           });
       });
   });
});
