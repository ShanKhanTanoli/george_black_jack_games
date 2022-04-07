class Boot extends Phaser.Scene {
    //Load initial assets
    //To show it on preload scene
    constructor() {
        super('boot');
    }
    preload() {
        this.load.image('bg_menu', window.location.origin + '/luckySlotMachine/img/bg_menu.png');
        this.load.spritesheet('game_title2', window.location.origin + '/luckySlotMachine/img/game_title2.png', { frameWidth: 526, frameHeight: 341 });
        this.load.image('tilebg', window.location.origin + '/luckySlotMachine/img/tilebg.png');
        this.load.image('btn_start', window.location.origin + '/luckySlotMachine/img/btn_start.png');
    }
    create() {
        // let saved_cash = localStorage.getItem("rf_lucky_slot");
        // if (saved_cash !== null) {
        //     game_config.cur_cash = saved_cash;
        // }
        this.scale.stopListeners();
        this.scene.start('load');
    }
}
