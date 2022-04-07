<?php


Route::get('CashierDashboard','Cashier\CashierController@Cashout')
->name('CashierDashboard');

Route::get('CashierCheckCard','Cashier\CashierController@CashierCheckCard')
->name('CashierCheckCard');

Route::post('CashierCashedOut/{code}','Cashier\CashierController@CashierCashedOut')
->name('CashierCashedOut');

Route::post('CashierDetachCard/{id}','Cashier\CashierController@CashierDetachCard')
->name('CashierDetachCard');

?>
