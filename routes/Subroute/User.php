<?php 
Route::prefix("User")->middleware(['auth','customer'])->group(function () {

    Route::post('SaveScore','GameController@SaveScore')->name('UserGameSaveScore');
    
	/*User GiftCards Start*/
	include('UserGiftCards.php');
	/*User GiftCards End*/

	/*User Profile Start*/
	include('UserProfile.php');
	/*User Profile End*/

	/*User Paypal Start*/
	include('UserPaypal.php');
	/*User Paypal End*/
});
?>
