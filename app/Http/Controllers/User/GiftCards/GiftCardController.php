<?php

namespace App\Http\Controllers\User\GiftCards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use BeyondCode\Vouchers\Models\Voucher;
use BeyondCode\Vouchers\Exceptions\VoucherAlreadyRedeemed;
use BeyondCode\Vouchers\Exceptions\VoucherIsInvalid;
use BeyondCode\Vouchers\Exceptions\VoucherExpired;
use App\UserGiftCard;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\HelperMethods\Subscriber;
use App\HelperMethods\Card;

class GiftCardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','customer']);

    }

    //Show All User GiftCards
    public function GiftCards()
    {
        $vouchers = Auth::user()->vouchers;
        return view('User.pages.GiftCards.UserGiftCards',compact('vouchers'));
    }

    //User Add GiftCards
    public function AddGiftCard(Request $request)
    {
        $validate = $request->validate([
            'code' => 'required|string',
            ]);
        if (Card::Connect($request->code,Auth::user()->id)) {
            return back()->with('success','Card Added Successfully');
        }else{
            return back()->with('error','Something Went Wrong! Please refresh the page and try again'); 
        }
    }

    //User Add GiftCard By ID
    public function AddGiftCardById($id)
    {
        $voucher = Voucher::findOrFail($id);
        if (Card::Connect($voucher->code,Auth::user()->id)) {
            return back()->with('success','Card Added Successfully');
        }else{
            return back()->with('error','Something Went Wrong! Please refresh the page and try again'); 
        }
    }

    //User Detach/Remove GiftCards
    public function DetachGiftCard($id)
    {
        $voucher = Voucher::findOrFail($id);
        if (Card::Remove($voucher->code,Auth::user()->id)) {
            return back()->with('success','Card Detached Successfully');
        }else{
            return back()->with('error','Something Went Wrong! Please refresh the page and try again'); 
        }

    }

    public function MyCards()
    {
        $vouchers = Subscriber::PurchasedCards();
        return view('User.pages.GiftCards.UserPurchasedGiftCards',compact('vouchers'));
    }

    public function UpdateGiftCard(Request $request,$id)
    {
        $voucher = Voucher::findOrFail($id);
        if (Card::Exist($voucher->code)) {
            $request->validate([
                'card_name' => 'required|string',
            ]);
            if ($voucher->user_id === Auth::user()->id) {
                if ($voucher->update(['name' => $request->card_name])) {
                    return back()
                            ->with('success','Card Updated Successfully');
                }else{
                    return back()
                            ->with('error','Something Went Wrong! Please refresh the page and try again'); 
                }
            }else{
                return back()
                        ->with('error','Something Went Wrong! Please refresh the page and try again'); 
            }
        }else{
            return back()
                    ->with('error','Something Went Wrong! Please refresh the page and try again'); 
        }
    }
}
