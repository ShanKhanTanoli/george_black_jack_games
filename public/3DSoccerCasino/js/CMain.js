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

        s_oAttachSection = new createjs.Container();
        s_oStage.addChild(s_oAttachSection);

        createjs.Touch.enable(s_oStage);

        s_bMobile = jQuery.browser.mobile;
        if (s_bMobile === false) {
            s_oStage.enableMouseOver(20);
        }


        s_iPrevTime = new Date().getTime();

        createjs.Ticker.setFPS(FPS);
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
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'crowd', loop: true, volume: 1, ingamename: 'crowd' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'press_but', loop: false, volume: 1, ingamename: 'press_but' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'reel_stop', loop: false, volume: 1, ingamename: 'reel_stop' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'reel_stop_bonus', loop: false, volume: 1, ingamename: 'reel_stop_bonus' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'reel_stop_freespin', loop: false, volume: 1, ingamename: 'reel_stop_freespin' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'start_reel', loop: false, volume: 1, ingamename: 'start_reel' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'spin_but', loop: false, volume: 1, ingamename: 'spin_but' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'kick', loop: false, volume: 1, ingamename: 'kick' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol1', loop: false, volume: 1, ingamename: 'symbol1' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol2', loop: false, volume: 1, ingamename: 'symbol2' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol3', loop: false, volume: 1, ingamename: 'symbol3' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol4', loop: false, volume: 1, ingamename: 'symbol4' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol5', loop: false, volume: 1, ingamename: 'symbol5' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol6', loop: false, volume: 1, ingamename: 'symbol6' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol7', loop: false, volume: 1, ingamename: 'symbol7' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol8', loop: false, volume: 1, ingamename: 'symbol8' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol9_10_11', loop: false, volume: 1, ingamename: 'symbol9_10_11' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol12', loop: false, volume: 1, ingamename: 'symbol12' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'symbol13', loop: false, volume: 1, ingamename: 'symbol13' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'bonus_win', loop: false, volume: 1, ingamename: 'bonus_win' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'avatar_win', loop: false, volume: 1, ingamename: 'avatar_win' });
        aSoundsInfo.push({ path: window.location.origin + '/3DSoccerCasino/sounds/', filename: 'soundtrack', loop: true, volume: 1, ingamename: 'soundtrack' });

        RESOURCE_TO_LOAD += aSoundsInfo.length;

        s_aSounds = new Array();
        for (var i = 0; i < aSoundsInfo.length; i++) {
            s_aSounds[aSoundsInfo[i].ingamename] = new Howl({
                src: [aSoundsInfo[i].path + aSoundsInfo[i].filename + '.mp3', aSoundsInfo[i].path + aSoundsInfo[i].filename + '.ogg'],
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

        s_oSpriteLibrary.addSprite("bg_menu", window.location.origin + "/3DSoccerCasino/sprites/bg_menu.jpg");
        s_oSpriteLibrary.addSprite("but_bg", window.location.origin + "/3DSoccerCasino/sprites/but_play_bg.png");
        s_oSpriteLibrary.addSprite("but_exit", window.location.origin + "/3DSoccerCasino/sprites/but_exit.png");
        s_oSpriteLibrary.addSprite("bg_game", window.location.origin + "/3DSoccerCasino/sprites/bg_game.jpg");
        s_oSpriteLibrary.addSprite("paytable1", window.location.origin + "/3DSoccerCasino/sprites/paytable1.jpg");
        s_oSpriteLibrary.addSprite("paytable2", window.location.origin + "/3DSoccerCasino/sprites/paytable2.jpg");
        s_oSpriteLibrary.addSprite("paytable3", window.location.origin + "/3DSoccerCasino/sprites/paytable3.jpg");
        s_oSpriteLibrary.addSprite("paytable4", window.location.origin + "/3DSoccerCasino/sprites/paytable4.jpg");
        s_oSpriteLibrary.addSprite("mask_slot", window.location.origin + "/3DSoccerCasino/sprites/mask_slot.png");
        s_oSpriteLibrary.addSprite("coin_but", window.location.origin + "/3DSoccerCasino/sprites/but_coin_bg.png");
        s_oSpriteLibrary.addSprite("info_but", window.location.origin + "/3DSoccerCasino/sprites/but_info_bg.png");
        s_oSpriteLibrary.addSprite("win_frame_anim", window.location.origin + "/3DSoccerCasino/sprites/win_frame_anim.png");
        s_oSpriteLibrary.addSprite("but_lines_bg", window.location.origin + "/3DSoccerCasino/sprites/but_lines_bg.png");
        s_oSpriteLibrary.addSprite("but_maxbet_bg", window.location.origin + "/3DSoccerCasino/sprites/but_maxbet_bg.png");
        s_oSpriteLibrary.addSprite("audio_icon", window.location.origin + "/3DSoccerCasino/sprites/audio_icon.png");
        s_oSpriteLibrary.addSprite("msg_box", window.location.origin + "/3DSoccerCasino/sprites/msg_box.png");
        s_oSpriteLibrary.addSprite("but_arrow_next", window.location.origin + "/3DSoccerCasino/sprites/but_arrow_next.png");
        s_oSpriteLibrary.addSprite("but_arrow_prev", window.location.origin + "/3DSoccerCasino/sprites/but_arrow_prev.png");
        s_oSpriteLibrary.addSprite("logo", window.location.origin + "/3DSoccerCasino/sprites/logo.png");
        s_oSpriteLibrary.addSprite("but_spin", window.location.origin + "/3DSoccerCasino/sprites/but_spin.png");
        s_oSpriteLibrary.addSprite("bg_loading_bonus", window.location.origin + "/3DSoccerCasino/sprites/bg_loading_bonus.jpg");
        s_oSpriteLibrary.addSprite("bg_loading", window.location.origin + "/3DSoccerCasino/sprites/bg_loading.jpg");
        s_oSpriteLibrary.addSprite("but_fullscreen", window.location.origin + "/3DSoccerCasino/sprites/but_fullscreen.png");
        s_oSpriteLibrary.addSprite("but_credits", window.location.origin + "/3DSoccerCasino/sprites/but_credits.png");
        s_oSpriteLibrary.addSprite("ctl_logo", window.location.origin + "/3DSoccerCasino/sprites/ctl_logo.png");
        s_oSpriteLibrary.addSprite("but_exit_info", window.location.origin + "/3DSoccerCasino/sprites/but_exit_info.png");
        s_oSpriteLibrary.addSprite("amount_win_bg", window.location.origin + "/3DSoccerCasino/sprites/amount_win_bg.png");

        for (var i = 1; i < NUM_SYMBOLS + 1; i++) {
            s_oSpriteLibrary.addSprite("symbol_" + i, window.location.origin + "/3DSoccerCasino/sprites/symbol_" + i + ".png");
            s_oSpriteLibrary.addSprite("symbol_" + i + "_anim", window.location.origin + "/3DSoccerCasino/sprites/symbol_" + i + "_anim.jpg");

        }

        for (var j = 1; j < NUM_PAYLINES + 1; j++) {
            s_oSpriteLibrary.addSprite("payline_" + j, window.location.origin + "/3DSoccerCasino/sprites/paylines/payline_" + j + ".png");
            s_oSpriteLibrary.addSprite("bet_but" + j, window.location.origin + "/3DSoccerCasino/sprites/paylines/bet_but" + j + ".png");
        }

        //AVATAR FRAMES
        for (var k = 0; k < 30; k++) {
            s_oSpriteLibrary.addSprite("avatar_idle_" + k, window.location.origin + "/3DSoccerCasino/sprites/avatar/avatar_idle/avatar_idle_" + k + ".png");
        }

        for (var t = 0; t < 38; t++) {
            s_oSpriteLibrary.addSprite("avatar_win_" + t, window.location.origin + "/3DSoccerCasino/sprites/avatar/avatar_win/avatar_win_" + t + ".png");
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

    this._onRemovePreloader = function() {
        s_oGameSettings = new CSlotSettings();
        s_oMsgBox = new CMsgBox();
        _oPreloader.unload();

        WIN_OCCURRENCE = _oData.win_occurrence;
        MIN_REEL_LOOPS = _oData.min_reel_loop;
        REEL_DELAY = _oData.reel_delay;
        TIME_SHOW_WIN = _oData.time_show_win;
        TIME_SHOW_ALL_WINS = _oData.time_show_all_wins;
        SLOT_CASH = _oData.slot_cash;
        TOTAL_MONEY = parseFloat(_oData.money);
        FREESPIN_OCCURRENCE = _oData.freespin_occurrence;
        BONUS_OCCURRENCE = _oData.bonus_occurrence;
        FREESPIN_SYMBOL_NUM_OCCURR = _oData.freespin_symbol_num_occur;
        NUM_FREESPIN = _oData.num_freespin;
        BONUS_PRIZE = _oData.bonus_prize;
        BONUS_PRIZE_OCCURR = _oData.bonus_prize_occur;
        COIN_BET = _oData.coin_bet;
        ENABLE_FULLSCREEN = oData.fullscreen;
        NUM_SPIN_FOR_ADS = oData.num_spin_ads_showing;
        PAYTABLE_VALUES = new Array();
        for (var i = 1; i < 11; i++) {
            PAYTABLE_VALUES[i] = oData["paytable_symbol_" + i];
        }


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
var s_oAttachSection;
var s_oMain;
var s_oSpriteLibrary;
var s_bLogged = false;
var s_oMsgBox;
var s_oGameSettings;
var s_aSounds;
var s_oSoundTrack = null;
