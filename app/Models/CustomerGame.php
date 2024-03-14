<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerGame extends Model
{
    use HasFactory;

    protected $table = "customergame";
    protected $fillable = ["login", "gameid"];

    public $timestamps = false;
}
