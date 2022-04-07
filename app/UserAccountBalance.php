<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAccountBalance extends Model
{
    protected $table = "user_balances";

    protected $fillable = ['user_id','amountStatus','totalAmount'];
}
