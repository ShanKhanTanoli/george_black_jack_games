<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use App\GameConfiguration;
use App\Subscription;
use App\GameSetting;
use App\UserAccountBalance;
use App\Game as GameModel;
use App\HelperMethods\Subscriber;
use App\HelperMethods\Game;
use Carbon\Carbon;


class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);

    }

        /*All Games Starts*/
        public function games()
        {
            return view('game.gamesGrid');
        }

        /*Play Game Starts*/
        public function playgame()
        {

        	return view('game.playgame');

        }
        /*luckySlotMachine Game Starts*/
        public function luckySlotMachine()
        {
           return view('luckySlotMachine.index');
        }

        /*luckySlotConfig for Ajax-JS Starts*/
        public function luckySlotConfig()
        {
            if (!is_null(Subscriber::HasLuckySlotMachine())){

             $amount = Subscriber::HasLuckySlotMachine()->quantity;

            }else{

                $amount = "0"; 
            }

           return [
            
            'amount' => $amount,
            'subscriber' => Subscriber::ActiveSubscription(Auth::user()->id),
            'game' => Game::luckySlotSettings(),
           ];
        }


        /*Save Game Score Starts*/
        public function SaveScore(Request $request)
        {

        /*begin::If Game Exists*/
          $game = GameModel::find($request->game); 
          if (!is_null($game)) {
            if (Subscriber::GiftCardBalance() > 0) {

                Subscriber::GiftCard()->update([
                    'price' => $request->money,
                ]);

                if (Subscriber::GiftCardBalance() == 0) {

                    Subscriber::GiftCard()->update([
                        'price' => $request->money,
                        'status' => 'expired',
                        'expires_at' => date('Y-m-d'),
                    ]);
                    return "Recharge Please.";
                }

                }
        }/*begin::If Game Exists*/
        else{

            return redirect()->route('games');
        }
    }
}
