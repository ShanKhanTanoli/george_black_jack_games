<?php
/*begin::Gift Cards*/
Route::get('ViewCards','VoucherController@index')->name('ViewCards');

Route::get('Create','VoucherController@CreateVoucher')->name('CreateCards');

Route::post('Store','VoucherController@StoreVouchers')->name('StoreCards');

Route::get('Edit/{id}','VoucherController@EditVoucher')->name('EditCard');

Route::post('Update/{id}','VoucherController@UpdateVoucher')->name('UpdateCard');

Route::get('Recharge/{id}','VoucherController@RechargeVoucher')->name('RechargeCard');

Route::post('Recharged/{id}','VoucherController@VoucherRecharged')->name('CardRecharged');

Route::delete('DeleteVoucher/{id}','VoucherController@DeleteVoucher')->name('DeleteVoucher');

Route::get('Cashout','VoucherController@Cashout')->name('Cashout');

Route::get('CheckCard','VoucherController@CheckCard')->name('CheckCard');

Route::post('CashedOut/{code}','VoucherController@CashedOut')->name('CashedOut');
/*end::Gift Cards*/
?>
