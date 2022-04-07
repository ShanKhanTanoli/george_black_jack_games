<?php

namespace App\HelperMethods;

use App\DashboardSettings;
use App\LandingPage;
use App\HelperMethods\Traits\PayPal;

class Site
{

	use PayPal;

 	public static function hasLogo()
 	{
 		return DashboardSettings::first();
 	}

 	public static function HasLandingPage()
    {
        return LandingPage::first();
    }
}
