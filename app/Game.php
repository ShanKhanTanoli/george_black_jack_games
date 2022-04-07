<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BeyondCode\Vouchers\Traits\HasVouchers;

class Game extends Model
{
    protected $table = "games";

    use HasVouchers;

    protected $fillable = ['name','gameAvatar','description','win_occurrence','slot_cash','bonus_occurrence','min_bet','max_bet','max_hold','perc_win_prize_1','perc_win_prize_2','perc_win_prize_3','show_credits','audio_enable_on_startup'];
}
