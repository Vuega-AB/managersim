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
   Route::get("/games-available", [\App\Http\Controllers\Games::class, "index"]);
});
