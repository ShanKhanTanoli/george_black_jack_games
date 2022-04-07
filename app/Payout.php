<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $table = "payouts";

    protected $fillable = [
    	'user_id',
    	'voucher_id',
		'payout_item_id',
		'transaction_id',
		'activity_id',
		'transaction_status',
		'payout_batch_id',
		'receiver_id',
		'amount_value',
    ];
}
