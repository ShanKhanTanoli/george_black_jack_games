<?php

Route::post('CreateOrder','PayPalController@createOrder')
->name('CreateOrder');

Route::get('OrderSuccessful','PayPalController@OrderSuccessful')
->name('OrderSuccessful');

Route::get('CancelOrder','PayPalController@CancelOrder')
->name('CancelOrder');

Route::get('MyPayPalAccounts','PayPalController@MyPayPalAccounts')
->name('MyPayPalAccounts');

Route::post('AddPaypalAccount','PayPalController@AddPaypalAccount')
->name('AddPaypalAccount');

Route::post('UpdatePaypalAccount/{id}','PayPalController@UpdatePaypalAccount')
->name('UpdatePaypalAccount');

Route::delete('DeletePaypalAccount/{id}','PayPalController@DeletePaypalAccount')
->name('DeletePaypalAccount');

Route::post('PaypalCashout/{id}','PayPalController@PaypalCashout')
->name('PaypalCashout');

Route::post('PaypalCardRecharge/{id}','PayPalController@PaypalCardRecharge')
->name('PaypalCardRecharge');

Route::get('PaypalRechargeSuccessful','PayPalController@PaypalRechargeSuccessful')
->name('PaypalRechargeSuccessful');

Route::get('PaypalCancelRecharge','PayPalController@PaypalCancelRecharge')
->name('PaypalCancelRecharge');
