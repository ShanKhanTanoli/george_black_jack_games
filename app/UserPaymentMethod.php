<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPaymentMethod extends Model
{
    protected $table = "user_payment_methods";

    protected $fillable = ['payment_method','user_id','type','brand','country','exp_month','exp_year','last4','customer'];
}
