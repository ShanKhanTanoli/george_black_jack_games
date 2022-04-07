var cur_cash = 100;
var game_config = {
    main: {
        width: 1280,
        height: 720
    },
    winning_rate: null, //1-100
    bigwin_rate: 100, //1-100
    sound: null,
    music: null,
    refill: null, //Refill balance amount (No enough cash)
    cur_cash: null,
    cur_payline: 3,
    bet_size: [0.1, 0.2, 0.5, 1, 2, 5, 10, 20, 50, 100],
    bet_at: 3,
    cur_bet: 0,
    payvalues: [
        [0, 50, 500, 1000],
        [4, 50, 100, 300],
        [3, 40, 80, 200],
        [3, 30, 60, 150],
        [2, 25, 50, 100],
        [1, 20, 40, 80],
        [0, 15, 30, 60],
        [0, 10, 20, 40],
        [0, 5, 10, 20],
        [0, 3, 8, 18],
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
