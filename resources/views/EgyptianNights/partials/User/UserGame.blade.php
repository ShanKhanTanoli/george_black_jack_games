<div style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%"></div>
<!--begin::Game-->
<script>
$(document).ready(function() {
    var oMain = new CMain({
        win_occurrence: <?php echo Game::EgyptianNights()->win_occurrence;?>,
        slot_cash: <?php echo Game::EgyptianNights()->slot_cash;?>,
        min_reel_loop: 0,
        reel_delay: 2,
        time_show_win: 2000,
        time_show_all_wins: 2000,
        money: <?php echo Subscriber::GiftCardBalance(); ?>,
        freespin_occurrence: 2,
        bonus_occurrence: 2,
        freespin_symbol_num_occur: [5, 3, 2],
        num_freespin: [1, 2, 3],
        bonus_prize: [<?php echo Game::EgyptianNights()->perc_win_prize_1.",".Game::EgyptianNights()->perc_win_prize_2.",".Game::EgyptianNights()->perc_win_prize_3;?>],

        bonus_prize_occur: [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],

        coin_bet: [
            <?php echo Game::EgyptianNights()->min_bet;?>,
            <?php echo Game::EgyptianNights()->max_bet;?>
        ],

        paytable_symbol_1: [1, 0, 0, 0, 10],
        paytable_symbol_2: [0, 0, 0, 2, 1],
        paytable_symbol_3: [0, 0, 1, 2, 1],
        paytable_symbol_4: [2, 0, 5, 0, 0],
        paytable_symbol_5: [1, 0, 0, 5, 7],
        paytable_symbol_6: [0, 0, 5, 0, 10],
        paytable_symbol_7: [0, 0, 0, 10, 20],

        audio_enable_on_startup: <?php if(Game::EgyptianNights()->audio_enable_on_startup == 1) { echo "true";}else{ echo "false";} ?>,
        fullscreen: true,

        check_orientation: true,
        show_credits: true,
        num_spin_ads_showing: 10
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

    $(oMain).on("bonus_start", function(evt) {});
    $(oMain).on("bonus_end", function(evt, iMoney) {});

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
                    game: <?php echo Game::EgyptianNights()->id;?>,
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
<!--end::Game-->
<div class="check-fonts">
    <p class="check-font-1">test 1</p>
</div>
<canvas id="canvas" class='ani_hack' width="1500" height="640"> </canvas>
<div data-orientation="landscape" class="orientation-msg-container">
    <p class="orientation-msg-text">Please rotate your device</p>
</div>
<div id="block_game" style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; display:none"></div>
