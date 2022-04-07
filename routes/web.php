<?php
use Illuminate\Support\Facades\Route;
use App\HelperMethods\Game;
use App\HelperMethods\Site;
use App\HelperMethods\Card;
use App\HelperMethods\Subscriber;
use App\User;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use BeyondCode\Vouchers\Models\Voucher;


Route::get('debug',function (){ 
  dd(Site::TotalCheckouts());
});


/*Auth Routes Start*/
Auth::routes();
/*Auth Routes Ends*/

/*begin::Custom Logout*/
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
/*end::Custom Logout*/


/*begin::QR Login*/
Route::get('ScanQR', 'Auth\LoginController@showQrScanner')->name('showQrScanner');
Route::post('Qrlogin', 'Auth\LoginController@Qrlogin')->name('Qrlogin');
/*end::QR Login*/

/*begin::View All Games*/
Route::get('Games','GameController@games')->name('games');
/*end::View All Games*/

/*begin::Redirect To LandingPage*/
include ('Subroute/LandingPage.php');
/*end::Redirect To LandingPage*/

/*Play/View Games Start*/
include ('Subroute/PlayGames.php');
/*Play/View Games End*/

/*Admin Routes Start*/
include ('Subroute/Admin.php');
/*Admin Routes End*/

/*User Routes Start*/
include('Subroute/User.php');
/*User Routes End*/

/*Cashier Routes Start*/
include('Subroute/Cashier.php');
/*Cashier Routes End*/
