<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WithDrawPage extends Model
{
    protected $table = "request_withdraw_page";

    protected $fillable = ['title','withdrawDescription','minLimit'];
}
