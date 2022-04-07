<?php
namespace App\Http\Controllers;

use App\User;
use App\Payout;
use App\PaypalCheckout;
use App\UserCardRecharge;
use App\HelperMethods\Site;
use App\HelperMethods\Card;
use PayPalHttp\IOException;
use Illuminate\Http\Request;
use PayPalHttp\HttpException;
use App\HelperMethods\Subscriber;
use Illuminate\Support\Facades\Auth;
use BeyondCode\Vouchers\Models\Voucher;
use PaypalPayoutsSDK\Payouts\PayoutsGetRequest;
use PaypalPayoutsSDK\Payouts\PayoutsPostRequest;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;

class PaypalController extends Controller
{
	public function __construct()
    {
        $this->middleware(['auth','customer']);

    }

    public function index()
    {
    	return view('User.pages.GiftCards.BuyCard');
    }

	public static function createOrder(Request $request)
	{
        $messages = [
            'amount.required' => "Please Enter an Amount",
            'amount.numeric' => "Amount Must be in Numeric Form",
        ];
        $request->validate([
            'amount' => 'required|numeric',
        ],$messages);
        $value = $request->amount;
        if ($paypal = Site::PaypalCredentials()) {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
                            "intent" => "CAPTURE",
                            "purchase_units" => [[
                                "reference_id" => "Purchase a Card",
                                "amount" => [
                                     "value" => "$value",
                                     "currency_code" => "USD"
                                ]
                            ]],
                            "application_context" => [
                                "cancel_url" => route('CancelOrder'),
                                "return_url" => route('OrderSuccessful'),
                            ] 
                         ];
            try {
                $response = Site::PaypalClient()->execute($request);
                return redirect($response->result->links[1]->href);
            }catch (HttpException $ex) {
                return back()
                    ->with('error',"Something Went Wrong!Try again Later");;
            }catch(IOException $ex) {
            return redirect()
                   ->route('UserGiftCards')
                   ->with('error',"Something Went Wrong!Try again Later");
            }
        }else{
            return redirect()
                   ->route('UserGiftCards')
                   ->with('error','Something Went Wrong!Try again Later');
        }
	}

    public function OrderSuccessful(Request $request)
    {
        if ($paypal = Site::PaypalCredentials()) {
        $request = new OrdersCaptureRequest($request->token);
        $request->prefer('return=representation');
        try {
            $response = Site::PaypalClient()->execute($request);
            $order_details = $response->result;
            if($voucher = Auth::user()->createVouchers(1,$order_details->purchase_units[0]->amount->value,"GiftCard", [])){
                $data = [
                    'user_id' => Auth::user()->id,
                    'voucher_id' => $voucher[0]->id,
                    'Order_ID' => $order_details->id,
                    'Order_Status' => $order_details->status,
                    'Payer_Given_Name' => $order_details->payer->name->given_name,
                    'Payer_Sur_Name' => $order_details->payer->name->surname,
                    'Payer_Email' => $order_details->payer->email_address,
                    'Payer_ID' => $order_details->payer->payer_id,
                    'Paid_Amount' => $order_details->purchase_units[0]->amount->value,
                    'Paid_At' => date('Y-m-d'),
                ];
                if (PaypalCheckout::create($data)){
                    if (Subscriber::IfAnyCardConnected(Auth::user()->id)) {
                    return redirect()
                       ->route('UserGiftCards')
                       ->with('success','Paid Successfully');
                    }else{
                        Auth::user()->redeemCode($voucher[0]->code);
                    return redirect()
                       ->route('UserGiftCards')
                       ->with('success','Paid Successfully & Card has been Connected');
                    }
                }else{
                return redirect()
                   ->route('UserGiftCards')
                   ->with('error','Something Went Wrong!Contact Support');
                }
            }else{
                return redirect()
                   ->route('UserGiftCards')
                   ->with('error','Something Went Wrong!Try again Later');
            }
        }catch(HttpException $ex) {
            return redirect()
                   ->route('UserGiftCards')
                   ->with('error',"Something Went Wrong!Try again Later");
        }catch(IOException $ex) {
            return redirect()
                   ->route('UserGiftCards')
                   ->with('error',"Something Went Wrong!Try again Later");
        }
        }else{
            return false;
        }
    }

    public function CancelOrder(Request $request)
    {
        return redirect()
               ->route('UserGiftCards')
               ->with('error','The Order was Cancelled!');
    }

    public function MyPayPalAccounts()
    {
        return view('User.pages.Paypal.MyAllAccounts');
    }

    public function DeletePaypalAccount($id)
    {
        if (Subscriber::DeletePaypalAccount($id)) {
            return back()->with('success','Account Deleted Successfully');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function AddPaypalAccount(Request $request)
    {
        if (Subscriber::AddPaypalAccount($request)) {
            return back()->with('success','Account Created Successfully');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function UpdatePaypalAccount(Request $request,$id)
    {
        if (Subscriber::UpdatePaypalAccount($request,$id)) {
            return back()->with('success','Account Created Successfully');
        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

    public function PaypalCashout(Request $request,$id)
    {   
        $rules = [
            'amount.required' => "Please Enter an Amount to Cashout",
            'amount.numeric' => "Please Enter Amount in Numeric form",
            'paypal_id.required' => "Please Select PayPal Account to Cashout",
        ];
        $request->validate([
            'amount' => 'required|numeric',
            'paypal_id' => 'required|string',
        ],$rules);

        $paypal_id = $request->paypal_id;
        $amount = $request->amount;

        if (!is_null($card = Voucher::find($id))) {
            if ($card->user_id == Auth::user()->id) {
                if ($request->amount <= $card->price) {
                    if (!(Card::IsConnected($card->code))) {
                        try {
                        $request = new PayoutsPostRequest();
                        $request->body= json_decode(
                                    '{
                                        "sender_batch_header":
                                        {
                                          "email_subject": "Cashout"
                                        },
                                        "items": [
                                        {
                                          "recipient_type": "EMAIL",
                                          "receiver": "'.$paypal_id.'",
                                          "note": "You have Successfully Cashout '.$amount.' USD from '.$card->code.'",
                                          "sender_item_id": "'.$card->code.'",
                                          "amount":
                                          {
                                            "currency": "USD",
                                            "value": "'.$amount.'"
                                          }
                                        }]
                                      }',             
                                    true);
                        $response = Site::PaypalClient()->execute($request);
                        $batchId = $response->result->batch_header->payout_batch_id;
                        $request = new PayoutsGetRequest($batchId);
                        $response = Site::PaypalClient()->execute($request);

                        $payout_data = [
                            'user_id' => Auth::user()->id,
                            'voucher_id' => $card->id,
                            'payout_item_id' => $payout_item_id = $response
                                                ->result->items[0]
                                                ->payout_item_id,

                            'transaction_id' => $transaction_id = $response
                                                ->result
                                                ->items[0]
                                                ->transaction_id,

                            'activity_id'   =>  $activity_id = $response
                                                ->result
                                                ->items[0]
                                                ->activity_id,

                            'transaction_status' => $transaction_status = $response
                                                    ->result
                                                    ->items[0]
                                                    ->transaction_status,

                            'payout_batch_id'   =>  $payout_batch_id = $response
                                                    ->result
                                                    ->items[0]
                                                    ->payout_batch_id,

                            'receiver_id'   =>      $receiver_id =  $response
                                                    ->result
                                                    ->items[0]
                                                    ->payout_item
                                                    ->receiver,

                            'amount_value'  =>  $amount_value = $response
                                                ->result
                                                ->items[0]
                                                ->payout_item
                                                ->amount
                                                ->value,
                        ];
                        if ($transaction_status == "SUCCESS" OR $transaction_status == "PENDING") {
                            $data = [
                                'price' => 0,
                                'status' => 'CashOut',
                                'cashout_at' => date('Y-m-d'),
                            ];
                            if ($card->update($data)) {
                                if (Payout::create($payout_data)) {
                                    return back()->with('success',"Cashout Successfully.Check your Account.it can take a while to transfer.Be Patient");
                                }else{
                                  return back()->with('error',"Something Went Wrong!Contact Support");  
                                }
                            }else{
                              return back()->with('error',"Something Went Wrong!Contact Support");  
                            }
                        }else{
                           return back()->with('error',"Something Went Wrong!Try again later");  
                        }
                        }catch (HttpException $ex) {
                          return back()->with('error',$ex->getMessage());  
                        }catch(IOException $ex) {
                            return back()->with('error',"Check your Internet Or Refresh the Page and Try again Later");
                        }
                    }else{
                      return back()->with('error','Detach the Card first and Cashout');  
                    }
                }else{
                    return back()->with('error','You can not Cashout more than Card Amount');
                }
            }else{
                return back()->with('error','Something Went Wrong.You can not Cashout!');
            }
        }else{
            return back()->with('error','Something Went Wrong.You can not Cashout!');
        }
    }

    public function PaypalCardRecharge(Request $request,$id)
    {
        $rules = [
            'amount.required' => "Please Enter Amount to Recharge",
            'amount.numeric' => "Please Enter Amount in Numeric form",
        ];
        $request->validate([
            'amount' => 'required|numeric',
        ],$rules);
        $value = $request->amount;
        if (!is_null($card = Voucher::find($id))) {
            if ($card->user_id == Auth::user()->id) {
                if ($paypal = Site::PaypalCredentials()) {
                $request = new OrdersCreateRequest();
                $request->prefer('return=representation');
                $request->body = [
                                    "intent" => "CAPTURE",
                                    "purchase_units" => [[
                                        "reference_id" => "$card->code",
                                        "amount" => [
                                             "value" => "$value",
                                             "currency_code" => "USD"
                                        ]
                                    ]],
                                    "application_context" => [
                                        "cancel_url" => route('PaypalCancelRecharge'),
                                        "return_url" => route('PaypalRechargeSuccessful'),
                                    ] 
                                 ];
                    try {
                        $response = Site::PaypalClient()->execute($request);
                        return redirect($response->result->links[1]->href);
                    }catch (HttpException $ex) {
                        return back()
                            ->with('error',"Something Went Wrong!Try again Later");
                    }catch(IOException $ex) {
                    return back()
                           ->with('error',"Something Went Wrong!Try again Later");
                    }
                }else{
                    return back()
                           ->with('error','Something Went Wrong!Try again Later');
                }
            }else{
                return back()->with('error','Something Went Wrong.You can not Recharge!');
            }
        }else{
            return back()->with('error','Something Went Wrong.You can not Recharge!');
        }
    }

    public function PaypalRechargeSuccessful(Request $request)
    {
        if ($paypal = Site::PaypalCredentials()) {
        $request = new OrdersCaptureRequest($request->token);
        $request->prefer('return=representation');
        try {
            $response = Site::PaypalClient()->execute($request);
            $order_details = $response->result;
            $paid_amount = $order_details->purchase_units[0]->amount->value;
            $code = $order_details->purchase_units[0]->reference_id;
            if ($voucher = Card::Exist($code)) {
            $data = [
                'user_id' => Auth::user()->id,
                'voucher_id' => $voucher->id,
                'Order_ID' => $order_details->id,
                'Order_Status' => $order_details->status,
                'Payer_Given_Name' => $order_details->payer->name->given_name,
                'Payer_Sur_Name' => $order_details->payer->name->surname,
                'Payer_Email' => $order_details->payer->email_address,
                'Payer_ID' => $order_details->payer->payer_id,
                'Paid_Amount' => $paid_amount,
                'Paid_At' => date('Y-m-d'),
            ];
            if (UserCardRecharge::create($data)) {
                $data = [
                    'price' => $voucher->price+$paid_amount,
                    'status' => "recharged",
                    'recharge_count' => $voucher->recharge_count+1,
                ];
                if ($voucher->update($data)) {
                    return back()
                       ->with('success','Card has been Recharged Successfully');
                }else{
                   return back()
                       ->with('error','Something Went Wrong!Try again Later'); 
                }
            }else{
                return back()
                       ->with('error','Something Went Wrong!Try again Later');
            }
            }else{
                return back()
                       ->with('error','Something Went Wrong!Try again Later');
            }
            }catch(HttpException $ex) {
                    return back()
                           ->with('error','Something Went Wrong!Try again Later');
            }catch(IOException $ex) {
                    return back()
                           ->with('error','Something Went Wrong!Try again Later');
            }
        }else{
            return false;
        }
    }

    public function PaypalCancelRecharge(Request $request)
    {
            return back()
                   ->with('error','Recharge was Cancelled');
    }

}
