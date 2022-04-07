<?php 
namespace App\HelperMethods\Traits;
use App\Payout;
use App\PaypalAccount;
use App\PaypalCheckout;
use App\UserCardRecharge;
use App\PaypalCredential;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;

trait PayPal

{
    public static function PaypalCredentials()
    {        
        if (!is_null($paypal = PaypalCredential::first())) {
            if ($paypal->PAYPAL_MODE === "sandbox") {
                return $paypal;
            }else{
                return $paypal;
            }
        }else{
            return false;
        }
    }

    public static function PaypalClientID()
    {        
        if ($paypal = self::PaypalCredentials()) {
            if ($paypal->PAYPAL_MODE === "sandbox") {
                return $paypal->PAYPAL_SANDBOX_CLIENT_ID;
            }else{
                return $paypal->PAYPAL_LIVE_CLIENT_ID;
            }
        }else{
            return false;
        }
    }

    public static function PaypalSecretID()
    {        
        if ($paypal = self::PaypalCredentials()) {
            if ($paypal->PAYPAL_MODE === "sandbox") {
                return $paypal->PAYPAL_SANDBOX_SECRET;
            }else{
                return $paypal->PAYPAL_LIVE_SECRET;
            }
        }else{
            return false;
        }
    }

    public static function PaypalClient()
    {        
        if ($paypal = self::PaypalCredentials()) {
        $clientId = self::PaypalClientID();
        $clientSecret = self::PaypalSecretID();
        $environment = new SandboxEnvironment($clientId, $clientSecret);
        return new PayPalHttpClient($environment);
        }else{
            return false;
        }
    }

    public static function PaypalAccounts($user)
    {        
        if ($paypal = self::PaypalCredentials()) {
            if (!($accounts = PaypalAccount::where('user_id',$user)->get())->isEmpty()) {
                return $accounts;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public static function CountPaypalAccounts($user)
    {        
        if ($paypal = self::PaypalCredentials()) {
            if (!($accounts = PaypalAccount::where('user_id',$user)->get())->isEmpty()) {
                return $accounts->count();
            }else{
                return 0;
            }
        }else{
            return 0;
        }
    }


    public static function AddPaypalAccount($request)
    {      
        $request->validate([
            'paypal_id' => 'required|string',
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'paypal_id' => $request->paypal_id,
        ];

        if (PaypalAccount::create($data)) {
            return true;
        }else{
            return false;
        }

    }
    public static function UpdatePaypalAccount($request,$id)
    {      
        $request->validate([
            'paypal_id' => 'required|string',
        ]);

        $data = [
            'paypal_id' => $request->paypal_id,
        ];

        if (!is_null($account = PaypalAccount::find($id))){
            if ($account->user_id == Auth::user()->id){
                if ($account->update($data)) {
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
    }

    public static function DeletePaypalAccount($account)
    {        
        if (!is_null($account = PaypalAccount::find($account))){
            if ($account->user_id == Auth::user()->id){
                if ($account->delete()) {
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
    }

    public static function TotalPayouts()
    {
        return Payout::all()->sum('amount_value');
    }

    public static function TotalCheckouts()
    {
        $checkouts = PaypalCheckout::all()->sum('Paid_Amount');
        $recharge = UserCardRecharge::all()->sum('Paid_Amount');
        return $checkouts+$recharge;
    }
}
