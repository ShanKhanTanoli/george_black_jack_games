<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameHistory extends Model
{
    protected $table = "gamehistory";

    protected $fillable = ['GameId','plan_id','user_id','status','gotNumbers','WinningAmount'];
}
