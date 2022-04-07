<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WheelOfFortune extends Model
{
    protected $table = "wheel_of_fortune_settings";

    protected $fillable = [

                'start_bet',
                'bet_offset',

                'max_bet',
                'prize_1',
                'win_occurence_1',

                'prize_2',
                'win_occurence_2',

                'prize_3',
                'win_occurence_3',

                'prize_4',
                'win_occurence_4',

                'prize_5',
                'win_occurence_5',

                'prize_6',
                'win_occurence_6',

                'prize_7',
                'win_occurence_7',

                'prize_8',
                'win_occurence_8',

                'prize_9',
                'win_occurence_9',

                'prize_10',
                'win_occurence_10',


                'prize_11',
                'win_occurence_11',


                'prize_12',
                'win_occurence_12',

                'prize_13',
                'win_occurence_13',

                'prize_14',
                'win_occurence_14',

                'prize_15',
                'win_occurence_15',


                'prize_16',
                'win_occurence_16',


                'prize_17',
                'win_occurence_17',


                'prize_18',
                'win_occurence_18',


                'prize_19',
                'win_occurence_19',


                'prize_20',
                'win_occurence_20',

                'anim_idle_change_frequency',

                'led_anim_idle1_timespeed',

                'led_anim_idle2_timespeed',

                'led_anim_idle3_timespeed',

                'led_anim_win_duration',

                'led_anim_win1_timespeed',

                'led_anim_win2_timespeed',

                'led_anim_spin_timespeed',

                'led_anim_lose_duration',

                'show_credits',
                'fullscreen',
                'audio_enable_on_startup',
            ];
}
