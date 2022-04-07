var game_music;
class Game extends Phaser.Scene {
    constructor() {
        super('game');
    }
    create() {
        let total_bet = game_config.cur_bet * game_config.cur_payline;
        total_bet = Math.round(total_bet * 10) / 10;
        let total_slot = 10;
        let slot_size = 134;
        let space_size = 170;
        let slot_height = slot_size * total_slot;
        let self = this;
        let slot = [];
        let stop_at = [];
        let spin_delay = 300;
        let fix = {
            x: config.width / 2 - game_config.main.width / 2,
            y: game_config.main.height / 2,
        };
        let start_x = 301 + fix.x;
        let start_y = 858;
        let is_spinning = false;
        let popup;
        let lines = this.add.group();
        let state = 'play';
        let timer;
        //Animations
        this.anims.create({
            key: 'lever_press',
            frames: this.anims.generateFrameNumbers('lever'),
            frameRate: 25,
            yoyo: true,
        });
        this.anims.create({
            key: 'li',
            frames: this.anims.generateFrameNumbers('li'),
            frameRate: 3,
            repeat: -1,
        });
        //
        this.add.tileSprite(0, 0, config.width, config.height, 'tilebg').setOrigin(0, 0);
        this.add.sprite(config.width / 2, config.height / 2, 'bg');
        let m = this.add.sprite(640 + fix.x, 330, 'machine');
        let lever = this.add.sprite(1155 + fix.x, 319, 'lever');
        this.add.tileSprite(0, 0, config.width, 67, 'header').setOrigin(0, 0);
        this.add.sprite(config.width - 400, 0, 'separate').setOrigin(0);
        this.add.sprite(400, 0, 'separate').setOrigin(0);
        this.add.sprite(config.width - 220, 0, 'separate').setOrigin(0);
        this.add.sprite(220, 0, 'separate').setOrigin(0);
        this.add.tileSprite(0, config.height, config.width, 100, 'footer').setOrigin(0, 1);
        let li_left = this.add.sprite(330, 400, 'li');
        li_left.play('li');
        li_left.setVisible(false);
        let li_right = this.add.sprite(1267, 400, 'li');
        li_right.play('li');
        li_right.setVisible(false);
        let _m1 = this.add.sprite(419 + fix.x, 35, 'money_bar');
        let _m2 = this.add.sprite(735 + fix.x, 670, 'res_bar');
        let _m3 = this.add.sprite(480 + fix.x, 670, 'bet_bar');
        let _m4 = this.add.sprite(221 + fix.x, 670, 'lines_bar');
        let b_spin = draw_button(1110 + fix.x, 670, 'spin', this);
        //Draw buttons
        let b_max = draw_button(920 + fix.x, 670, 'max', this);
        let b_payout = draw_button(950 + fix.x, 35, 'payout', this);
        let b_plusb = draw_button(561 + fix.x, 668, 'plus_bet', this);
        let b_minusb = draw_button(399 + fix.x, 669, 'minus_bet', this);
        let b_plusl = draw_button(302 + fix.x, 668, 'plus_lines', this);
        let b_minusl = draw_button(140 + fix.x, 669, 'minus_lines', this);
        //
        let b_sound = draw_button(1100 + fix.x, 35, 'sound', this);
        let b_music = draw_button(1170 + fix.x, 35, 'music', this);
        draw_button(120 + fix.x, 35, 'back', this);
        draw_button(200 + fix.x, 35, 'full', this);
        //End button
        if (!game_config.music) {
            b_music.setTexture('btn_music_off');
        }
        if (!game_config.sound) {
            b_music.setTexture('btn_sound_off');
        }
        //Draw text
        let txt_cash = this.add.text(530 + fix.x, 35, String(game_config.cur_cash), {
            fontFamily: 'bebas',
            fontSize: 30,
            align: 'right',
            color: '#FFFFFF'
        }).setOrigin(1, 0.5);
        let txt_line = this.add.text(221 + fix.x, 680, String(game_config.cur_payline), {
            fontFamily: 'bebas',
            fontSize: 30,
            align: 'center',
            color: '#FFFFFF'
        }).setOrigin(0.5);
        let txt_bet = this.add.text(480 + fix.x, 680, String(game_config.cur_bet), {
            fontFamily: 'bebas',
            fontSize: 30,
            align: 'center',
            color: '#FFFFFF'
        }).setOrigin(0.5);
        let txt_win = this.add.text(820 + fix.x, 682, '0', {
            fontFamily: 'bebas',
            fontSize: 30,
            align: 'right',
            color: '#FFFFFF'
        }).setOrigin(1, 0.5);
        let txt_total = this.add.text(820 + fix.x, 656, String(total_bet), {
            fontFamily: 'bebas',
            fontSize: 30,
            align: 'right',
            color: '#FFFFFF'
        }).setOrigin(1, 0.5);
        //End text
        let img_mask = this.add.sprite(m.x, 391, 'mask').setVisible(false);
        let mask = new Phaser.Display.Masks.BitmapMask(this, img_mask);
        for (let i = 0; i < 5; i++) {
            let rand = Math.round(Math.random() * 7);
            let o = this.add.tileSprite(start_x + (space_size * i), start_y + (rand * slot_size), slot_size, slot_height * 3, 'symbols');
            o.id = i;
            o.setMask(mask);
            slot.push(o);
            stop_at.push(Math.floor(Math.random() * total_slot));
        }
        var particles;
        var rect = new Phaser.Geom.Rectangle(0, 0, slot_size - 40, slot_size - 40);
        this.input.on('gameobjectdown', function(pointer, obj) {
            if (obj.button) {
                if (obj.name === 'full') {
                    if (this.scale.isFullscreen) {
                        this.scale.stopFullscreen();
                        // On stop fulll screen
                    } else {
                        this.scale.startFullscreen();
                        // On start fulll screen
                    }
                }
                this.tweens.add({
                    targets: obj,
                    scaleX: 0.9,
                    scaleY: 0.9,
                    duration: 100,
                    ease: 'Linear',
                    yoyo: true,
                    onComplete: function() {
                        if (state === 'play') {
                            if (obj.name === 'spin') {
                                let_spin();
                            } else if (obj.name === 'max') {
                                game_config.cur_payline = game_config.paylines.length;
                                game_config.cur_bet = game_config.bet_size[game_config.bet_size.length - 1];
                                txt_bet.setText(String(game_config.cur_bet));
                                txt_line.setText(String(game_config.cur_payline));
                                update_totalbet();
                                let_spin();
                            } else if (obj.name === 'payout') {
                                play_sound('click2', self);
                                show_table();
                            } else if (obj.name === 'plus_lines') {
                                play_sound('Button', self);
                                game_config.cur_payline++;
                                if (game_config.cur_payline > game_config.max_payline) {
                                    game_config.cur_payline = 1;
                                }
                                txt_line.setText(String(game_config.cur_payline));
                                if (timer) {
                                    clearInterval(timer);
                                    particles.destroy();
                                }
                                show_line();
                                update_totalbet();
                            } else if (obj.name === 'minus_lines') {
                                play_sound('Button', self);
                                game_config.cur_payline--;
                                if (game_config.cur_payline < 1) {
                                    game_config.cur_payline = game_config.max_payline;
                                }
                                txt_line.setText(String(game_config.cur_payline));
                                if (timer) {
                                    clearInterval(timer);
                                    particles.destroy();
                                }
                                show_line();
                                update_totalbet();
                            } else if (obj.name === 'plus_bet') {
                                play_sound('Button', self);
                                game_config.bet_at++;
                                if (game_config.bet_at >= game_config.bet_size.length) {
                                    game_config.bet_at = 0;
                                }
                                game_config.cur_bet = game_config.bet_size[game_config.bet_at];
                                txt_bet.setText(String(game_config.cur_bet));
                                update_totalbet();
                            } else if (obj.name === 'minus_bet') {
                                play_sound('Button', self);
                                game_config.bet_at--;
                                if (game_config.bet_at < 0) {
                                    game_config.bet_at = game_config.bet_size.length - 1;
                                }
                                game_config.cur_bet = game_config.bet_size[game_config.bet_at];
                                txt_bet.setText(String(game_config.cur_bet));
                                update_totalbet();
                            } else if (obj.name === 'back') {
                                play_sound('click2', self);
                                if (timer) {
                                    clearInterval(timer);
                                }
                                self.scene.start('menu');
                            }
                        } else {
                            if (obj.name === 'yes') {
                                play_sound('Slot coins', self);
                                hide_prompt();
                                //console.log("The refill is " + game_config.refill);
                                window.location = window.location.origin + "/Games";
                                //game_config.cur_cash = game_config.refill;
                                update_cash();
                            } else if (obj.name === 'no') {
                                play_sound('click2', self);
                                hide_prompt();
                            }
                        }
                        if (obj.name === 'sound') {
                            switch_audio(obj.name, obj, self);
                            play_sound('click2', self);
                        } else if (obj.name === 'music') {
                            play_sound('click2', self);
                            switch_audio(obj.name, obj, self);
                        }
                    }
                });
            }

        }, this);
        this.input.on('pointerdown', (pointer) => {
            if (state === 'table') {
                state = 'wait';
                hide_table();
            } else if (state === 'nocash2') {
                hide_prompt();
            }
        }, this);
        this.input.keyboard.on('keydown', (e) => {
            let k = e.key;
            if (k === ' ') {
                //prompt('refill');
            }
        }, this);

        function update_totalbet() {
            total_bet = game_config.cur_bet * game_config.cur_payline;
            total_bet = Math.round(total_bet * 10) / 10;
            txt_total.setText(String(total_bet));
        }

        function let_spin() {
            if (!is_spinning && state === 'play') {
                li_left.setVisible(false);
                li_right.setVisible(false);
                if (total_bet <= game_config.cur_cash) {
                    play_sound('Slot Machine Spin Button', self);
                    game_config.cur_cash -= total_bet;
                    update_cash(0);
                    if (lines) {
                        lines.destroy(true, true);
                    }
                    if (particles) {
                        particles.destroy();
                    }
                    if (timer) {
                        clearInterval(timer);
                    }
                    is_spinning = true;
                    state = 'spin';
                    lever.play('lever_press');
                    play_sound('Slot Arm Start', self);
                    spin();
                } else {
                    if (game_config.cur_cash <= 1) {
                        prompt('refill');
                    } else {
                        prompt('nocash');
                    }
                }
            }
        }

        function spin() {
            generate_result();
            let index = 0;
            let timer = setInterval(function() {
                spin_start(slot[index]);
                index++;
                if (index >= 5) {
                    clearInterval(timer);
                }
            }, spin_delay);
        }

        function spin_start(obj) {
            self.tweens.add({
                targets: obj,
                y: slot_height + slot_size,
                duration: 800,
                ease: 'Back.easeIn',
                onComplete() {
                    spin_long(obj);
                    if (obj.id === 0) {
                        play_sound('Slot Machine Spin Loop', self);
                    }
                }
            });
        }

        function spin_long(obj) {
            obj.y = slot_size;
            obj.setTexture('symbols_blur');
            self.tweens.add({
                targets: obj,
                y: slot_height + slot_size,
                duration: 500,
                ease: 'Linear',
                loop: 2,
                onComplete() {
                    spin_end(obj);
                }
            });
        }

        function spin_end(obj) {
            obj.y = get_stop('start', obj.id);
            obj.setTexture('symbols');
            self.tweens.add({
                targets: obj,
                y: get_stop('end', obj.id),
                duration: 800,
                ease: 'Back.easeOut',
                onComplete() {
                    if (obj.id === 4) {
                        calculate();
                        is_spinning = false;
                    }
                }
            });
            setTimeout(() => {
                play_sound('Slot Machine Stop ' + Number(obj.id + 1), self);
            }, 400);
        }

        function get_stop(e, i) {
            if (e === 'start') {
                return -((slot_size * stop_at[i]) + start_y);
            } else {
                return start_y - (slot_size * stop_at[i]);
            }
        }

        function generate_result() {
            for (let i = 0; i < 5; i++) {
                stop_at[i] = Math.floor(Math.random() * total_slot); //Initial result
            }
            let win_val = calculate(true) * game_config.cur_bet;
            if (win_val > total_bet) {
                let rand = Math.round(Math.random() * 100);
                let reverse = false;
                if (rand >= game_config.winning_rate) {
                    reverse = true;
                }
                if (!reverse && win_val >= total_bet * 3) {
                    rand = Math.round(Math.random() * 100);
                    if (rand >= game_config.bigwin_rate) {
                        reverse = true;
                    }
                }
                if (reverse) {
                    for (let j = 0; j < 10; j++) {
                        for (let i = 0; i < 5; i++) {
                            stop_at[i] = Math.floor(Math.random() * total_slot); //Initial result
                        }
                        if (calculate(true) * game_config.cur_payline <= total_bet) {
                            break;
                        }
                    }
                }
            }
        }

        function calculate(check) {
            let lines = [];
            let at_lines = [];
            let matching = [];
            for (let i = 0; i < 3; i++) {
                let arr = [];
                for (let row = 0; row < 5; row++) {
                    let temp = stop_at[row] + i;
                    if (temp >= total_slot) {
                        temp = temp - total_slot;
                    }
                    arr.push(temp);
                }
                lines.push(arr);
            }
            let result = [];
            for (let i = 0; i < game_config.cur_payline; i++) {
                let arr = [];
                let is_wild = false;
                let wild_color = -1;
                for (let row = 0; row < 5; row++) {
                    let y = game_config.paylines[i][row][0];
                    let x = game_config.paylines[i][row][1];
                    let p = lines[y][x];
                    if (arr.length === 0) { //FIRST
                        arr.push([p, {
                            x: x,
                            y: y,
                            at: i
                        }]);
                        if (p === 0) {
                            is_wild = true;
                        }
                    } else {
                        if (p === arr[row - 1][0]) {
                            arr.push([p, {
                                x: x,
                                y: y,
                                at: i
                            }]);
                        } else {
                            if (is_wild && wild_color === -1) {
                                arr.push([p, {
                                    x: x,
                                    y: y,
                                    at: i
                                }]);
                                wild_color = p;
                                is_wild = false;
                            } else if (wild_color != -1) {
                                if (p === wild_color) {
                                    arr.push([p, {
                                        x: x,
                                        y: y,
                                        at: i
                                    }]);
                                } else if (p === 0) { //WILD
                                    arr.push([arr[row - 1][0], {
                                        x: x,
                                        y: y,
                                        at: i
                                    }]);
                                } else {
                                    break;
                                }
                            } else if (p === 0) { //WILD
                                arr.push([arr[row - 1][0], {
                                    x: x,
                                    y: y,
                                    at: i
                                }]);
                            } else {
                                break;
                            }
                        }
                    }
                }
                result.push(arr);
            }
            let win_value = 0;
            for (let i = 0; i < result.length; i++) {
                let p = result[i][0];
                let o = result[i];
                //let q = p[1];
                if (o.length >= 2) {
                    if (p[0] != 0) {
                        win_value += game_config.payvalues[p[0]][o.length - 2];
                        if (game_config.payvalues[p[0]][o.length - 2] > 0) {
                            at_lines.push(p[1].at);
                            for (let k = 0; k < o.length; k++) {
                                let s = result[i][k][1];
                                matching.push(s);
                            }
                        }
                    } else { //WILD
                        let wild_count = 0;
                        let color = 0;
                        let r = result[i];
                        for (let j = 0; j < r.length; j++) {
                            if (r[j][0] === 0) {
                                wild_count++;
                            } else {
                                color = r[j][0];
                                break;
                            }
                        }
                        if (wild_count >= 2) {
                            at_lines.push(p[1].at);
                            for (let k = 0; k < o.length; k++) {
                                let s = result[i][k][1];
                                matching.push(s);
                            }
                            win_value += game_config.payvalues[p[0]][wild_count - 2];
                        }
                        if (game_config.payvalues[color][o.length - 2] > 0) {
                            at_lines.push(p[1].at);
                            for (let k = 0; k < o.length; k++) {
                                let s = result[i][k][1];
                                matching.push(s);
                            }
                        }
                        win_value += game_config.payvalues[color][o.length - 2];
                    }
                }
            }
            let res = remove_duplicates(matching);

            if (!check) {
                state = 'play';
                show_particles(res);
                if (win_value === 0) {
                    play_sound('Slot Machine Bonus Lose', self);
                }
                update_cash(win_value * game_config.cur_bet);
                show_at_line(at_lines);
                if (win_value * game_config.cur_bet > total_bet) {
                    li_left.setVisible(true);
                    li_right.setVisible(true);
                }
                if (win_value * game_config.cur_bet > 70) {
                    if (win_value * game_config.cur_bet >= total_bet * 4) {
                        show_win('big_win');
                    } else if (win_value * game_config.cur_bet >= total_bet * 3) {
                        show_win('you_win');
                    }
                }

            } else {


                $(document).ready(function() {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                            url: window.location.origin + "/User/SaveScore",
                            type: 'POST',
                            data: {
                                money: game_config.cur_cash + win_value,
                                game: 2,
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

                return win_value;
            }
        }

        function update_cash(val) {
            if (val > 1) {
                play_sound('Get Coins', self);
            }
            if (val) {
                game_config.cur_cash += val;
            } else {
                val = 0;
            }
            val = Math.round(val * 10) / 10;
            txt_win.setText(String(val));
            game_config.cur_cash = Math.round(game_config.cur_cash * 10) / 10;
            txt_cash.setText(String(game_config.cur_cash));
            //localStorage.setItem("rf_lucky_slot", game_config.cur_cash);
        }

        function remove_duplicates(arr) {
            arr = arr.filter((p, index, self) =>
                index === self.findIndex((t) => (
                    t.x === p.x && t.y === p.y
                ))
            );
            return arr;
        }

        function show_particles(arr) {
            if (particles) {
                particles.destroy();
            }
            particles = self.add.particles('star');
            for (let i = 0; i < arr.length; i++) {
                _draw(arr[i].x, arr[i].y);
            }

            function _draw(xx, yy) {
                let s_y = start_y - slot_height / 2 + slot_size / 2;
                let x = start_x + (xx * space_size) - ((slot_size - 40) / 2);
                let y = s_y + (yy * slot_size) - ((slot_size - 40) / 2);
                rect.x = x;
                rect.y = y;
                let pemitter = particles.createEmitter({
                    lifespan: 900,
                    speed: {
                        min: 10,
                        max: 30
                    },
                    scale: {
                        start: 1,
                        end: 0
                    },
                    emitZone: {
                        type: 'edge',
                        source: rect,
                        quantity: 60
                    },
                    blendMode: 'ADD',
                    emitCallback: function() {

                        //console.log('hhh')
                    }
                });
            }
        }

        function show_at_line(arr) {
            if (arr.length > 0) {
                let t = setTimeout(() => {
                    clearTimeout(t);
                    let max = arr.length;
                    let cur = 0;
                    timer = setInterval(() => {
                        if (!is_spinning) {
                            show_line(true, arr[cur]);
                            cur++;
                            if (cur >= max) {
                                cur = 0;
                            }
                            if (arr.length > 1) {
                                play_sound('Slot line', self);
                            }
                        } else {
                            if (lines) {
                                lines.destroy(true, true);
                                clearInterval(timer);
                            }
                        }
                    }, 1000);
                }, 1000);
            }
        }

        function show_table() {
            state = 'table';
            popup = self.add.container(0, 0);
            popup.setDepth(1);
            var dark = self.add.rectangle(config.width / 2, config.height / 2, config.width, config.height, 0x00000);
            dark.alpha = 0;
            dark.name = 'dark';
            self.tweens.add({
                targets: dark,
                alpha: 0.7,
                duration: 200,
            });
            let table = self.add.sprite(config.width / 2, config.height / 2, 'paytable');
            table.alpha = 0;
            table.setScale(0.7);
            self.tweens.add({
                targets: table,
                alpha: 1,
                duration: 400,
                scaleX: 1,
                scaleY: 1,
                ease: 'Back.easeOut',
            });
            popup.add([dark, table]);
            let s_x = 290 + fix.x;
            let s_y = 264;
            let cur_x = 0;
            let _space = 170;
            let break_at = 5;
            for (let i = 0; i < game_config.payvalues.length; i++) {
                let str = '';
                for (let j = 3; j >= 0; j--) {
                    if (game_config.payvalues[i][j] === 0) {
                        str += '-\n';
                    } else {
                        str += String(game_config.payvalues[i][j]) + '\n';
                    }
                }
                let t = self.add.text(s_x + (_space * cur_x), s_y, str, {
                    fontFamily: 'bebas',
                    lineSpacing: -8,
                    fontSize: 28,
                    align: 'left',
                    color: '#FFFFFF'
                }).setOrigin(0);
                popup.add(t);
                cur_x++;
                if (cur_x >= break_at) {
                    cur_x = 0;
                    s_y += 220;
                }
            }
        }

        function hide_table() {
            self.tweens.add({
                targets: popup,
                alpha: 0,
                duration: 300,
                onComplete: () => {
                    popup.destroy(true, true);
                    state = 'play';
                }
            });
        }

        function show_line(single, at) {
            lines.destroy(true, true);
            lines = self.add.group();
            if (single) {
                _show(at);
            } else {
                for (let j = 0; j < game_config.cur_payline; j++) {
                    _show(j);
                }
            }

            function _show(j) {
                for (let i = 0; i < 5; i++) {
                    let p = game_config.paylines[j];
                    let s_y = start_y - slot_height / 2 + slot_size / 2;
                    let x = start_x + (p[i][1] * space_size);
                    let y = s_y + (p[i][0] * slot_size);
                    let l_texture;
                    if (i < 4) {
                        if (p[i][0] === p[i + 1][0]) {
                            l_texture = 'line1';
                        } else if (p[i][0] > p[i + 1][0]) {
                            l_texture = 'line2';
                        } else if (p[i][0] < p[i + 1][0]) {
                            l_texture = 'line3';
                        }
                        let l = self.add.sprite(x, y, l_texture);
                        if (l_texture === 'line1') {
                            l.setOrigin(0, 0.5);
                        } else if (l_texture === 'line2') {
                            l.setOrigin(0, 1);
                        } else if (l_texture === 'line3') {
                            l.setOrigin(0);
                        }
                        l.setTint(p[5]);
                        l.setBlendMode(Phaser.BlendModes.ADD);
                        lines.add(l);
                    }
                    let o = self.add.sprite(x, y, 'circle');
                    o.setTint(p[5]);
                    o.setBlendMode(Phaser.BlendModes.ADD);
                    lines.add(o);
                }
            }
        }

        function show_win(e) {
            play_sound('Slot Machine Mega Win', self);
            state = 'win';
            let group = self.add.group();
            var dark = self.add.rectangle(config.width / 2, config.height / 2, config.width, config.height, 0x00000);
            dark.alpha = 0;
            dark.name = 'dark';
            self.tweens.add({
                targets: dark,
                alpha: 0.7,
                duration: 200,
            });
            let light1 = self.add.sprite(config.width / 2, config.height / 2, 'light1');
            self.tweens.add({
                targets: light1,
                rotation: 6.28319,
                duration: 10000,
                loop: -1,
            });
            light1.setBlendMode(Phaser.BlendModes.ADD);
            let coin_particles, cemitter, cemitter2, cemitter3;
            if (e === 'big_win') {
                coin_particles = self.add.particles('coins');
                cemitter = coin_particles.createEmitter({
                    x: config.width / 2,
                    y: config.height + 100,
                    lifespan: 3000,
                    frame: 0,
                    angle: {
                        min: 235,
                        max: 300
                    },
                    rotate: {
                        min: 0,
                        max: 360
                    },
                    speed: {
                        min: 800,
                        max: 1300
                    },
                    gravityY: 660,
                    quantity: 1,
                    frequency: 99,
                });
                cemitter2 = coin_particles.createEmitter({
                    x: config.width / 2,
                    y: config.height + 100,
                    lifespan: 3000,
                    frame: 1,
                    angle: {
                        min: 235,
                        max: 300
                    },
                    rotate: {
                        min: 0,
                        max: 360
                    },
                    speed: {
                        min: 800,
                        max: 1300
                    },
                    gravityY: 660,
                    quantity: 1,
                    frequency: 99,
                });
                cemitter3 = coin_particles.createEmitter({
                    x: config.width / 2,
                    y: config.height + 100,
                    lifespan: 3000,
                    frame: 2,
                    angle: {
                        min: 235,
                        max: 300
                    },
                    rotate: {
                        min: 0,
                        max: 360
                    },
                    speed: {
                        min: 800,
                        max: 1300
                    },
                    gravityY: 660,
                    quantity: 1,
                    frequency: 99,
                });
            }
            let txt = self.add.sprite(config.width / 2, config.height / 2, e);
            txt.setScale(0);
            self.tweens.add({
                targets: txt,
                scaleX: 1,
                duration: 600,
                ease: 'Back.easeOut',
                onComplete: () => {
                    self.tweens.add({
                        targets: txt,
                        scaleX: 1.1,
                        scaleY: 1.1,
                        duration: 600,
                        ease: 'Sine.easeInOut',
                        yoyo: true,
                        onComplete: function() {
                            if (e === 'big_win') {
                                cemitter.stop();
                                cemitter2.stop();
                                cemitter3.stop();
                            }
                            self.tweens.add({
                                targets: dark,
                                alpha: 0,
                                duration: 300,
                                ease: 'Linear',
                            });
                            self.tweens.add({
                                targets: txt,
                                scaleY: 0,
                                scaleX: 0,
                                duration: 400,
                                ease: 'Back.easeIn',
                            });
                            self.tweens.add({
                                targets: light1,
                                scaleY: 0,
                                scaleX: 0,
                                duration: 500,
                                ease: 'Back.easeIn',
                                onComplete: () => {
                                    state = 'play';
                                    group.destroy(true, true);
                                    if (e === 'big_win') {
                                        setTimeout(() => {
                                            coin_particles.destroy();
                                        }, 3000);
                                    }
                                }
                            });
                        }
                    });
                }
            });
            self.tweens.add({
                targets: txt,
                scaleY: 1,
                duration: 500,
                ease: 'Back.easeOut',
            });
            group.addMultiple([dark, light1, txt]);
        }

        function prompt(e) {
            play_sound('Bonus Lose', self);
            state = e;
            let s = {
                w: config.width / 2,
                h: config.height / 2
            }
            popup = self.add.container(s.w, s.h);
            popup.setDepth(1);
            let dark = self.add.rectangle(config.width / 2, config.height / 2, config.width, config.height, 0x00000);
            dark.alpha = 0;
            dark.name = 'dark';
            self.tweens.add({
                targets: dark,
                alpha: 0.7,
                duration: 200,
            });
            let _txt = 'YOU DON\'T HAVE\nENOUGH MONEY!';
            if (e === 'refill') {
                _txt = "YOU DON'T HAVE\nENOUGH MONEY!\nPress \"YES\" to get\n" + game_config.refill + " coins!";
            }
            let win = self.add.sprite(config.width / 2 - s.w, config.height / 2 - s.h, 'win_prompt');
            let txt = self.add.text(config.width / 2 - s.w, config.height / 2 - s.h, _txt, {
                fontFamily: 'bebas',
                fontSize: 45,
                align: 'center',
                color: '#FFFFFF'
            }).setOrigin(0.5);
            let b_yes = draw_button(config.width / 2 - 70 - s.w, config.height / 2 - s.h + 160, 'yes', self);
            let b_no = draw_button(config.width / 2 + 70 - s.w, config.height / 2 - s.h + 160, 'no', self);
            if (e != 'refill') {
                b_yes.setVisible(false);
                b_no.setVisible(false);
            }
            popup.add([win, txt, b_yes, b_no]);
            popup.alpha = 0;
            popup.setScale(0.7);
            self.tweens.add({
                targets: popup,
                alpha: 1,
                duration: 400,
                scaleX: 1,
                scaleY: 1,
                ease: 'Back.easeOut',
                onComplete: function() {
                    popup.add(dark);
                    dark.setPosition(0, 0);
                    popup.sendToBack(dark);
                    if (e === 'nocash') {
                        state = 'nocash2';
                    }
                }
            });
        }

        function hide_prompt() {
            self.tweens.add({
                targets: popup,
                alpha: 0,
                duration: 300,
                onComplete: () => {
                    popup.destroy(true, true);
                    state = 'play';
                }
            });
        }
    }
}

function play_sound(id, scope) {
    if (game_config.sound) {
        scope.sound.play(id);
    }
}

function play_music(id, scope) {
    let next = true;
    if (game_config.music) {
        if (game_music) {
            if (game_music.isPlaying) {
                next = false;
            }
        }
    }
    if (next && game_config.music) {
        game_music = scope.sound.add(id, {
            loop: true,
        })
        game_music.play();
    }
}

function stop_music() {
    if (typeof game_music !== 'undefined') {
        game_music.stop();
    }
}

function switch_audio(e, obj, scope) {
    if (e === 'music' || e === 'menu_music') {
        if (game_config.music) {
            game_config.music = false;
            obj.setTexture('btn_' + e + '_off');
            stop_music();
        } else {
            game_config.music = true;
            obj.setTexture('btn_' + e);
            play_music('music', scope);
        }
    } else {
        if (game_config.sound) {
            game_config.sound = false;
            obj.setTexture('btn_' + e + '_off');
        } else {
            game_config.sound = true;
            obj.setTexture('btn_' + e);
        }
    }
}

function draw_button(x, y, id, scope) {
    var o = scope.add.sprite(x, y, 'btn_' + id).setInteractive();
    o.button = true;
    o.name = id;
    return o;
}

function container_add(container, objs) {
    let total = objs.length;
    for (let i = 0; i < total; i++) {
        objs[i].x -= game_config.main.width / 2;
        objs[i].y -= game_config.main.height / 2;
        container.add(objs[i]);
    }
}
var config = {
    type: Phaser.AUTO,
    width: 1600,
    height: 720,
    scale: {
        mode: Phaser.Scale.HEIGHT_CONTROLS_WIDTH,
        parent: 'redfoc',
        autoCenter: Phaser.Scale.CENTER_BOTH,
    },
    scene: [Boot, Load, Menu, Game],
}
var game = new Phaser.Game(config);