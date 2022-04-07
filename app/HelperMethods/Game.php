<?php

namespace App\HelperMethods;
use App\Game as GameModel;

class Game
{
	/*****begin::All Games*****/
 	public static function All()
 	{
 		return GameModel::all();
 	}

 	public static function GetNumberOf($number)
 	{
 		return GameModel::take($number)->get();
 	}

 	public static function Info($id)
 	{
 		return GameModel::find($id);
 	}
 	/*****end::All Games*****/

 	/*begin::Games*/
 	public static function TheFruitsCasino()
 	{
 		return GameModel::find(1);
 	}

 	public static function LuckySlot()
 	{
 		return GameModel::find(2);
 	}

 	public static function WheelOfFortune()
 	{
 		return GameModel::find(3);
 	}

 	public static function LuckyChristmas()
 	{
 		return GameModel::find(4);
 	}

 	public static function SoccerCasino()
 	{
 		return GameModel::find(5);
 	}

 	public static function SlotRamses()
 	{
 		return GameModel::find(6);
 	}

 	public static function EgyptianNights()
 	{
 		return GameModel::find(7);
 	}

 	public static function EgyptianAdventures()
 	{
 		return GameModel::find(8);
 	}
 	public static function SlotMania()
 	{
 		return GameModel::find(9);
 	}
 	/*end::Games*/
}
