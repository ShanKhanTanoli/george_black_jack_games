<?php

/*begin::Site Title*/
Route::get('SiteTitle','Admin\AdminController@settings')->name('AdminSettings');
Route::post('SaveSettings/{id}','Admin\AdminController@SaveSettings')->name('AdminSaveSettings');
/*end::Site Title*/

/*begin::Site Logo*/
Route::get('SiteLogo','Admin\AdminController@Sitelogo')->name('AdminSiteLogo');
Route::post('SaveSitelogo/{id}','Admin\AdminController@SaveSitelogo')->name('AdminSaveSiteLogo');

Route::post('RemoveSitelogo/{id}','Admin\AdminController@RemoveSitelogo')->name('AdminRemoveSiteLogo');
/*end::Site Logo*/
?>
