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

Route::middleware('auth')->name("games.")->group(function (){
   Route::prefix("/games")->group(function (){
       Route::get("/available", [\App\Http\Controllers\Games::class, "index"])->name("available");
       Route::get("/my-games", [\App\Http\Controllers\Games::class, "my_games"])->name("my");
       Route::get("/{name}", [\App\Http\Controllers\Games::class, "specific_game"])->name("info");
       Route::get("/join/{gameid}", [\App\Http\Controllers\Games::class, "join"])->name("join");

       Route::prefix("/manage/{gameid}")->name("manage.")->group(function (){
           Route::get("/map", [\App\Http\Controllers\Games::class, "map_game"])->name("map");
           Route::prefix("/teams")->group(function (){
               Route::get("/{country_id}", [\App\Http\Controllers\TeamsController::class, "view_teams_specific_country"])->name("country.teams");
               Route::prefix("{team_id}/")->name("teams.")->group(function (){
                   Route::get("/information", [\App\Http\Controllers\TeamsController::class, "team_cat_redirect"])->name("information");
                   Route::get("/fixtures", [\App\Http\Controllers\TeamsController::class, "team_cat_redirect"])->name("fixtures");
                   Route::get("/players", [\App\Http\Controllers\TeamsController::class, "team_cat_redirect"])->name("players");
                   Route::get("/staff", [\App\Http\Controllers\TeamsController::class, "team_cat_redirect"])->name("staff");

                   Route::prefix("/jobs/")->name("jobs.")->group(function (){
                      Route::post("/apply", [\App\Http\Controllers\TeamsController::class, "apply_for_job"])->name("apply");
                   });
               });

               Route::get("/player-info/{player}", [\App\Http\Controllers\TeamsController::class, "player_info"])->name("player.info");
           });
       });
   });
});
