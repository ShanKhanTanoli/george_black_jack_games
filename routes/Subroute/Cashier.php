<?php 
Route::prefix("Cashier")->middleware(['auth','cashier'])->group(function () {
    
	/*User CashierDashboard Start*/
	include('CashierDashboard.php');
	/*User CashierDashboard End*/
});
?>
