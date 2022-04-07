function CMain(oData){
    var _bUpdate;
    var _iCurResource = 0;
    var RESOURCE_TO_LOAD = 0;
    var _iState = STATE_LOADING;
    
    var _oData;
    var _oPreloader;
    var _oMenu;
    var _oHelp;
    var _oGame;

    this.initContainer = function(){
        var canvas = document.getElementById("canvas");
        s_oStage = new createjs.Stage(canvas);  
        
        s_oAttachSection = new createjs.Container();
        s_oStage.addChild(s_oAttachSection);
        
        createjs.Touch.enable(s_oStage);
        
        s_bMobile = jQuery.browser.mobile;
        if(s_bMobile === false){
            s_oStage.enableMouseOver(20);  
        }
        
        
        s_iPrevTime = new Date().getTime();

        createjs.Ticker.setFPS(30);
	createjs.Ticker.addEventListener("tick", this._update);
	
        if(navigator.userAgent.match(/Windows Phone/i)){
                DISABLE_SOUND_MOBILE = true;
        }
		
        s_oSpriteLibrary  = new CSpriteLibrary();

        //ADD PRELOADER
        _oPreloader = new CPreloader();
    };
    
    this.preloaderReady = function(){
        if(DISABLE_SOUND_MOBILE === false || s_bMobile === false){
            this._initSounds();
        }
        
        this._loadImages();
        _bUpdate = true;
    };

    this.soundLoaded = function(){
         _iCurResource++;
         var iPerc = Math.floor(_iCurResource/RESOURCE_TO_LOAD *100);

         _oPreloader.refreshLoader(iPerc);
    };
    
    this._initSounds = function(){
        Howler.mute(!s_bAudioActive);


        s_aSoundsInfo = new Array();
        s_aSoundsInfo.push({path: window.location.origin +'/EgyptianNights/sounds/',filename:'press_but',loop:false,volume:1, ingamename: 'press_but'});
        s_aSoundsInfo.push({path: window.location.origin +'/EgyptianNights/sounds/',filename:'win',loop:false,volume:1, ingamename: 'win'});
        s_aSoundsInfo.push({path: window.location.origin +'/EgyptianNights/sounds/',filename:'reels',loop:false,volume:1, ingamename: 'reels'});
        s_aSoundsInfo.push({path: window.location.origin +'/EgyptianNights/sounds/',filename:'reel_stop',loop:false,volume:1, ingamename: 'reel_stop'});
        s_aSoundsInfo.push({path: window.location.origin +'/EgyptianNights/sounds/',filename:'game_over_bonus',loop:false,volume:1, ingamename: 'game_over_bonus'});
        s_aSoundsInfo.push({path: window.location.origin +'/EgyptianNights/sounds/',filename:'reel_bonus',loop:false,volume:1, ingamename: 'reel_bonus'});
        s_aSoundsInfo.push({path: window.location.origin +'/EgyptianNights/sounds/',filename:'start_reel_bonus',loop:false,volume:1, ingamename: 'start_reel_bonus'});
        s_aSoundsInfo.push({path: window.location.origin +'/EgyptianNights/sounds/',filename:'win_bonus',loop:false,volume:1, ingamename: 'win_bonus'});
        s_aSoundsInfo.push({path: window.location.origin +'/EgyptianNights/sounds/',filename:'start_reel',loop:false,volume:1, ingamename: 'start_reel'});
        
        RESOURCE_TO_LOAD += s_aSoundsInfo.length;

        s_aSounds = new Array();
        for(var i=0; i<s_aSoundsInfo.length; i++){
            this.tryToLoadSound(s_aSoundsInfo[i], false);
        }
        
    };
    
    this.tryToLoadSound = function(oSoundInfo, bDelay){
        
       setTimeout(function(){        
            s_aSounds[oSoundInfo.ingamename] = new Howl({ 
                                                            src: [oSoundInfo.path+oSoundInfo.filename+'.mp3'],
                                                            autoplay: false,
                                                            preload: true,
                                                            loop: oSoundInfo.loop, 
                                                            volume: oSoundInfo.volume,
                                                            onload: s_oMain.soundLoaded,
                                                            onloaderror: function(szId,szMsg){
                                                                                for(var i=0; i < s_aSoundsInfo.length; i++){
                                                                                     if ( szId === s_aSounds[s_aSoundsInfo[i].ingamename]._sounds[0]._id){
                                                                                         s_oMain.tryToLoadSound(s_aSoundsInfo[i], true);
                                                                                         break;
                                                                                     }
                                                                                }
                                                                        },
                                                            onplayerror: function(szId) {
                                                                for(var i=0; i < s_aSoundsInfo.length; i++){
                                                                                     if ( szId === s_aSounds[s_aSoundsInfo[i].ingamename]._sounds[0]._id){
                                                                                          s_aSounds[s_aSoundsInfo[i].ingamename].once('unlock', function() {
                                                                                            s_aSounds[s_aSoundsInfo[i].ingamename].play();
                                                                                            

                                                                                          });
                                                                                         break;
                                                                                     }
                                                                                 }
                                                                       
                                                            } 
                                                        });

            
        }, (bDelay ? 200 : 0) );
        
        
    };


    this._loadImages = function(){
        s_oSpriteLibrary.init( this._onImagesLoaded,this._onAllImagesLoaded, this );

        s_oSpriteLibrary.addSprite("but_bg",window.location.origin +"/EgyptianNights/sprites/but_play_bg.png");
        s_oSpriteLibrary.addSprite("but_exit",window.location.origin +"/EgyptianNights/sprites/but_exit.png");
        s_oSpriteLibrary.addSprite("bg_menu",window.location.origin +"/EgyptianNights/sprites/bg_menu.jpg");
        s_oSpriteLibrary.addSprite("bg_game",window.location.origin +"/EgyptianNights/sprites/bg_game.jpg");
        s_oSpriteLibrary.addSprite("paytable1",window.location.origin +"/EgyptianNights/sprites/paytable1.jpg");
        s_oSpriteLibrary.addSprite("paytable2",window.location.origin +"/EgyptianNights/sprites/paytable2.jpg");
        s_oSpriteLibrary.addSprite("paytable3",window.location.origin +"/EgyptianNights/sprites/paytable3.jpg");
        s_oSpriteLibrary.addSprite("mask_slot",window.location.origin +"/EgyptianNights/sprites/mask_slot.png");
        s_oSpriteLibrary.addSprite("spin_but",window.location.origin +"/EgyptianNights/sprites/but_spin_bg.png");
        s_oSpriteLibrary.addSprite("but_autospin",window.location.origin +"/EgyptianNights/sprites/but_autospin.png");
        s_oSpriteLibrary.addSprite("spin_bg",window.location.origin +"/EgyptianNights/sprites/spin_bg.png");
        s_oSpriteLibrary.addSprite("coin_but",window.location.origin +"/EgyptianNights/sprites/but_coin_bg.png");
        s_oSpriteLibrary.addSprite("info_but",window.location.origin +"/EgyptianNights/sprites/but_info_bg.png");
        s_oSpriteLibrary.addSprite("bet_but",window.location.origin +"/EgyptianNights/sprites/bet_but.png");
        s_oSpriteLibrary.addSprite("win_frame_anim",window.location.origin +"/EgyptianNights/sprites/win_frame_anim.png");
        s_oSpriteLibrary.addSprite("but_lines_bg",window.location.origin +"/EgyptianNights/sprites/but_lines_bg.png");
        s_oSpriteLibrary.addSprite("but_maxbet_bg",window.location.origin +"/EgyptianNights/sprites/but_maxbet_bg.png");
        s_oSpriteLibrary.addSprite("audio_icon",window.location.origin +"/EgyptianNights/sprites/audio_icon.png");
        s_oSpriteLibrary.addSprite("msg_box",window.location.origin +"/EgyptianNights/sprites/msg_box.png");
        s_oSpriteLibrary.addSprite("but_arrow_next",window.location.origin +"/EgyptianNights/sprites/but_arrow_next.png");
        s_oSpriteLibrary.addSprite("but_arrow_prev",window.location.origin +"/EgyptianNights/sprites/but_arrow_prev.png");
        s_oSpriteLibrary.addSprite("freespin_panel",window.location.origin +"/EgyptianNights/sprites/freespin_panel.png");
        s_oSpriteLibrary.addSprite("logo",window.location.origin +"/EgyptianNights/sprites/logo.png");
        s_oSpriteLibrary.addSprite("logo_freespin",window.location.origin +"/EgyptianNights/sprites/logo_freespin.png");
        s_oSpriteLibrary.addSprite("but_credits",window.location.origin +"/EgyptianNights/sprites/but_credits.png");
        s_oSpriteLibrary.addSprite("but_fullscreen",window.location.origin +"/EgyptianNights/sprites/but_fullscreen.png");
        s_oSpriteLibrary.addSprite("logo_ctl",window.location.origin +"/EgyptianNights/sprites/logo_ctl.png");
        
        for(var i=1;i<NUM_SYMBOLS+1;i++){
            s_oSpriteLibrary.addSprite("symbol_"+i,window.location.origin +"/EgyptianNights/sprites/symbol_"+i+".png");
            s_oSpriteLibrary.addSprite("symbol_"+i+"_anim",window.location.origin +"/EgyptianNights/sprites/symbol_"+i+"_anim.png");
        }
        
        for(var j=1;j<NUM_PAYLINES+1;j++){
            s_oSpriteLibrary.addSprite("payline_"+j,window.location.origin +"/EgyptianNights/sprites/payline_"+j+".png");
        }
        
        //LOAD BONUS SPRITES
        s_oSpriteLibrary.addSprite("bg_bonus",window.location.origin +"/EgyptianNights/sprites/bonus/bg_bonus.png");
        s_oSpriteLibrary.addSprite("but_spin_bonus",window.location.origin +"/EgyptianNights/sprites/bonus/but_spin_bonus.png");
        s_oSpriteLibrary.addSprite("leds",window.location.origin +"/EgyptianNights/sprites/bonus/leds.png");
        s_oSpriteLibrary.addSprite("wheel",window.location.origin +"/EgyptianNights/sprites/bonus/wheel.png");
        
        RESOURCE_TO_LOAD += s_oSpriteLibrary.getNumSprites();

        s_oSpriteLibrary.loadSprites();
    };
    
    this._onImagesLoaded = function(){
        _iCurResource++;

        var iPerc = Math.floor(_iCurResource/RESOURCE_TO_LOAD *100);

        _oPreloader.refreshLoader(iPerc);

    };
    
    this._onAllImagesLoaded = function(){
        
    };
    
    this._onRemovePreloader = function(){
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
        NUM_SPIN_FOR_ADS = oData.num_spin_ads_showing;
        PAYTABLE_VALUES = new Array();
        for(var i=0;i<7;i++){
            PAYTABLE_VALUES[i] = oData["paytable_symbol_"+(i+1)];
        }
        
        this.gotoMenu();
    };
    
    this.gotoMenu = function(){
        _oMenu = new CMenu();
        _iState = STATE_MENU;
    };
    
    this.gotoGame = function(){
        _oGame = new CGame(_oData);   
							
        _iState = STATE_GAME;
    };
    
    this.gotoHelp = function(){
        _oHelp = new CHelp();
        _iState = STATE_HELP;
    };
    
    this.stopUpdate = function(){
        _bUpdate = false;
        createjs.Ticker.paused = true;
        $("#block_game").css("display","block");
        
        if(DISABLE_SOUND_MOBILE === false || s_bMobile === false){
            Howler.mute(true);
        }
        
    };

    this.startUpdate = function(){
        s_iPrevTime = new Date().getTime();
        _bUpdate = true;
        createjs.Ticker.paused = false;
        $("#block_game").css("display","none");
        
        if(DISABLE_SOUND_MOBILE === false || s_bMobile === false){
            if(s_bAudioActive){
                Howler.mute(false);
            }
        }
        
    };
    
    this._update = function(event){
        if(_bUpdate === false){
                return;
        }
                
        var iCurTime = new Date().getTime();
        s_iTimeElaps = iCurTime - s_iPrevTime;
        s_iCntTime += s_iTimeElaps;
        s_iCntFps++;
        s_iPrevTime = iCurTime;
        
        if ( s_iCntTime >= 1000 ){
            s_iCurFps = s_iCntFps;
            s_iCntTime-=1000;
            s_iCntFps = 0;
        }
                
        if(_iState === STATE_GAME){
            _oGame.update();
        }
        
        s_oStage.update(event);

    };
    
    s_oMain = this;
    _oData = oData;
    ENABLE_FULLSCREEN = _oData.fullscreen;
    ENABLE_CHECK_ORIENTATION = _oData.check_orientation;
    SHOW_CREDITS = _oData.show_credits;
    s_bAudioActive = oData.audio_enable_on_startup;

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