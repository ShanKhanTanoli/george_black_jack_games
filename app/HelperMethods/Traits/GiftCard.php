<?php 
namespace App\HelperMethods\Traits;

use App\User;
use App\Subscription;
use App\UserGiftCard;
use App\RequestWithdraw;
use App\DashboardSettings;
use App\Game as GameModel;
use Illuminate\Support\Facades\Auth;
use BeyondCode\Vouchers\Models\Voucher;

trait GiftCard
{

    /****begin::If Card Exists****/
    public static function Exist($code)
    {
        if (!is_null($card = Voucher::where('code',$code)->first())) {
            return $card;
        }else{
            return false;
        }
    }
    /****end::If Card Exists****/

    /****begin::If Card Exists****/
    public static function IsConnected($code)
    {
        if ($card = self::Exist($code)) {
            if (!is_null($connected = UserGiftCard::where('voucher_id',$card->id)->first())) {
                return $connected;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    /****end::If Card Exists****/

    /****begin::All Connected Cards****/
    public static function AllConnected($user)
    {
        if (!($cards = UserGiftCard::where('user_id',$user)->get())->isEmpty()) {
            return $cards;
        }else{
            return false;
        }
    }
    /****end::All Connected Cards****/

    /****begin::Count All Connected Cards****/
    public static function CountAllConnected($user)
    {
        if (!($cards = UserGiftCard::where('user_id',$user)->get())->isEmpty()) {
            return $cards->count();
        }else{
            return false;
        }
    }
    /****end::Count All Connected Cards****/

    /****begin::Add Card****/
    public static function Connect($code,$user)
    {
        if ($card = self::Exist($code)) {
            if (!is_null($card->user_id)) {
                if ($card->status == "available"){
                    if ($user == $card->user_id) {
                        if(self::CountAllConnected($user) == 0){
                            return User::find($user)->redeemCode($card->code);
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    /****end::Add Card****/

    /****begin::Remove Card****/
    public static function Remove($code,$user)
    {
        if ($card = self::Exist($code)) {
            if (!is_null($card->user_id)) {
                if ($card->status == "redeemed"){
                    if ($user == $card->user_id) {
                        if ($card->users()->detach() == 1) {
                            $card->update([
                            'status' => 'available',
                            ]);
                            return true;
                        }else{
                            return false;
                        }
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    /****end::Remove Card****/

    //For Subscriber
    /****end::If Subscriber has any Connected Card****/
    public static function IfAnyCardConnected($user)
    {
        if (!is_null($connected = UserGiftCard::where('user_id',$user)->first())) {
             return $connected;
        }else{
                return false;
        }
    }
    /****end::If Subscriber has any Connected Card****/
}
