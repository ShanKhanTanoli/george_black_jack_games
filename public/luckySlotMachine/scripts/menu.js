class Menu extends Phaser.Scene {
    constructor() {
        super('menu');
    }
    create() {
        play_music('music', this);
        let state = 'menu';
        let popup;
        let self = this;
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
        this.tweens.add({
            targets: title,
            scaleX: 0.9,
            scaleY: 0.9,
            yoyo: true,
            duration: 700,
            repeat: -1,
            ease: 'Sine.easeInOut',
        });
        draw_button(800, 476, 'play', this);
        draw_button(685, 585, 'about', this);
        let b_music = draw_button(889, 585, 'menu_music', this);
        let b_sound = draw_button(1019, 585, 'menu_sound', this);
        if (!game_config.music) {
            b_music.setTexture('btn_menu_music_off');
        }
        if (!game_config.sound) {
            b_sound.setTexture('btn_menu_sound_off');
        }
        this.input.on('gameobjectdown', function(pointer, obj) {
            let self = this;
            if (obj.button) {
                //Button clicked
                play_sound('click2', self);
                this.tweens.add({
                    targets: obj,
                    scaleX: 0.9,
                    scaleY: 0.9,
                    duration: 100,
                    ease: 'Linear',
                    yoyo: true,
                    onComplete: function() {
                        if (state = 'menu') {
                            if (obj.name === 'play') {
                                self.scene.start('game');
                            } else if (obj.name === 'menu_sound') {
                                switch_audio(obj.name, obj, self);
                            } else if (obj.name === 'menu_music') {
                                switch_audio(obj.name, obj, self);
                            } else if (obj.name === 'about') {
                                //show_info();
                                window.location.href = window.location.origin+'/Gallery';
                            }
                        }
                    },
                });
            }
        }, this);
        this.input.on('pointerdown', () => {
            if (state === 'info') {
                hide_info();
            }
        })

        function show_info() {
            state = 'preinfo';
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
            let table = self.add.sprite(config.width / 2, config.height / 2, 'about_window');
            table.alpha = 0;
            table.setScale(0.7);
            self.tweens.add({
                targets: table,
                alpha: 1,
                duration: 400,
                scaleX: 1,
                scaleY: 1,
                ease: 'Back.easeOut',
                onComplete: function() {
                    state = 'info';
                }
            });
            let content = self.add.sprite(config.width / 2, config.height / 2 + 40, 'about');
            content.alpha = 0;
            content.setScale(0.7);
            self.tweens.add({
                targets: content,
                alpha: 1,
                duration: 400,
                scaleX: 1,
                scaleY: 1,
                ease: 'Back.easeOut',
            });
            popup.add([dark, table, content]);
        }

        function hide_info() {
            self.tweens.add({
                targets: popup,
                alpha: 0,
                duration: 300,
                onComplete: () => {
                    popup.destroy(true, true);
                    state = 'menu';
                }
            });
        }
    }
}
