<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BeyondCode\Vouchers\Models\Voucher;
use Carbon\Carbon;
use App\Game as GamModel;
use App\User;
use App\HelperMethods\Subscriber;

class VoucherController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','admin']);

    }

    /*View Vouchers*/
    public function index()
    {
    	$vouchers = Voucher::all();
    	return view('GiftCards.Admin.GiftCards',compact('vouchers'));
    }

    /*Show Create Form for Vouchers*/
    public function CreateVoucher()
    {
    	return view('GiftCards.Admin.partials.CreateGiftCards');
    }
    /*Create and Store a Vouchers*/
    public function StoreVouchers(Request $request)
    {

    	$rules = [
    		'cardName.required' => 'Card Name is required',
    		'cardAmount.required' => 'Card Amount is required',
    		'cardAmount.numeric' => 'Amount should be in numeric form',
    		'cardExpiry.after_or_equal' => 'Card Expiration date Can not be before than Card Creation Date',

    		'cardCreatedAt.after_or_equal' => 'Card Creation Date Should be the Current Date Or a Later Date',

    		'cardStatus.in' => 'Card should be either Recharged,Expired,Redeemed Or Available',
    	];

    	$validate = $request->validate([
    		'cardName' => 'required|string',
    		'cardAmount' => 'required|numeric',
    		'cardQuantity' => 'required|numeric',
    		'cardExpiry' => 'nullable|date|after_or_equal:cardCreatedAt',
    		'cardCreatedAt' => 'required|date|after_or_equal:'.date('Y-m-d'),
    		'cardStatus' => 'required|string|in:recharged,available,expired,redeemed',
    	],$rules);

    		if (!is_null($request->cardExpiry)) {
    			
    			$cardExpiry = $request->cardExpiry;

    		}else{

    			$cardExpiry = null;
    		}

    		if ($request->cardStatus == "expired") {
    			
    			$cardExpiry = date('Y-m-d');

    		}

    		if ($request->cardStatus == "available") {
    		
	    		if (!is_null($request->cardExpiry)) {
	    			
	    			$cardExpiry = $request->cardExpiry;

	    		}else{

	    			$cardExpiry = null;
	    		}

    		}

    		if ($request->cardStatus == "recharged") {
    			
    			$recharge_count = 1;

	    		if (!is_null($request->cardExpiry)) {
	    			
	    			$cardExpiry = $request->cardExpiry;

	    		}else{

	    			$cardExpiry = null;
	    		}

    		}
        $admin = Subscriber::IsAdmin();
		$vouchers = $admin->createVouchers($request->cardQuantity,$request->cardAmount,$request->cardName, []); 

		foreach ($vouchers as $voucher) {

		$ids = $voucher->id;

        $user = User::create([
             'firstname' => "Game",
             'lastname' => "Player",
             'email' => "Player".mt_rand(1, 1000)."@email.com",
             'password' => bcrypt('password'),   
            ]);

        $data = [
            'user_id' => $user->id,
            'status' => $request->cardStatus,
            'expires_at' => $cardExpiry,
            'created_at' => $request->cardCreatedAt,
        ];
		$updateVouchers = Voucher::where('id',$voucher->id,)->update($data);
		}
    	if ($updateVouchers == 1) {
    		return back()->with('success','Cards Created Successfully');
    	}else{
    		return back()->with('error','Something Went Wrong! Please Refresh the Page and Try Again');
    	}
    }

    /*Show Edit Form for a Voucher*/
    public function EditVoucher($id)
    {	
    	$voucher = Voucher::find($id);

    	if (!is_null($voucher)) {

    		return view('GiftCards.Admin.partials.EditGiftCard',compact('voucher'));
    	}else{

    		return back()->with('error','Something Went Wrong! Please Refresh the Page and Try Again');
    	}
    	
    }

    /*Update a Voucher*/
    public function UpdateVoucher(Request $request , $id)
    {

    	$voucher = Voucher::find($id);
        //dd($request->all());
    	if (!is_null($voucher)) {

    	$rules = [
    		'cardName.required' => 'Card Name is required',
    		'cardAmount.required' => 'Card Amount is required',
    		'cardAmount.numeric' => 'Amount should be in numeric form',
    		'cardExpiry.after_or_equal' => 'Card Expiration date Can not be before than Card Creation Date',

    		'cardCreatedAt.after_or_equal' => 'Card Creation Date Should be the Current Date Or a Later Date',

    		'cardStatus.in' => 'Card should be either Recharged,Expired,Redeemed Or Available',
    	];

    	$validate = $request->validate([
    		'cardName' => 'required|string',
    		'cardAmount' => 'required|numeric',
    		'rechargeCount' => 'required|numeric',
    		'cardExpiry' => 'nullable|date|after_or_equal:cardCreatedAt',
    		'cardCreatedAt' => 'required|date|after_or_equal:'.date('Y-m-d',strtotime(Voucher::find($id)->created_at)),
    		'cardStatus' => 'required|string|in:recharged,available,expired,redeemed,CashOut',
    	],$rules);

        $cardAmount =$request->cardAmount;

    		if (!is_null($request->cardExpiry)) {
    			
    			$cardExpiry = $request->cardExpiry;

    		}else{

    			$cardExpiry = null;
    		}

    		if ($request->cardStatus == "expired") {
    			
    			$cardExpiry = date('Y-m-d');
                $cashout_at = null;

    		}

    		if ($request->cardStatus == "available") {
    			
    			$cardExpiry = null;
                $cashout_at = null;

	    		if (!is_null($request->cardExpiry)) {
	    			
	    			$cardExpiry = $request->cardExpiry;

	    		}else{

	    			$cardExpiry = null;
	    		}

    		}

            if ($request->cardStatus == "CashOut") {
                
                $cardExpiry = null;
                $cardAmount = 0;

                if (!is_null($request->cashout_at)) {
                    
                    $cashout_at = $request->cashout_at;

                }else{

                    $cashout_at = null;
                }
            }

    		if ($request->cardStatus == "recharged") {
    			
    			$recharge_count = $voucher->recharge_count+1;
                $cashout_at = null;
                
	    		if (!is_null($request->cardExpiry)) {
	    			
	    			$cardExpiry = $request->cardExpiry;

	    		}else{

	    			$cardExpiry = null;
	    		}

    		}else{

    			$recharge_count = $request->rechargeCount;
    		}

    	$data = [
    		'name' => $request->cardName,
    		'price' => $cardAmount,
    		'status' => $request->cardStatus,
    		'recharge_count' => $recharge_count,
    		'expires_at' => $cardExpiry,
            'cashout_at' => $cashout_at,
    		'created_at' => $request->cardCreatedAt,
    	];

    	if ($voucher->update($data)) {

    		return back()->with('success','Card Updated Successfully');

    	}else{

    		return back()->with('error','Something Went Wrong! Please Refresh the Page and Try Again');
    	}


    	}else{

    		return back()->with('error','Something Went Wrong! Please Refresh the Page and Try Again');
    	}
    }

    /*Show Create Form for RechargeVoucher*/
    public function RechargeVoucher($id)
    {
    	$voucher = Voucher::find($id);
    	if (!is_null($voucher)) {

    		return view('GiftCards.Admin.partials.RechargeGiftCard',compact('voucher'));

    	}else{

    		return back()->with('error','Something Went Wrong! Please Refresh the Page and Try Again');
    	}
    	
    }

    /*Show Create Form for RechargeVoucher*/
    public function VoucherRecharged(Request $request, $id)
    {
    	$voucher = Voucher::find($id);
    	if (!is_null($voucher)) {

    	if ($voucher->code == $request->code) {

    		$rules = [
    			'code.unique' => 'Card Number '.$request->code.' you Entered belongs to a differnt card that is already in Use.',
    		];
    		$validate = $request->validate([
    			'code' => 'required|string|unique:vouchers,code,'.$voucher->id,
    			'cardAmount' => 'required|numeric',
    		],$rules);


    	$data = [
    		'price' => $request->cardAmount,
    		'status' => 'recharged',
    		'recharge_count' => $voucher->recharge_count+1,
    	];

    	if ($voucher->update($data)) {

    		return back()->with('success','Successfully Recharged with an Amount of '.$request->cardAmount.' USD');

    	}else{

    		return back()->with('error','Something Went Wrong! Please Refresh the Page and Try Again');
    	}

    	}else{

    		return back()->with('error','Card Number you Entered is Incorrect OR belongs to a differnt card that is already in Use.');
    	}
	

    	}else{

    		return back()->with('error','Something Went Wrong! Please Refresh the Page and Try Again');
    	}
    	
    }

    /*Delete a Voucher*/
    public function DeleteVoucher($id)
    {
    	$voucher = Voucher::find($id);
    	if (!is_null($voucher)) {

            if ($voucher->delete()) {

                return back()->with('success','Successfully Deleted');

            }else{

            return back()->with('error','Something Went Wrong! Please Refresh the Page and Try Again');
        }

    	}else{

    		return back()->with('error','Something Went Wrong! Please Refresh the Page and Try Again');
    	}
    	
    }

    /*Show Form for Cashout*/
    public function Cashout()
    {
        return view('GiftCards.Admin.Cashout');
    }

    /*View Card for Cashout*/
    public function CheckCard(Request $request)
    {
        $voucher = Voucher::where('code',$request->code)->first();
        if (!is_null($voucher)) {

            $user = $voucher->users;
            return view('GiftCards.Admin.CheckCard')->with([
                'user' => $user,
                'voucher' => $voucher,
            ]);

        }else{
            return back()->with('error','Card Does Not Exist.Check Card Number');
        }
    }

    /*Cashed Out*/
    public function CashedOut($code,Request $request)
    {
        $voucher = Voucher::where('code',$code)->first();
        if (!is_null($voucher)) {
            
            $data = [
                'price' => 0,
                'status' => 'CashOut',
                'cashout_at' => date('Y-m-d'),
            ];
            if ($voucher->update($data)) {
                return back()->with('success','Cash Out Successfully!');
            }else{
              return back()->with('error','Something Went Wrong!');  
            }

        }else{
            return back()->with('error','Something Went Wrong!');
        }
    }

}
