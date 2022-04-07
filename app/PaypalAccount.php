<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalAccount extends Model
{
    protected $table = "paypal_accounts";

    protected $fillable = [
    	'user_id',
		'paypal_id',
    ];
}
