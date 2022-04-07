<?php

Route::prefix('Admin')->middleware(['auth','admin'])->group(function () {

    /*begin::Admin Profile*/
    include ('AdminProfile.php');
    /*end::Admin Profile*/

    /*begin::Admin GiftCards*/
    include ('AdminGiftCards.php');
    /*end::Admin GiftCards*/

    /*begin::Admin Customers*/
    include ('AdminCustomers.php');
    /*end::Admin Customers*/

    /*begin::Admin Site Settings*/
    include ('AdminSiteSettings.php');
    /*end::Admin Site Settings*/

    /*Game Routes Starts*/
    include('ConfigureGames.php');
    /*Game Routes Ends*/

});

?>
