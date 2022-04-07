<script type="text/javascript" src="{{ asset('luckySlotMachine/scripts/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript">
var game_config = {
    main: {
        width: 1280,
        height: 720
    },
    winning_rate: <?php echo Game::LuckySlot()->win_occurrence;?>,
    bigwin_rate: <?php echo Game::LuckySlot()->win_occurrence;?>,

    sound: <?php if(Game::LuckySlot()->audio_enable_on_startup == 1) { echo "true";}else{ echo "false";} ?>,
    music: <?php if(Game::LuckySlot()->audio_enable_on_startup == 1) { echo "true";}else{ echo "false";} ?>,
    refill: 0,
    cur_cash: <?php echo Subscriber::GiftCardBalance(); ?>,
    cur_payline: 1,
    bet_size: [<?php echo Game::LuckySlot()->min_bet; ?>, <?php echo Game::LuckySlot()->max_bet; ?>],
    bet_at: 1,
    cur_bet: 0,
    payvalues: [
        [0, 5, 0, 1],
        [4, 0, 1, 3],
        [3, 0, 0, 2],
        [3, 3, 6, 1],
        [2, 2, 0, 1],
        [1, 2, 4, 0],
        [0, 1, 3, 0],
        [0, 1, 2, 4],
        [0, 0, 1, 2],
        [0, 3, 2, 1]
    ],
    paylines: [ //Start from 0
        [
            [1, 0],
            [1, 1],
            [1, 2],
            [1, 3],
            [1, 4], 0xff3333
        ],
        [
            [0, 0],
            [0, 1],
            [0, 2],
            [0, 3],
            [0, 4], 0xff9c33
        ],
        [
            [2, 0],
            [2, 1],
            [2, 2],
            [2, 3],
            [2, 4], 0xfffc33
        ],
        [
            [0, 0],
            [1, 1],
            [2, 2],
            [1, 3],
            [0, 4], 0x88ff33
        ],
        [
            [2, 0],
            [1, 1],
            [0, 2],
            [1, 3],
            [2, 4], 0x33ff85
        ],
        [
            [1, 0],
            [0, 1],
            [0, 2],
            [0, 3],
            [1, 4], 0x33ddff
        ],
        [
            [1, 0],
            [2, 1],
            [2, 2],
            [2, 3],
            [1, 4], 0x3363ff
        ],
        [
            [0, 0],
            [0, 1],
            [1, 2],
            [2, 3],
            [2, 4], 0x9c33ff
        ],
        [
            [2, 0],
            [2, 1],
            [1, 2],
            [0, 3],
            [0, 4], 0xff33e0
        ],
        [
            [1, 0],
            [2, 1],
            [1, 2],
            [0, 3],
            [1, 4], 0xff3369
        ],
    ],
    max_payline: 0,
}
game_config.cur_bet = game_config.bet_size[game_config.bet_at];
game_config.max_payline = game_config.paylines.length;

</script>
<script type="text/javascript" src="{{ asset('luckySlotMachine/scripts/boot.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckySlotMachine/scripts/preload.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckySlotMachine/scripts/menu.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckySlotMachine/scripts/game.js') }}"></script>
<script type="text/javascript" src="{{ asset('luckySlotMachine/scripts/rotateyourphone.js') }}"></script>
