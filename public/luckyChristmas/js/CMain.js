function CMain(oData) {
    var _bUpdate;
    var _iCurResource = 0;
    var RESOURCE_TO_LOAD = 0;
    var _iState = STATE_LOADING;

    var _oData;
    var _oPreloader;
    var _oMenu;
    var _oHelp;
    var _oGame;

    this.initContainer = function() {
        var canvas = document.getElementById("canvas");
        s_oStage = new createjs.Stage(canvas);
        createjs.Touch.enable(s_oStage);

        s_bMobile = jQuery.browser.mobile;
        if (s_bMobile === false) {
            s_oStage.enableMouseOver(20);
        }


        s_iPrevTime = new Date().getTime();

        createjs.Ticker.setFPS(30);
        createjs.Ticker.addEventListener("tick", this._update);

        if (navigator.userAgent.match(/Windows Phone/i)) {
            DISABLE_SOUND_MOBILE = true;
        }

        s_oSpriteLibrary = new CSpriteLibrary();

        //ADD PRELOADER
        _oPreloader = new CPreloader();


    };

    this.preloaderReady = function() {
        this._loadImages();

        if (DISABLE_SOUND_MOBILE === false || s_bMobile === false) {
            this._initSounds();
        }

        _bUpdate = true;
    };

    this.soundLoaded = function() {
        _iCurResource++;
        var iPerc = Math.floor(_iCurResource / RESOURCE_TO_LOAD * 100);

        _oPreloader.refreshLoader(iPerc);
    };

    this._initSounds = function() {
        var aSoundsInfo = new Array();
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'win', loop: true, volume: 1, ingamename: 'win' });
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'press_but', loop: false, volume: 1, ingamename: 'press_but' });
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'reel_stop', loop: false, volume: 1, ingamename: 'reel_stop' });
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'reels', loop: false, volume: 1, ingamename: 'reels' });
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'bonus_item_choosen', loop: false, volume: 1, ingamename: 'bonus_item_choosen' });
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'start_reel', loop: false, volume: 1, ingamename: 'start_reel' });
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'reveal_prize', loop: false, volume: 1, ingamename: 'reveal_prize' });
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'press_hold', loop: false, volume: 1, ingamename: 'press_hold' });
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'soundtrack_bonus', loop: true, volume: 1, ingamename: 'soundtrack_bonus' });
        aSoundsInfo.push({ path: window.location.origin + '/luckyChristmas/sounds/', filename: 'soundtrack', loop: true, volume: 1, ingamename: 'soundtrack' });

        RESOURCE_TO_LOAD += aSoundsInfo.length;

        s_aSounds = new Array();
        for (var i = 0; i < aSoundsInfo.length; i++) {
            s_aSounds[aSoundsInfo[i].ingamename] = new Howl({
                src: [aSoundsInfo[i].path + aSoundsInfo[i].filename + '.mp3'],
                autoplay: false,
                preload: true,
                loop: aSoundsInfo[i].loop,
                volume: aSoundsInfo[i].volume,
                onload: s_oMain.soundLoaded
            });
        }

    };


    this._loadImages = function() {
        s_oSpriteLibrary.init(this._onImagesLoaded, this._onAllImagesLoaded, this);

        s_oSpriteLibrary.addSprite("but_exit", window.location.origin + "/luckyChristmas/sprites/but_exit.png");
        s_oSpriteLibrary.addSprite("bg_menu", window.location.origin + "/luckyChristmas/sprites/bg_menu.jpg");
        s_oSpriteLibrary.addSprite("bg_game", window.location.origin + "/luckyChristmas/sprites/bg_game.jpg");
        s_oSpriteLibrary.addSprite("paytable", window.location.origin + "/luckyChristmas/sprites/paytable.jpg");
        s_oSpriteLibrary.addSprite("but_play_bg", window.location.origin + "/luckyChristmas/sprites/but_play_bg.png");
        s_oSpriteLibrary.addSprite("mask_slot", window.location.origin + "/luckyChristmas/sprites/mask_slot.png");
        s_oSpriteLibrary.addSprite("spin_but", window.location.origin + "/luckyChristmas/sprites/but_spin_bg.png");
        s_oSpriteLibrary.addSprite("coin_but", window.location.origin + "/luckyChristmas/sprites/but_coin_bg.png");
        s_oSpriteLibrary.addSprite("info_but", window.location.origin + "/luckyChristmas/sprites/but_info_bg.png");
        s_oSpriteLibrary.addSprite("bet_but", window.location.origin + "/luckyChristmas/sprites/bet_but.png");
        s_oSpriteLibrary.addSprite("win_frame_anim", window.location.origin + "/luckyChristmas/sprites/win_frame_anim.png");
        s_oSpriteLibrary.addSprite("but_lines_bg", window.location.origin + "/luckyChristmas/sprites/but_lines_bg.png");
        s_oSpriteLibrary.addSprite("but_maxbet_bg", window.location.origin + "/luckyChristmas/sprites/but_maxbet_bg.png");
        s_oSpriteLibrary.addSprite("audio_icon", window.location.origin + "/luckyChristmas/sprites/audio_icon.png");
        s_oSpriteLibrary.addSprite("hit_area_col", window.location.origin + "/luckyChristmas/sprites/hit_area_col.png");
        s_oSpriteLibrary.addSprite("hold_col", window.location.origin + "/luckyChristmas/sprites/hold_col.png");
        s_oSpriteLibrary.addSprite("bonus_bg", window.location.origin + "/luckyChristmas/sprites/bonus_bg.jpg");
        s_oSpriteLibrary.addSprite("star_bonus", window.location.origin + "/luckyChristmas/sprites/star_bonus.png");
        s_oSpriteLibrary.addSprite("bonus_item", window.location.origin + "/luckyChristmas/sprites/bonus_item.png");
        s_oSpriteLibrary.addSprite("but_fullscreen", window.location.origin + "/luckyChristmas/sprites/but_fullscreen.png");
        s_oSpriteLibrary.addSprite("but_credits", window.location.origin + "/luckyChristmas/sprites/but_credits.png");
        s_oSpriteLibrary.addSprite("msg_box", window.location.origin + "/luckyChristmas/sprites/msg_box.png");
        s_oSpriteLibrary.addSprite("logo_ctl", window.location.origin + "/luckyChristmas/sprites/logo_ctl.png");

        for (var i = 1; i < NUM_SYMBOLS + 1; i++) {
            s_oSpriteLibrary.addSprite("symbol_" + i, window.location.origin + "/luckyChristmas/sprites/symbol_" + i + ".png");
            s_oSpriteLibrary.addSprite("symbol_" + i + "_anim", window.location.origin + "/luckyChristmas/sprites/symbol_" + i + "_anim.png");
        }

        for (var j = 1; j < NUM_PAYLINES + 1; j++) {
            s_oSpriteLibrary.addSprite("payline_" + j, window.location.origin + "/luckyChristmas/sprites/payline_" + j + ".png");
        }

        //ADD BONUS ITEM
        for (var j = 0; j < 25; j++) {
            s_oSpriteLibrary.addSprite("bonus_item_" + j, window.location.origin + "/luckyChristmas/sprites/bonus_item/bonus_item_" + j + ".png");
        }

        RESOURCE_TO_LOAD += s_oSpriteLibrary.getNumSprites();

        s_oSpriteLibrary.loadSprites();
    };

    this._onImagesLoaded = function() {
        _iCurResource++;

        var iPerc = Math.floor(_iCurResource / RESOURCE_TO_LOAD * 100);

        _oPreloader.refreshLoader(iPerc);
    };

    this._onAllImagesLoaded = function() {

    };

    this.onAllPreloaderImagesLoaded = function() {
        this._loadImages();
    };

    this._onRemovePreloader = function() {
        _oPreloader.unload();


        s_oSoundTrack = playSound("soundtrack", 1, true);

        this.gotoMenu();
    };

    this.gotoMenu = function() {
        _oMenu = new CMenu();
        _iState = STATE_MENU;
    };

    this.gotoGame = function() {
        _oGame = new CGame(_oData);

        _iState = STATE_GAME;
    };

    this.gotoHelp = function() {
        _oHelp = new CHelp();
        _iState = STATE_HELP;
    };

    this.stopUpdate = function() {
        _bUpdate = false;
        createjs.Ticker.paused = true;
        $("#block_game").css("display", "block");

        if (DISABLE_SOUND_MOBILE === false || s_bMobile === false) {
            Howler.mute(true);
        }

    };

    this.startUpdate = function() {
        s_iPrevTime = new Date().getTime();
        _bUpdate = true;
        createjs.Ticker.paused = false;
        $("#block_game").css("display", "none");

        if (DISABLE_SOUND_MOBILE === false || s_bMobile === false) {
            if (s_bAudioActive) {
                Howler.mute(false);
            }
        }

    };

    this._update = function(event) {
        if (_bUpdate === false) {
            return;
        }
        var iCurTime = new Date().getTime();
        s_iTimeElaps = iCurTime - s_iPrevTime;
        s_iCntTime += s_iTimeElaps;
        s_iCntFps++;
        s_iPrevTime = iCurTime;

        if (s_iCntTime >= 1000) {
            s_iCurFps = s_iCntFps;
            s_iCntTime -= 1000;
            s_iCntFps = 0;
        }

        if (_iState === STATE_GAME) {
            _oGame.update();
        }

        s_oStage.update(event);

    };

    s_oMain = this;
    _oData = oData;
    PAYTABLE_VALUES = new Array();
    for (var i = 0; i < 8; i++) {
        PAYTABLE_VALUES[i] = oData["paytable_symbol_" + (i + 1)];
    }

    ENABLE_FULLSCREEN = _oData.fullscreen;
    ENABLE_CHECK_ORIENTATION = _oData.check_orientation;
    SHOW_CREDITS = _oData.show_credits;

    this.initContainer();
}

var s_bMobile;
var s_bAudioActive = true;
var s_bFullscreen = false;
var s_iCntTime = 0;
var s_iTimeElaps = 0;
var s_iPrevTime = 0;
var s_iCntFps = 0;
var s_iCurFps = 0;

var s_oDrawLayer;
var s_oStage;
var s_oMain;
var s_oSpriteLibrary;
var s_oSoundTrack = null;
