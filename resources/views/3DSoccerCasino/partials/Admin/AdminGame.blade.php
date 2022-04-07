<div style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%"></div>
<script>
$(document).ready(function() {
    var oMain = new CMain({
        win_occurrence: 30, //WIN PERCENTAGE.SET A VALUE FROM 0 TO 100.
        slot_cash: 100, //THIS IS THE CURRENT SLOT CASH AMOUNT. THE GAME CHECKS IF THERE IS AVAILABLE CASH FOR WINNINGS.
        min_reel_loop: 0, //NUMBER OF REEL LOOPS BEFORE SLOT STOPS  
        reel_delay: 6, //NUMBER OF FRAMES TO DELAY THE REELS THAT START AFTER THE FIRST ONE
        time_show_win: 2000, //DURATION IN MILLISECONDS OF THE WINNING COMBO SHOWING
        time_show_all_wins: 2000, //DURATION IN MILLISECONDS OF ALL WINNING COMBO
        money: 200, //STARING CREDIT FOR THE USER
        freespin_occurrence: 10, //IF USER MUST WIN, SET THIS VALUE FOR FREESPIN OCCURRENCE
        bonus_occurrence: 10, //IF USER MUST WIN, SET THIS VALUE FOR BONUS OCCURRENCE
        freespin_symbol_num_occur: [50, 30, 20], //WHEN PLAYER GET FREESPIN, THIS ARRAY GET THE OCCURRENCE OF RECEIVING 3,4 OR 5 FREESPIN SYMBOLS IN THE WHEEL
        num_freespin: [4, 6, 8], //THIS IS THE NUMBER OF FREESPINS IF IN THE FINAL WHEEL THERE ARE 3,4 OR 5 FREESPIN SYMBOLS
        bonus_prize: [10, 30, 60, 90, 100], //THIS IS THE LIST OF BONUS MULTIPLIERS.
        bonus_prize_occur: [40, 25, 20, 10, 5], //OCCURRENCE FOR EACH PRIZE IN BONUS_PRIZES. HIGHER IS THE NUMBER, MORE POSSIBILITY OF OUTPUT HAS THE PRIZE
        coin_bet: [0.05, 0.1, 0.15, 0.20, 0.25, 0.3, 0.35, 0.4, 0.45, 0.5], //COIN BET VALUES
        /***********PAYTABLE********************/
        //EACH SYMBOL PAYTABLE HAS 5 VALUES THAT INDICATES THE MULTIPLIER FOR X1,X2,X3,X4 OR X5 COMBOS
        paytable_symbol_1: [0, 0, 80, 110, 160], //PAYTABLE FOR SYMBOL 1
        paytable_symbol_2: [0, 0, 70, 100, 150], //PAYTABLE FOR SYMBOL 2
        paytable_symbol_3: [0, 0, 50, 80, 110], //PAYTABLE FOR SYMBOL 3
        paytable_symbol_4: [0, 0, 40, 60, 80], //PAYTABLE FOR SYMBOL 4
        paytable_symbol_5: [0, 0, 30, 50, 70], //PAYTABLE FOR SYMBOL 5
        paytable_symbol_6: [0, 0, 20, 30, 50], //PAYTABLE FOR SYMBOL 6
        paytable_symbol_7: [0, 0, 10, 20, 30], //PAYTABLE FOR SYMBOL 7
        paytable_symbol_8: [0, 0, 5, 15, 50], //PAYTABLE FOR SYMBOL 8
        paytable_symbol_9: [0, 0, 5, 15, 50], //PAYTABLE FOR SYMBOL 9
        paytable_symbol_10: [0, 0, 5, 15, 50], //PAYTABLE FOR SYMBOL 10
        /*************************************/
        fullscreen: true, //SET THIS TO FALSE IF YOU DON'T WANT TO SHOW FULLSCREEN BUTTON
        check_orientation: true, //SET TO FALSE IF YOU DON'T WANT TO SHOW ORIENTATION ALERT ON MOBILE DEVICES
        show_credits: true, //ENABLE/DISABLE CREDITS BUTTON IN THE MAIN SCREEN
        num_spin_ads_showing: 10 //NUMBER OF SPIN TO COMPLETE, BEFORE TRIGGERING AD SHOWING.
        //// THIS FUNCTIONALITY IS ACTIVATED ONLY WITH CTL ARCADE PLUGIN.///////////////////////////
        /////////////////// YOU CAN GET IT AT: /////////////////////////////////////////////////////////
        // http://codecanyon.net/item/ctl-arcade-wordpress-plugin/13856421 ///////////
    });

    $(oMain).on("start_session", function(evt) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeStartSession();
        }
        //...ADD YOUR CODE HERE EVENTUALLY
    });

    $(oMain).on("end_session", function(evt) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeEndSession();
        }
        //...ADD YOUR CODE HERE EVENTUALLY
    });

    $(oMain).on("bet_placed", function(evt, oBetInfo) {
        var iBet = oBetInfo.bet;
        var iTotBet = oBetInfo.tot_bet;
        var iAmountWin = oBetInfo.amount_win;
        var iNumPaylines = oBetInfo.payline;

        //...ADD YOUR CODE HERE EVENTUALLY
    });

    $(oMain).on("bonus_start", function(evt) {
        //...ADD YOUR CODE HERE EVENTUALLY
    });

    $(oMain).on("bonus_end", function(evt, iMoney) {
        //...ADD YOUR CODE HERE EVENTUALLY
    });

    $(oMain).on("save_score", function(evt, iMoney) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeSaveScore({ score: iMoney });
        }
        //...ADD YOUR CODE HERE EVENTUALLY
    });

    $(oMain).on("show_interlevel_ad", function(evt) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeShowInterlevelAD();
        }
        //...ADD YOUR CODE HERE EVENTUALLY
    });

    $(oMain).on("share_event", function(evt, oData) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeShareEvent(oData);
        }
        //...ADD YOUR CODE HERE EVENTUALLY
    });

    if (isIOS()) {
        setTimeout(function() { sizeHandler(); }, 200);
    } else {
        sizeHandler();
    }
});

</script>
<div class="check-fonts">
    <p class="check-font-1">test 1</p>
    <p class="check-font-2">test 2</p>
</div>
<canvas id="canvas" class='ani_hack' width="1500" height="768"> </canvas>
<div data-orientation="landscape" class="orientation-msg-container">
    <p class="orientation-msg-text">Please rotate your device</p>
</div>
<div id="block_game" style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; display:none"></div>
