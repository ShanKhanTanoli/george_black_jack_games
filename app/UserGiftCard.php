<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGiftCard extends Model
{
    protected $table = "user_voucher";

    protected $fillable = ['user_id','voucher_id'];
}
