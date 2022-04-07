<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DashboardSettings extends Model
{
    protected $table = "dashboardsettings";

    protected $fillable = ['sitetitle','siteLogo'];
}
