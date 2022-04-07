<?php
	/*begin::User Profile*/
    Route::get('Profile','User\UserProfile\ProfileController@viewprofile')->name('UserProfile');

    Route::post('Profile/{id}','User\UserProfile\ProfileController@updateprofile')->name('UpdateUserProfile');

    Route::post('RemoveProfilePicture/{id}','User\UserProfile\ProfileController@RemoveProfilePicture')->name('RemoveUserProfilePicture');

    Route::get('Password','User\UserProfile\ProfileController@password')->name('UserPassword');
    
    Route::post('ChangePassword/{id}','User\UserProfile\ProfileController@changepass')->name('UpdateUserPassword');
    /*end::User Profile*/
?>
