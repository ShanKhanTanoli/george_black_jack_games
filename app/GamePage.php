<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamePage extends Model
{
    protected $table = "gamepage";

    protected $fillable = ['pagetitle','gameinfo','buttontext'];
}
