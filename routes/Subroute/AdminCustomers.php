<?php

/******begin::List,View & Update Customer******/
   Route::get('Customers','Admin\CustomerController@Customers')->name('AdminSubscibers');

   Route::get('ViewCustomer/{id}','Admin\CustomerController@ViewCustomer')->name('AdminViewSubscibers');

    Route::post('UpdateCustomer/{id}','Admin\CustomerController@UpdateCustomer')->name('AdminUpdateSubscibers');
/******end::List,View & Update Customer******/

/******begin::Customer Password******/
   Route::get('CustomerPassword/{id}','Admin\CustomerController@CustomerPassword')->name('AdminViewViewSubsciberPassword');

   Route::post('SaveCustomerPassword/{id}','Admin\CustomerController@SaveCustomerPassword')->name('AdminSaveSubsciberPassword');
/******end::Customer Password******/

/******begin::Upload & Remove Customer Profile Picture******/
   Route::post('RemoveCustomerProfilePicture/{id}','Admin\CustomerController@RemoveCustomerProfilePicture')->name('RemoveCustomerProfilePicture');
/******begin::Upload & Remove Customer Profile Picture******/

/******begin::Customer GiftCards History******/
    Route::get('CustomerGiftCards/{id}','Admin\CustomerController@CustomerGiftCards')->name('AdminCustomerGiftCards');
/******end::Customer GiftCards History******/

/******begin::Block,Restore & Delete Customer******/
    Route::delete('BlockCustomer/{id}','Admin\CustomerController@BlockCustomer')->name('AdminBlockSubscriber');

    Route::post('RestoreCustomer/{id}','Admin\CustomerController@RestoreCustomer')->name('AdminRestoreSubscriber');

    Route::delete('DeletePermanent/{id}','Admin\CustomerController@DeleteSubscriberPermanent')->name('AdminDeletePermanent');
/******end::Block,Restore & Delete Customer******/
?>