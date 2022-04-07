<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\GameConfiguration;
use App\GameWinningNumbers;
use App\HelperMethods\Game;
use App\Game as GameModel;

class AdminGameController extends Controller
{
        public function __construct()
        {
            $this->middleware(['auth','admin']);

        }

        /*Save SaveSlotRamsesSettings Game Configurations Starts*/
        public function SaveSlotRamsesSettings(Request $request,$id)
        {
            $request->validate([
              'win_occurrence' => 'required|numeric',
              'slot_cash' => 'required|numeric',
              'min_reel_loop' => 'required|numeric',
              'reel_delay' => 'required|numeric',
              'time_show_win' => 'required|numeric', 
              'time_show_all_wins' => 'required|numeric', 

              'min_bet' => 'required|numeric', 
              'max_bet' => 'required|numeric',
              'max_hold' => 'required|numeric',
               
              'bonus_occurrence' => 'required|numeric', 

              'perc_win_prize_1' => 'required|numeric', 
              'perc_win_prize_2' => 'required|numeric', 
              'perc_win_prize_3' => 'required|numeric', 
            ]);

            if ($request->show_credits == "on") {

                $show_credits = 1;
            }else{

               $show_credits = 0; 
            }

            if ($request->audio_enable_on_startup == "on") {

                $audio_enable_on_startup = 1;
            }else{

               $audio_enable_on_startup = 0; 
            }

            $settings = SlotRamsesGameSetting::find($id);
           if (!is_null($settings)) {

                //dd($settings);

                $settings->update([
                    'win_occurrence' => $request->win_occurrence,
                    'slot_cash' => $request->slot_cash,
                    'min_reel_loop' => $request->min_reel_loop,
                    'reel_delay' => $request->reel_delay,
                    'time_show_win' => $request->time_show_win,
                    'time_show_all_wins' => $request->time_show_all_wins,

                    'min_bet' => $request->min_bet,
                    'max_bet' => $request->max_bet,
                    'max_hold' => $request->max_hold,

                    'bonus_occurrence' => $request->bonus_occurrence,

                    'perc_win_prize_1' => $request->perc_win_prize_1,

                    'perc_win_prize_2' => $request->perc_win_prize_2,

                    'perc_win_prize_3' => $request->perc_win_prize_3,

                    'show_credits' => $show_credits,

                    'audio_enable_on_startup' => $audio_enable_on_startup,
                ]);

               $request->session()->flash('success','Successfully Updated');
               return back();

           }else{

            $request->session()->flash('error','Something Went Wrong.Please refresh the page and try again later.');
            return back();
           }
        }


        /*Config Game Starts*/
        public function ConfigureGame($id)
        {   
            $game = GameModel::find($id);
            return view('game.configuregame',compact('game'));
        }

        /*Save Game Config Starts*/
        public function SaveConfigureGame(Request $request,$id)
        {
            $request->validate([
                'gameName'=> 'required|string',
                'gameDescription' => 'nullable|string', 
            ]);

        $game = GameModel::find($id);

        if (!is_null($game)) {

            $data = [
                'name' => $request->gameName,
                'description' => $request->gameDescription,
            ];

        if ($game->update($data)) {

            $request->session()->flash('success','Updated Successfully');
            return back();
        }
        }else{

            $request->session()->flash('error','Something Went Wrong');
            return back();
        }

        }

        /*Game Configurations Starts*/
        public function Configurations($id)
        {   
            $game = GameModel::find($id);
            return view('game.GameConfigurations',compact('game'));
        }


        /*Save Game Configurations Starts*/
        public function SaveConfigurations(Request $request,$id)
        {
            
            $rules = [
              'min_bet.lt' => "Minimum Bet Should be Less Than the Maximum Bet",
            ];

            $request->validate([
              'win_occurrence' => 'required|numeric',
              'slot_cash' => 'required|numeric',
              'bonus_occurrence' => 'required|numeric',
              'min_bet' => 'required|numeric|lt:'.$request->max_bet,
              'max_bet' => 'required|numeric', 
              'max_hold' => 'required|numeric',
              'perc_win_prize_1' => 'required|numeric',
              'perc_win_prize_2' => 'required|numeric', 
              'perc_win_prize_3' => 'required|numeric',  
            ],$rules);



            if ($request->show_credits == "on") {

                $show_credits = 1;
            }else{
               $show_credits = 0; 
            }

            if ($request->audio_enable_on_startup == "on") {

                $audio = 1;

            }else{

                $audio = 0;
            }

           if (!is_null($settings = GameModel::findOrFail($id))) {

                $settings->update([
                    'win_occurrence' => $request->win_occurrence,
                    'slot_cash' => $request->slot_cash,
                    'bonus_occurrence' => $request->bonus_occurrence,

                    'min_bet' => $request->min_bet,
                    'max_bet' => $request->max_bet,
                    'max_hold' => $request->max_hold,

                    'perc_win_prize_1' => $request->perc_win_prize_1,
                    'perc_win_prize_2' => $request->perc_win_prize_2,
                    'perc_win_prize_3' => $request->perc_win_prize_3,

                    'show_credits' => $show_credits,
                    'audio_enable_on_startup' => $audio,
                ]);

               $request->session()->flash('success','Updated Successfully');
               return back();

           }else{

            $request->session()->flash('error','Something Went Wrong');
            return back();
            
           }
        }

        /*Game Image Starts*/
        public function GameImage($id)
        {
            $game = GameModel::find($id);
            return view('game.uploadimage',compact('game'));
        }

        /*Save Game Image Starts*/
        public function SaveGameImage(Request $request , $id)
        {

        $image = $request->file('profile_avatar');

        if ($image != null) {

        $imagename = $image->getClientOriginalName();

        $image->move('images/game',sha1($imagename));

        $settings = GameModel::find($id);

            $settings = $settings->update([
                'gameAvatar' => sha1($imagename),
            ]);

        if ($settings) {
                $success = $request->session()->flash('success','Image Updated Successfully');
                
                 return back();

            }

            }else{
           
            return back();
        }

        }

        public function RemoveGameImage (Request $request , $id)
        {
            
            $settings = GameModel::find($id);

            $settings = $settings->update([
                'gameAvatar' => null,
            ]);

            if ($settings) {
                $success = $request->session()->flash('success','Image Removed Successfully');
                
                return back();

            }
        }
        /*Scratch Card Image Ends */

}
