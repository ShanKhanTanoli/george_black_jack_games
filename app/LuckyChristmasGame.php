<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LuckyChristmasGame extends Model
{
    protected $table = "lucky_christmas_game_settings";

    protected $fillable = [
              'win_occurrence' ,
              'slot_cash',
              'min_reel_loop',
              'reel_delay',
              'time_show_win', 
              'time_show_all_wins', 

              'min_bet', 
              'max_bet', 

              'bonus_occurrence', 

              'perc_win_bonus_prize_1', 
              'perc_win_bonus_prize_2', 
              'perc_win_bonus_prize_3', 
              'show_credits',
    ];
}
