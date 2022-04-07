<?php 

/*begin::Play/View Games*/
Route::prefix("Game")->middleware(['auth','verified'])->group(function () {

	/*begin::The fruits Casino*/
	Route::get(Game::TheFruitsCasino()->name,function(){

		return view('TheFruitsCasino.index');

	})->name(Game::TheFruitsCasino()->name);
	/*end::The fruits Casino*/

	/*begin::The Lucky Slot Casino*/
	Route::get(Game::LuckySlot()->name,function(){

		return view('LuckySlotMachine.index');

	})->name(Game::LuckySlot()->name);
	/*end::The Lucky Slot Casino*/

	/*begin::Wheel Of Fortune*/
	Route::get(Game::wheelOfFortune()->name,function(){

		return view('wheelOfFortune.index');

	})->name(Game::wheelOfFortune()->name);
	/*end::Wheel Of Fortune*/

	/*begin::Lucky Christmas Casino*/
	Route::get(Game::luckyChristmas()->name,function(){

		return view('luckyChristmas.index');

	})->name(Game::luckyChristmas()->name);
	/*end::Lucky Christmas Casino*/

	/*begin::3D Soccer Casino*/
	Route::get(Game::SoccerCasino()->name,function(){

		return view('3DSoccerCasino.index');

	})->name(Game::SoccerCasino()->name);
	/*end::3D Soccer Casino*/

	/*begin::Slot Ramses Casino*/
	Route::get(Game::SlotRamses()->name,function(){

		return view('SlotRamses.index');

	})->name(Game::SlotRamses()->name);
	/*end::Slot Ramses Casino*/

	/*begin::The Aladin*/
	// Route::get(Game::Aladin()->name,function(){

	// 	return view('Aladin.index');

	// })->name(Game::Aladin()->name);
	/*end::The Aladin*/

	/*begin::The EgyptianNights*/
	Route::get(Game::EgyptianNights()->name,function(){

		return view('EgyptianNights.index');

	})->name(Game::EgyptianNights()->name);
	/*end::The EgyptianNights*/

	/*begin::The EgyptianAdventures*/
	Route::get(Game::EgyptianAdventures()->name,function(){

		return view('EgyptianAdventures.index');

	})->name(Game::EgyptianAdventures()->name);
	/*end::The EgyptianAdventures*/

	/*begin::The SlotMania*/
	Route::get(Game::SlotMania()->name,function(){

		return view('SlotMania.index');

	})->name(Game::SlotMania()->name);
	/*end::The SlotMania*/

});
/*end::Play/View Games*/
?>
