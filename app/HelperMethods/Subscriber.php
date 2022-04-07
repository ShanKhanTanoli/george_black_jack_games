<?php
namespace App\HelperMethods;
use App\User;
use App\Subscription;
use App\UserGiftCard;
use App\RequestWithdraw;
use App\DashboardSettings;
use App\Game as GameModel;
use Illuminate\Support\Facades\Auth;
use App\HelperMethods\Traits\PayPal;
use App\HelperMethods\Traits\GiftCard;
use BeyondCode\Vouchers\Models\Voucher;

class Subscriber
{

	use PayPal,GiftCard;
	
	public static function IsAdmin()
	{
		$user = User::where('role_id',1)->first();
		if (!is_null($user)) {
		if ($user->type == "Admin") {
				return $user;
			}else{

			abort(404);

		}}else{
			
			abort(404);
		}
	}

	public static function GiftCardBalance()
 	{
 		$voucher = Auth::user()->vouchers;

 		if ($voucher->count() == 1) {

 				return $voucher->first()->price;

 			}else{

 				return 0;
 			}	
 	}

	public static function GiftCard()
 	{

 		$voucher = Auth::user()->vouchers;

 		if ($voucher->count() == 1) {

 				return $voucher->first();

 			}else{

 				return null;
 			}	
 	}

	public static function CardsQuantity()
 	{
 		return Auth::user()->vouchers->count();	
 	}


	public static function PurchasedCards()
 	{
 		if ($vouchers = Voucher::where('user_id',Auth::user()->id)->get()) {
 			return $vouchers;
 		}else{
 			return null;
 		}
 	}

	public static function CountPurchasedCards()
 	{
 		if ($vouchers = Voucher::where('user_id',Auth::user()->id)->get()) {
 			return $vouchers->count();
 		}else{
 			return 0;
 		}
 	}


	public static function RequestWithdraw($id)
 	{
 		if (!is_null($request = RequestWithdraw::where('user_id',$id)->first())) {

 			return $request->where('requestWithdraw',1)->first();

 		}else{

 		return null;

 		}
 	}

}
