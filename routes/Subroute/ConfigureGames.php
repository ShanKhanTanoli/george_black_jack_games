<?php

	/*Configure Game Starts*/
	Route::get('ConfigureGame/{id}','Admin\AdminGameController@ConfigureGame')->name('ConfigureGame');

	Route::post('SaveConfigureGame/{id}','Admin\AdminGameController@SaveConfigureGame')->name('SaveConfigureGame');

	Route::get('Configurations/{id}','Admin\AdminGameController@Configurations')->name('Configurations');

	Route::post('SaveConfigurations/{id}','Admin\AdminGameController@SaveConfigurations')->name('SaveConfigurations');

	Route::get('GameImage/{id}','Admin\AdminGameController@GameImage')->name('GameImage');
	Route::post('SaveGameImage/{id}','Admin\AdminGameController@SaveGameImage')->name('SaveGameImage');

	Route::post('RemoveGameImage/{id}','Admin\AdminGameController@RemoveGameImage')->name('RemoveGameImage');
    /*Configure Game Ends*/

?>
