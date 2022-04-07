<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotRamsesGameSetting extends Model
{
    protected $table = "slot_ramses_game_settings";

    protected $fillable = [
              'win_occurrence' ,
              'slot_cash',
              'min_reel_loop',
              'reel_delay',
              'time_show_win', 
              'time_show_all_wins', 

              'min_bet', 
              'max_bet',
              'max_hold',

              'bonus_occurrence', 

              'perc_win_prize_1', 
              'perc_win_prize_2', 
              'perc_win_prize_3', 
              'show_credits',
              'audio_enable_on_startup',
    ];
}
