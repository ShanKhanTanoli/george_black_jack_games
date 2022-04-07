<div style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%"></div>
<script>
$(document).ready(function() {
    var oMain = new CMain({
        win_occurrence: <?php echo Game::TheFruitsCasino()->win_occurrence ?>,
        slot_cash: <?php echo Game::TheFruitsCasino()->slot_cash ?>,
        min_reel_loop: <?php echo Game::TheFruitsCasino()->min_reel_loop ?>,
        reel_delay: <?php echo Game::TheFruitsCasino()->reel_delay ?>,
        time_show_win: <?php echo Game::TheFruitsCasino()->time_show_win*1000 ?>,
        time_show_all_wins: <?php echo Game::TheFruitsCasino()->time_show_all_wins*1000 ?>,
        money: <?php echo Subscriber::GiftCardBalance();?>,
        /***********PAYTABLE********************/
        //EACH SYMBOL PAYTABLE HAS 5 VALUES THAT INDICATES THE MULTIPLIER FOR X1,X2,X3,X4 OR X5 COMBOS
        paytable_symbol_1: [0,0,1,3,2], //PAYTABLE FOR SYMBOL 1
        paytable_symbol_2: [0,0,5,1,1],  //PAYTABLE FOR SYMBOL 2
        paytable_symbol_3: [0,1,2,5,1],  //PAYTABLE FOR SYMBOL 3
        paytable_symbol_4: [0,1,2,5,1],  //PAYTABLE FOR SYMBOL 4
        paytable_symbol_5: [0,5,1,2,5],    //PAYTABLE FOR SYMBOL 5
        paytable_symbol_6: [0,2,1,2,3],    //PAYTABLE FOR SYMBOL 6
        paytable_symbol_7: [0,1,5,1,1],     //PAYTABLE FOR SYMBOL 7
        /*************************************/
        audio_enable_on_startup: <?php if(Game::TheFruitsCasino()->audio_enable_on_startup == 1) { echo "true";}else{ echo "false";} ?>,

        fullscreen: <?php if(Game::TheFruitsCasino()->fullscreen == 1) { echo "true";}else{ echo "false";} ?>,

        check_orientation: true,
        show_credits: true,
        ad_show_counter: 3

    });

    $(oMain).on("recharge", function(evt) {
        window.location.href = "{{ route('games') }}";
    });


    $(oMain).on("start_session", function(evt) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeStartSession();
        }
    });

    $(oMain).on("end_session", function(evt) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeEndSession();
        }
    });

    $(oMain).on("bet_placed", function(evt, oBetInfo) {
        var iBet = oBetInfo.bet;
        var iTotBet = oBetInfo.tot_bet;
    });


    $(oMain).on("save_score", function(evt, iMoney) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeSaveScore({ score: iMoney });
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
                url: "{{ route('UserGameSaveScore') }}",
                type: 'POST',

                data: {
                    money: iMoney,
                    game: {{ Game::TheFruitsCasino()->id }},
                },
            })
            .done(function(data) {
                if (data == "Recharge Please.") {
                    location.reload();
                }

            })
            .fail(function() {
                console.log("error");
            });
    });

    $(oMain).on("show_preroll_ad", function(evt) {

    });

    $(oMain).on("show_interlevel_ad", function(evt) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeShowInterlevelAD();
        }
    });

    $(oMain).on("share_event", function(evt, iScore) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeShareEvent({
                img: TEXT_SHARE_IMAGE,
                title: TEXT_SHARE_TITLE,
                msg: TEXT_SHARE_MSG1 + iScore + TEXT_SHARE_MSG2,
                msg_share: TEXT_SHARE_SHARE1 + iScore + TEXT_SHARE_SHARE1
            });
        }
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
</div>
<canvas id="canvas" class='ani_hack' width="1500" height="640"> </canvas>
<div data-orientation="landscape" class="orientation-msg-container">
    <p class="orientation-msg-text">Please rotate your device</p>
</div>
<div id="block_game" style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; display:none"></div>
