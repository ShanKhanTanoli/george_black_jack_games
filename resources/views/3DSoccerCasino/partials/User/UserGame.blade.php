<div style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%"></div>
<script>
$(document).ready(function() {
    var oMain = new CMain({

        win_occurrence: <?php echo Game::SoccerCasino()->win_occurrence;?>,
        slot_cash: <?php echo Game::SoccerCasino()->slot_cash;?>,
        min_reel_loop: 0,
        reel_delay: 6,

        time_show_win: 2000,
        time_show_all_wins: 2000,

        money: <?php echo Subscriber::GiftCardBalance(); ?>,

        freespin_occurrence: 1,

        bonus_occurrence: <?php echo Game::SoccerCasino()->bonus_occurrence;?>,
        freespin_symbol_num_occur: [5, 3, 2],

        num_freespin: [1, 2, 3],

        bonus_prize: [<?php echo Game::SoccerCasino()->perc_win_prize_1.",".Game::SoccerCasino()->perc_win_prize_2.",".Game::SoccerCasino()->perc_win_prize_3;?>],

        bonus_prize_occur: [40, 25, 20, 10, 5],

        coin_bet: [
            <?php echo Game::SoccerCasino()->min_bet;?>,
            <?php echo Game::SoccerCasino()->max_bet;?>
        ],

        paytable_symbol_1: [0, 0, 2, 1, 1],
        paytable_symbol_2: [0, 0, 4, 1, 1],
        paytable_symbol_3: [0, 0, 5, 4, 1],
        paytable_symbol_4: [0, 0, 2, 3, 4],
        paytable_symbol_5: [0, 0, 1, 3, 5],
        paytable_symbol_6: [0, 0, 2, 3, 5],
        paytable_symbol_7: [0, 0, 1, 2, 3],
        paytable_symbol_8: [0, 0, 0, 5, 5],
        paytable_symbol_9: [0, 0, 0, 1, 5],
        paytable_symbol_10: [0, 0, 0, 1, 5],

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
        var iAmountWin = oBetInfo.amount_win;
        var iNumPaylines = oBetInfo.payline;
    });

    $(oMain).on("bonus_start", function(evt) {

    });

    $(oMain).on("bonus_end", function(evt, iMoney) {

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
                    game: <?php echo Game::SoccerCasino()->id;?>,
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

    });

    $(oMain).on("share_event", function(evt, oData) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeShareEvent(oData);
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
    <p class="check-font-2">test 2</p>
</div>
<canvas id="canvas" class='ani_hack' width="1500" height="768"> </canvas>
<div data-orientation="landscape" class="orientation-msg-container">
    <p class="orientation-msg-text">Please rotate your device</p>
</div>
<div id="block_game" style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; display:none"></div>
