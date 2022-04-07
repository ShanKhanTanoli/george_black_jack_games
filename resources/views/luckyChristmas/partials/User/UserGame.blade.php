<div style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%"></div>
<script>
$(document).ready(function() {
    var oMain = new CMain({
        win_occurrence: <?php echo Game::LuckyChristmas()->win_occurrence;?>,
        slot_cash: <?php echo Game::LuckyChristmas()->slot_cash;?>,
        bonus_occurrence: <?php echo Game::LuckyChristmas()->bonus_occurrence;?>,
        min_reel_loop: 1,
        reel_delay: 0,
        time_show_win: 2000,
        time_show_all_wins: 2000,
        money: <?php echo Subscriber::GiftCardBalance(); ?>,
        min_bet: <?php echo Game::LuckyChristmas()->min_bet;?>,
        max_bet: <?php echo Game::LuckyChristmas()->max_bet;?>,
        max_hold: <?php echo Game::LuckyChristmas()->max_hold;?>,

        perc_win_bonus_prize_1: <?php echo Game::LuckyChristmas()->perc_win_prize_1;?>,
        perc_win_bonus_prize_2: <?php echo Game::LuckyChristmas()->perc_win_prize_2;?>,
        perc_win_bonus_prize_3: <?php echo Game::LuckyChristmas()->perc_win_prize_3;?>,

        paytable_symbol_1: [0, 0, 1, 2, 5],
        paytable_symbol_2: [0, 0, 1, 1, 2],
        paytable_symbol_3: [0, 0, 5, 1, 1],
        paytable_symbol_4: [0, 1, 2, 5, 1],
        paytable_symbol_5: [0, 1, 2, 5, 1],
        paytable_symbol_6: [0, 5, 1, 2, 5],
        paytable_symbol_7: [0, 2, 1, 2, 3],
        paytable_symbol_8: [0, 1, 5, 1, 1],

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
                    game: <?php echo Game::LuckyChristmas()->id;?>,
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

    $(oMain).on("bonus_start", function(evt) {});

    $(oMain).on("bonus_end", function(evt, iMoney) {});

    $(oMain).on("show_interlevel_ad", function(evt) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeShowInterlevelAD();
        }
    });

    $(oMain).on("share_event", function(evt, oData) {
        trace(oData)
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
</div>
<canvas id="canvas" class='ani_hack' width="1500" height="640"> </canvas>
<div data-orientation="landscape" class="orientation-msg-container">
    <p class="orientation-msg-text">Please rotate your device</p>
</div>
<div id="block_game" style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; display:none"></div>
