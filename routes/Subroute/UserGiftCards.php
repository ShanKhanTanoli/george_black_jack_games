<?php
/*begin::User GiftCards*/
Route::get('CardConnected','User\GiftCards\GiftCardController@GiftCards')
->name('UserGiftCards');

Route::post('AddGiftCard','User\GiftCards\GiftCardController@AddGiftCard')
->name('UserAddGiftCard');

Route::post('AddGiftCardById/{id}','User\GiftCards\GiftCardController@AddGiftCardById')
->name('UserAddGiftCardById');

Route::post('DetachGiftCard/{id}','User\GiftCards\GiftCardController@DetachGiftCard')
->name('UserDetachGiftCard');

Route::get('CardBalance','User\GiftCards\GiftCardController@CardBalance')
->name('UserCardBalance');

Route::get('MyCards','User\GiftCards\GiftCardController@MyCards')
->name('UserPurchasedCards');

Route::post('UpdateGiftCard/{id}','User\GiftCards\GiftCardController@UpdateGiftCard')
->name('UserUpdateGiftCard');
/*end::User GiftCards*/
?>
