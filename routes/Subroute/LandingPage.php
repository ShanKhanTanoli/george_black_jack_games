<?php
Route::get('/',function(){
	
return view('LandingPage.index');

});

Route::get('Gallery',function(){
	
return view('LandingPage.Gallery');

})->name('gallery');

/*begin::Site Title*/
Route::get('SiteMain','Admin\LandingPageController@SiteMain')->name('AdminSiteMain');
Route::post('SaveSiteMain/{id}','Admin\LandingPageController@SaveSiteMain')->name('AdminSaveSiteMain');
/*end::Site Title*/

/*begin::Landing Page About Section*/
Route::get('SiteAbout','Admin\LandingPageController@SiteAbout')->name('AdminSiteAbout');

Route::post('SaveSiteAbout/{id}','Admin\LandingPageController@SaveSiteAbout')->name('AdminSaveSiteAbout');

Route::post('RemoveSiteHeroImage/{id}','Admin\LandingPageController@RemoveSiteHeroImage')->name('AdminRemoveSiteHeroImage');
/*end::Landing Page About Section*/

?>
