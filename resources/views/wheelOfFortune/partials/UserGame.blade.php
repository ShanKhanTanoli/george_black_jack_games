<div style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%"></div>
<script>
$(document).ready(function() {
    var oMain = new CMain({
        start_credit: <?php echo Subscriber::GiftCardBalance();?>,
        start_bet: <?php echo Game::WheelOfFortune()->min_bet;?>,
        bet_offset: 0.5, //Bet Offset
        bank_cash: <?php echo Subscriber::GiftCardBalance();?>,
        max_bet: <?php echo Game::WheelOfFortune()->max_bet;?>,
        wheel_settings: [
            { prize: 1, win_occurence: 7 }, { prize: 2, win_occurence: 6 }, { prize: 0, win_occurence: 6 }, { prize: 0.04, win_occurence: 6 }, { prize: 0.05, win_occurence: 5 },
            { prize: 0.3, win_occurence: 6 }, { prize: 0, win_occurence: 5 }, { prize: 1, win_occurence: 4 }, { prize: 2, win_occurence: 3 }, { prize: 0.03, win_occurence: 5 },
            { prize: 0.04, win_occurence: 5 }, { prize: 0.05, win_occurence: 5 }, { prize: 1, win_occurence: 6 }, { prize: 2, win_occurence: 7 }, { prize: 0.03, win_occurence: 5 },
            { prize: 0.4, win_occurence: 4 }, { prize: 0.5, win_occurence: 4 }, { prize: 1, win_occurence: 5 }, { prize: 0.03, win_occurence: 1 }, { prize: 2, win_occurence: 5 }
        ],

        anim_idle_change_frequency: 10000,
        led_anim_idle1_timespeed: 2000,
        led_anim_idle2_timespeed: 100,
        led_anim_idle3_timespeed: 150,

        led_anim_spin_timespeed: 50,
        led_anim_win_duration: 5000,
        led_anim_win1_timespeed: 300,
        led_anim_win2_timespeed: 50,
        led_anim_lose_duration: 5000,

        show_credits: true,
        fullscreen: <?php if(Game::WheelOfFortune()->fullscreen == 1){
             echo "true";
        }else echo "false"; ?>,
        check_orientation: true,
        audio_enable_on_startup: <?php if(Game::WheelOfFortune()->audio_enable_on_startup == 1){
             echo "true";
        }else echo "false"; ?>,
        ad_show_counter: 5

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

    $(oMain).on("bet_placed", function(evt, iTotBet) {});

    $(oMain).on("save_score", function(evt, iScore) {
        if (getParamValue('ctl-arcade') === "true") {
            parent.__ctlArcadeSaveScore({ score: iScore });
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
                    money: iScore,
                    game: 3,
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
<canvas id="canvas" class='ani_hack' width="1920" height="1080"> </canvas>
<div data-orientation="landscape" class="orientation-msg-container">
    <p class="orientation-msg-text">Please rotate your device</p>
</div>
<div id="block_game" style="position: fixed; background-color: transparent; top: 0px; left: 0px; width: 100%; height: 100%; display:none">
</div>
