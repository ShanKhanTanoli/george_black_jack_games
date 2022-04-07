<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalCheckout extends Model
{
    protected $table = "checkouts";

    protected $fillable = [
    	'user_id',
    	'voucher_id',
		'Order_ID',
		'Order_Status',
		'Payer_Given_Name',
		'Payer_Sur_Name',
		'Payer_Email',
		'Payer_ID',
		'Paid_Amount',
		'Paid_At',
    ];
}
