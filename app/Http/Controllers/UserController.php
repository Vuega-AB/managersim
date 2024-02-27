<?php

namespace App\Http\Controllers;

use App\Mail\SendInviteMember;
use App\Mail\SendPasswordMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function auth($type){
        return view("guest", [
            "type" => $type
        ]);
    }

    public function login(){
        return $this->auth("login");
    }
    public function register(){
        return $this->auth('register');
    }


    public function signup_user(Request $request){
        $request->validate([
            "email" => "required|email",
            "name" => "required"
        ]);

        $user = User::where("email", $request->email)->first();
        if($user){
            return redirect()->back()->with("error", "This email is already in use.");
        } else {
            $user = new User();
            $user->realname = $request->name;
            $user->email = $request->email;
            $user->pass = Str::random(10);
            $user->login = Str::random(10);
            $user->created = $this->timeToSdn(time());
            $user->supportedlanguages = "es";
            $user->save();

            Mail::to($user->email)->send(new SendPasswordMail([
                "from" => env("MAIL_USERNAME"),
                "name" => $request->name,
                "password" => $user->pass
            ]));

            return redirect()->route("login")->with("created", "Succesfuly created your account. Check your email for password");
        }
    }

    public function login_user(Request $request){
        $request->validate([
           "email" => "required",
           "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();
        if(!$user){
            return redirect()->back()->with("error", "Invalid email");
        }
        if($request->password == $user->pass){
            Auth::login($user, true);
            return redirect()->route("welcome");
        } else {
            return redirect()->back()->with("error", "Invalid password");
        }
    }

    private function timeToSdn($timestamp)
    {
        $referenceDate = Carbon::create(1900, 1, 1);

        $daysDifference = $referenceDate->diffInDays(Carbon::createFromTimestamp($timestamp));

        return $daysDifference + 1;
    }
}
