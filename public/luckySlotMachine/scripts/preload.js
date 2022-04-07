class Load extends Phaser.Scene {
    constructor() {
        super('load');
    }
    preload() {
        this.add.tileSprite(0, 0, config.width, config.height, 'tilebg').setOrigin(0, 0);
        this.add.sprite(config.width / 2, config.height / 2, 'bg_menu');
        this.anims.create({
            key: 'title',
            frames: this.anims.generateFrameNumbers('game_title2'),
            frameRate: 5,
            repeat: -1,
        });
        let title = this.add.sprite(800, 215, 'game_title2');
        title.play('title');
        let bar = this.add.rectangle(config.width / 2, 500, 600, 20);
        bar.setStrokeStyle(4, 0xffffff);
        bar.alpha = 0.7;
        let progress = this.add.rectangle(config.width / 2, 500, 590, 10, 0xffffff);
        progress.alpha = 0.8;
        this.load.on('progress', (value) => {
            progress.width = 590 * value;
        });
        this.load.on('complete', () => {
            bar.destroy();
            progress.destroy();
            let o = draw_button(config.width / 2, 510, 'start', this);
            this.tweens.add({
                targets: o,
                scaleX: 0.9,
                scaleY: 0.9,
                yoyo: true,
                duration: 800,
                repeat: -1,
                ease: 'Sine.easeInOut',
            });
        }, this);
        this.input.on('gameobjectdown', () => {
            this.scene.start('menu');
        }, this);
        //
        this.load.image('symbols', window.location.origin + '/luckySlotMachine/img/symbols.png');
        this.load.image('symbols_blur', window.location.origin + '/luckySlotMachine/img/symbols_blur.png');
        this.load.image('machine', window.location.origin + '/luckySlotMachine/img/machine.png');
        this.load.image('bg', window.location.origin + '/luckySlotMachine/img/bg.png');
        this.load.image('game_title', window.location.origin + '/luckySlotMachine/img/game_title.png');
        this.load.image('btn_play', window.location.origin + '/luckySlotMachine/img/btn_play.png');
        this.load.image('btn_about', window.location.origin + '/luckySlotMachine/img/btn_about.png');
        this.load.image('btn_menu_sound', window.location.origin + '/luckySlotMachine/img/btn_menu_sound.png');
        this.load.image('btn_menu_sound_off', window.location.origin + '/luckySlotMachine/img/btn_menu_sound_off.png');
        this.load.image('btn_menu_music', window.location.origin + '/luckySlotMachine/img/btn_menu_music.png');
        this.load.image('btn_menu_music_off', window.location.origin + '/luckySlotMachine/img/btn_menu_music_off.png');
        this.load.image('footer', window.location.origin + '/luckySlotMachine/img/footer.png');
        this.load.image('header', window.location.origin + '/luckySlotMachine/img/header.png');
        this.load.image('money_bar', window.location.origin + '/luckySlotMachine/img/money_bar.png');
        this.load.image('btn_payout', window.location.origin + '/luckySlotMachine/img/btn_payout.png');
        this.load.image('btn_spin', window.location.origin + '/luckySlotMachine/img/btn_spin.png');
        this.load.image('btn_max', window.location.origin + '/luckySlotMachine/img/btn_max.png');
        this.load.image('btn_back', window.location.origin + '/luckySlotMachine/img/btn_back.png');
        this.load.image('btn_sound', window.location.origin + '/luckySlotMachine/img/btn_sound.png');
        this.load.image('btn_sound_off', window.location.origin + '/luckySlotMachine/img/btn_sound_off.png');
        this.load.image('btn_music', window.location.origin + '/luckySlotMachine/img/btn_music.png');
        this.load.image('btn_music_off', window.location.origin + '/luckySlotMachine/img/btn_music_off.png');
        this.load.image('btn_plus_bet', window.location.origin + '/luckySlotMachine/img/btn_plus_bet.png');
        this.load.image('btn_minus_bet', window.location.origin + '/luckySlotMachine/img/btn_minus_bet.png');
        this.load.image('btn_plus_lines', window.location.origin + '/luckySlotMachine/img/btn_plus_lines.png');
        this.load.image('btn_minus_lines', window.location.origin + '/luckySlotMachine/img/btn_minus_lines.png');
        this.load.image('btn_full', window.location.origin + '/luckySlotMachine/img/btn_full.png');
        this.load.image('btn_no', window.location.origin + '/luckySlotMachine/img/btn_no.png');
        this.load.image('btn_yes', window.location.origin + '/luckySlotMachine/img/btn_yes.png');
        this.load.image('win_prompt', window.location.origin + '/luckySlotMachine/img/win_prompt.png');
        this.load.image('res_bar', window.location.origin + '/luckySlotMachine/img/res_bar.png');
        this.load.image('lines_bar', window.location.origin + '/luckySlotMachine/img/lines_bar.png');
        this.load.image('bet_bar', window.location.origin + '/luckySlotMachine/img/bet_bar.png');
        this.load.image('paytable', window.location.origin + '/luckySlotMachine/img/paytable.png');
        this.load.image('circle', window.location.origin + '/luckySlotMachine/img/circle.png');
        this.load.image('line1', window.location.origin + '/luckySlotMachine/img/line1.png');
        this.load.image('line2', window.location.origin + '/luckySlotMachine/img/line2.png');
        this.load.image('line3', window.location.origin + '/luckySlotMachine/img/line3.png');
        this.load.image('star', window.location.origin + '/luckySlotMachine/img/star.png');
        this.load.image('you_win', window.location.origin + '/luckySlotMachine/img/you_win.png');
        this.load.image('big_win', window.location.origin + '/luckySlotMachine/img/big_win.png');
        this.load.image('light1', window.location.origin + '/luckySlotMachine/img/light1.png');
        this.load.image('coin', window.location.origin + '/luckySlotMachine/img/coin.png');
        this.load.image('mask', window.location.origin + '/luckySlotMachine/img/mask.png');
        this.load.image('separate', window.location.origin + '/luckySlotMachine/img/separate.png');
        this.load.image('about', window.location.origin + '/luckySlotMachine/img/about.png');
        this.load.image('about_window', window.location.origin + '/luckySlotMachine/img/about_window.png');
        this.load.spritesheet('coins', window.location.origin + '/luckySlotMachine/img/coins.png', { frameWidth: 70, frameHeight: 70 });
        this.load.spritesheet('lever', window.location.origin + '/luckySlotMachine/img/lever.png', { frameWidth: 77, frameHeight: 351 });
        this.load.spritesheet('li', window.location.origin + '/luckySlotMachine/img/li.png', { frameWidth: 115 / 2, frameHeight: 397 });
        //AUDIO
        this.load.audio('Slot Machine Spin Loop', window.location.origin + '/luckySlotMachine/audio/Slot Machine Spin Loop.mp3');
        this.load.audio('Slot Machine Mega Win', window.location.origin + '/luckySlotMachine/audio/Slot Machine Mega Win.mp3');
        this.load.audio('Slot Arm Start', window.location.origin + '/luckySlotMachine/audio/Slot Arm Start.mp3');
        this.load.audio('Get Coins', window.location.origin + '/luckySlotMachine/audio/Get Coins.mp3');
        this.load.audio('Slot line', window.location.origin + '/luckySlotMachine/audio/Slot line.mp3');
        this.load.audio('click2', window.location.origin + '/luckySlotMachine/audio/click2.mp3');
        this.load.audio('music', window.location.origin + '/luckySlotMachine/audio/music.mp3');
        this.load.audio('Button', window.location.origin + '/luckySlotMachine/audio/Button.mp3');
        this.load.audio('Bonus Lose', window.location.origin + '/luckySlotMachine/audio/Bonus Lose.mp3');
        this.load.audio('Slot coins', window.location.origin + '/luckySlotMachine/audio/Slot coins.mp3');
        this.load.audio('Slot Machine Spin Button', window.location.origin + '/luckySlotMachine/audio/Slot Machine Spin Button.mp3');
        this.load.audio('Slot Machine Bonus Lose', window.location.origin + '/luckySlotMachine/audio/Slot Machine Bonus Lose.mp3');
        for (let i = 1; i <= 5; i++) {
            this.load.audio('Slot Machine Stop ' + i, window.location.origin + '/luckySlotMachine/audio/Slot Machine Stop ' + i + '.mp3');
        }
    }
    create() {
        //this.scene.start('menu');
    }
}
