<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LandingPage extends Model
{
    protected $table = "landingpage";

    protected $fillable = ['page_heading','hero_image','short_description','long_description','about_heading','about_description'];
}
