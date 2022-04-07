<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalCredential extends Model
{
	protected $table = "paypal_credentials";

    protected $fillable = [

    	'PAYPAL_MODE',
		'PAYPAL_SANDBOX_CLIENT_ID',
		'PAYPAL_SANDBOX_SECRET',
		'PAYPAL_SANDBOX_ACCOUNT',
		'PAYPAL_LIVE_CLIENT_ID',
		'PAYPAL_LIVE_SECRET',

		];
}
