<?php

namespace App\Http\Controllers\Cashier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use BeyondCode\Vouchers\Models\Voucher;
use Carbon\Carbon;

class CashierController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','cashier']);

    }

    /*Show Form for Cashout*/
    public function Cashout()
    {
        return view('GiftCards.Cashier.Cashout');
    }

    /*View Card for Cashout*/
    public function CashierCheckCard(Request $request)
    {
        $voucher = Voucher::where('code',$request->code)->first();
        if (!is_null($voucher)) {

            $user = $voucher->users;
            return view('GiftCards.Cashier.CheckCard')->with([
                'user' => $user,
                'voucher' => $voucher,
            ]);

        }else{
            return back()->with('error','Card Does Not Exist.Check Card Number');
        }
    }

    /*Cashed Out*/
    public function CashierCashedOut($code,Request $request)
    {
        $voucher = Voucher::where('code',$code)->first();

        //dd($voucher);

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

    //User Detach/Remove GiftCards
    public function CashierDetachCard($id)
    {
        $voucher = Voucher::find($id);

        if (!is_null($voucher)) {
           if ($voucher->users()->detach() == 1) { 

                $voucher->update([
                    'status' => 'available',
                ]);

                return back()->with('success','GiftCard Detached Successfully');

           }else{

          return back()->with('error','Something Went Wrong! Please refresh the page and try again');  
        }
        }else{

          return back()->with('error','Something Went Wrong! Please refresh the page and try again');  
        }
    }

}
