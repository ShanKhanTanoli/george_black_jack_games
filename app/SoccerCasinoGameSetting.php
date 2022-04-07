<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoccerCasinoGameSetting extends Model
{
    protected $table = "soccer_casino_game_settings";

    protected $fillable = [
              'win_occurrence' ,
              'slot_cash',
              'min_reel_loop',
              'reel_delay',
              'time_show_win', 
              'time_show_all_wins', 
              'bonus_occurrence', 
              'freespin_occurrence',
              'show_credits',
    ];
}
