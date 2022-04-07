<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EgyptianNightsGameSetting extends Model
{
    protected $table = "egyptian_nights";

    protected $fillable = [
              'win_occurrence' ,
              'slot_cash',
              'min_reel_loop',
              'reel_delay',
              'time_show_win', 
              'time_show_all_wins', 
              'bonus_occurrence', 
              'show_credits',
              'audio_enable_on_startup',
    ];
}
