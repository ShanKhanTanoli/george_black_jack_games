<?php
    Route::get('Dashboard','Admin\AdminController@dashboard')->name('AdminDashboard');

    Route::get('Profile','Admin\AdminController@viewprofile')->name('AdminProfile');

    Route::post('Profile/{id}','Admin\AdminController@updateprofile')->name('UpdateAdminProfile');

    Route::post('RemoveProfilePicture/{id}','Admin\AdminController@RemoveProfilePicture')->name('AdminRemoveProfilePicture');

    Route::get('Password','Admin\AdminController@password')->name('AdminPassword');

    Route::post('ChangePassword/{id}','Admin\AdminController@changepass')->name('UpdateAdminPassword');
?>