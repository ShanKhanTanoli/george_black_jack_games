function CInterface(iCurBet,iTotBet,iMoney){
    var _aLinesBut;
    var _aPayline;
    var _oButExit;
    var _oSpinBut;
    var _oAutoSpinBut;
    var _oInfoBut;
    var _oAddLineBut;
    var _oAudioToggle;
    var _oBetCoinBut;
    var _oMaxBetBut;
    var _pStartPosAudio;
    var _pStartPosExit;
    var _pStartPosFullscreen;
    
    var _oButFullscreen;
    var _fRequestFullScreen = null;
    var _fCancelFullScreen = null;
    var _oCoinText;
    var _oMoneyText;
    var _oTotalBetText;
    var _oNumLinesText;
    var _oWinText;
    var _oFreeSpinNumText;
    
    this._init = function(iCurBet,iTotBet,iMoney){
        
        var oSprite = s_oSpriteLibrary.getSprite('but_exit');
        _pStartPosExit = {x:CANVAS_WIDTH - (oSprite.width/2) - 2,y:(oSprite.height/2) + 2};
        _oButExit = new CGfxButton(_pStartPosExit.x,_pStartPosExit.y,oSprite,s_oAttachSection);
        _oButExit.addEventListener(ON_MOUSE_UP, this._onExit, this);
        
        if(DISABLE_SOUND_MOBILE === false || s_bMobile === false){
            var oSprite = s_oSpriteLibrary.getSprite('audio_icon')
            _pStartPosAudio = {x:_pStartPosExit.x - (oSprite.width/2) - 2,y:(oSprite.height/2) + 2};
            _oAudioToggle = new CToggle(_pStartPosAudio.x,_pStartPosAudio.y,oSprite,s_bAudioActive,s_oAttachSection);
            _oAudioToggle.addEventListener(ON_MOUSE_UP, this._onAudioToggle, this);
            
            _pStartPosFullscreen = {x:_pStartPosAudio.x - oSprite.width/2 - 2,y:oSprite.height/2 + 2};
        }else{
            oSprite = s_oSpriteLibrary.getSprite('but_fullscreen');
            _pStartPosFullscreen = {x:_pStartPosExit.x - (oSprite.width/2) - 2,y:(oSprite.height/2) + 2};
        }
        
        var doc = window.document;
        var docEl = doc.documentElement;
        _fRequestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
        _fCancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;
        
        if(ENABLE_FULLSCREEN === false){
            _fRequestFullScreen = false;
        }
        
        if (_fRequestFullScreen){
            oSprite = s_oSpriteLibrary.getSprite('but_fullscreen');
            _oButFullscreen = new CToggle(_pStartPosFullscreen.x,_pStartPosFullscreen.y,oSprite,s_bFullscreen,s_oAttachSection);
            _oButFullscreen.addEventListener(ON_MOUSE_UP, this._onFullscreenRelease, this);
        }
        
        var oSpinBg = createBitmap(s_oSpriteLibrary.getSprite('spin_bg'));
        oSpinBg.x = 1040;
        oSpinBg.y = 551;
        s_oAttachSection.addChild(oSpinBg);
        
        oSprite = s_oSpriteLibrary.getSprite('but_autospin');
        _oAutoSpinBut = new CTextButton(1030 + (oSprite.width/2),595 ,oSprite,TEXT_AUTOSPIN,FONT_GAME,"#ffffff",22,s_oAttachSection);  
        _oAutoSpinBut.addEventListener(ON_MOUSE_UP, this._onAutoSpin, this);

        oSprite = s_oSpriteLibrary.getSprite('spin_but');
        _oSpinBut = new CTextButton(1111 + (oSprite.width/2),595 ,oSprite,TEXT_SPIN,FONT_GAME,"#ffffff",26,s_oAttachSection);  
        _oSpinBut.addEventListener(ON_MOUSE_UP, this._onSpin, this);

        oSprite = s_oSpriteLibrary.getSprite('info_but');
        _oInfoBut = new CTextButton(296 + (oSprite.width/2),595,oSprite,TEXT_INFO,FONT_GAME,"#ffffff",30,s_oAttachSection);        
        _oInfoBut.addEventListener(ON_MOUSE_UP, this._onInfo, this);
        
        oSprite = s_oSpriteLibrary.getSprite('but_lines_bg');
        _oAddLineBut = new CTextButton(436 + (oSprite.width/2),595,oSprite,TEXT_LINES,FONT_GAME,"#ffffff",30,s_oAttachSection);
        _oAddLineBut.addEventListener(ON_MOUSE_UP, this._onAddLine, this);
        
        oSprite = s_oSpriteLibrary.getSprite('coin_but');
        _oBetCoinBut = new CTextButton(620 + (oSprite.width/2),595,oSprite,TEXT_COIN,FONT_GAME,"#ffffff",30,s_oAttachSection);
        _oBetCoinBut.addEventListener(ON_MOUSE_UP, this._onBet, this);
        
        oSprite = s_oSpriteLibrary.getSprite('but_maxbet_bg');
        _oMaxBetBut = new CTextButton(805 + (oSprite.width/2),595,oSprite,TEXT_MAX_BET,FONT_GAME,"#ffffff",30,s_oAttachSection);
        _oMaxBetBut.addEventListener(ON_MOUSE_UP, this._onMaxBet, this);

	_oMoneyText = new CTLText(s_oAttachSection, 
                    341, 20, 128, 50, 
                    24, "center", "#ffde00", FONT_GAME, 1,
                    0, 0,
                    TEXT_MONEY +"\n"+iMoney.toFixed(2)+TEXT_CURRENCY,
                    true, true, true,
                    false );

        
        _oNumLinesText = new CTLText(s_oAttachSection, 
                    460, CANVAS_HEIGHT - 118, 134, 30, 
                    30, "center", "#ffffff", FONT_GAME, 1,
                    0, 0,
                    NUM_PAYLINES,
                    true, true, false,
                    false );
        _oNumLinesText.setShadow("#000",1,1,2);
        
        _oCoinText = new CTLText(s_oAttachSection, 
                    644, CANVAS_HEIGHT - 118, 134, 30, 
                    30, "center", "#ffffff", FONT_GAME, 1,
                    0, 0,
                    iCurBet.toFixed(2),
                    true, true, false,
                    false );
        _oCoinText.setShadow("#000",1,1,2);
        


        _oTotalBetText = new CTLText(s_oAttachSection, 
                    827, CANVAS_HEIGHT - 118, 174, 30, 
                    30, "center", "#ffffff", FONT_GAME, 1,
                    0, 0,
                    TEXT_BET +": "+iTotBet.toFixed(2),
                    true, true, false,
                    false );
        _oTotalBetText.setShadow("#000",1,1,2);
        
        _oWinText = new CTLText(s_oAttachSection, 
                    1049, CANVAS_HEIGHT - 118, 134, 30, 
                    30, "center", "#ffde00", FONT_GAME, 1,
                    0, 0,
                    " ",
                    true, true, false,
                    false );
                    
        _oWinText.setShadow("#000",1,1,2);         
        
        _oFreeSpinNumText = new createjs.Text("","54px "+FONT_GAME, "#ffde00");
        _oFreeSpinNumText.x = 974;
        _oFreeSpinNumText.y = 59;
        _oFreeSpinNumText.textAlign = "center";
        _oFreeSpinNumText.textBaseline = "alphabetic";
        s_oAttachSection.addChild(_oFreeSpinNumText);
        
        oSprite = s_oSpriteLibrary.getSprite('bet_but');
        _aLinesBut = new Array();
        
        var iHalfButHeight = oSprite.height/2;
        var iPadding = 11;
        var iSpriteHeight = 32;
        var iYOffset = 84 + iHalfButHeight;
        
        
        //LINE 4
        var oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,4);
        _aLinesBut[3] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
                
        //LINE 2
        oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,2);
        _aLinesBut[1] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 20
        oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,20);
        _aLinesBut[19] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 16
        oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,16);
        _aLinesBut[15] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 10
        oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,10);
        _aLinesBut[9] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 1
        oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,1);
        _aLinesBut[0] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding +1;
        
        //LINE 11
        oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,11);
        _aLinesBut[10] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding ;
        
        //LINE 17
        oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,17);
        _aLinesBut[16] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 3
        oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,3);
        _aLinesBut[2] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 5
        oBut = new CBetBut( 319 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,5);
        _aLinesBut[4] = oBut;
        
        iYOffset = 84 + iHalfButHeight;
        
        //LINE 14
        var oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,14);
        _aLinesBut[13] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 12
        oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,12);
        _aLinesBut[11] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 9
        oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,9);
        _aLinesBut[8] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 18
        oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,18);
        _aLinesBut[17] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 6;
        oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,6);
        _aLinesBut[5] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding+1;
        
        //LINE 7;
        oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,7);
        _aLinesBut[6] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 19;
        oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,19);
        _aLinesBut[18] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 8
        oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,8);
        _aLinesBut[7] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 13
        oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,13);
        _aLinesBut[12] = oBut;
        
        iYOffset+= iSpriteHeight + iPadding;
        
        //LINE 15
        oBut = new CBetBut( 1130 + oSprite.width/2, iYOffset,oSprite,true);
        oBut.addEventListenerWithParams(ON_MOUSE_UP, this._onBetLineClicked, this,15);
        _aLinesBut[14] = oBut;
        
        _aPayline = new Array();
        for(var k = 0;k<NUM_PAYLINES;k++){
            var oBmp = createBitmap(s_oSpriteLibrary.getSprite('payline_'+(k+1) ));
            oBmp.visible = false;
            s_oAttachSection.addChild(oBmp);
            _aPayline[k] = oBmp;
        }
        
        this.refreshButtonPos (s_iOffsetX,s_iOffsetY);
    };
    
    this.unload = function(){
        _oButExit.unload();
        _oButExit = null;
        _oSpinBut.unload();
        _oSpinBut = null;
        _oAutoSpinBut.unload();
        _oAutoSpinBut = null;
        _oInfoBut.unload();
        _oInfoBut = null;
        _oAddLineBut.unload();
        _oAddLineBut = null;
        _oBetCoinBut.unload();
        _oBetCoinBut = null;
        _oMaxBetBut.unload();
        _oMaxBetBut = null;
        
        if(DISABLE_SOUND_MOBILE === false){
            _oAudioToggle.unload();
            _oAudioToggle = null;
        }

        if (_fRequestFullScreen && screenfull.isEnabled){
            _oButFullscreen.unload();
        }
        
        for(var i=0;i<NUM_PAYLINES;i++){
            _aLinesBut[i].unload();
        }
        
        s_oInterface = null;
    };
    
    this.refreshButtonPos = function(iNewX,iNewY){
        _oButExit.setPosition(_pStartPosExit.x - iNewX,iNewY + _pStartPosExit.y);
        if(DISABLE_SOUND_MOBILE === false || s_bMobile === false){
            _oAudioToggle.setPosition(_pStartPosAudio.x - iNewX,iNewY + _pStartPosAudio.y);
        }
        
        if (_fRequestFullScreen && screenfull.isEnabled){
            _oButFullscreen.setPosition(_pStartPosFullscreen.x - iNewX,_pStartPosFullscreen.y + iNewY);
        }
    };

    this.refreshMoney = function(iMoney){
        _oMoneyText.refreshText(TEXT_MONEY +"\n"+iMoney.toFixed(2)+TEXT_CURRENCY);
    };
    
    this.refreshBet = function(iBet){
        _oCoinText.refreshText(iBet.toFixed(2));
    };
    
    this.refreshTotalBet = function(iTotBet){
        _oTotalBetText.refreshText(TEXT_BET +": "+iTotBet.toFixed(2));
    };
    
    this.refreshNumLines = function(iLines){
        _oNumLinesText.refreshText(iLines);
        
        for(var i=0;i<NUM_PAYLINES;i++){
            if(i<iLines){
                _aLinesBut[i].setOn();
                _aPayline[i].visible = true;
            }else{
                _aLinesBut[i].setOff();
            }
        }
        
        setTimeout(function(){for(var i=0;i<NUM_PAYLINES;i++){
            _aPayline[i].visible = false;
        }},1000);
    };
    
    this.resetWin = function(){
        _oWinText.refreshText(" ");
    };
    
    this.refreshWinText = function(iWin){
        _oWinText.refreshText(TEXT_WIN + " "+iWin.toFixed(2));
    };
    
    this.refreshFreeSpinNum = function(iNum){
        _oFreeSpinNumText.text = iNum;
    };
    
    this.showLine = function(iLine){
        _aPayline[iLine-1].visible = true;
    };
    
    this.hideLine = function(iLine){
        _aPayline[iLine-1].visible = false;
    };
    
    this.hideAllLines = function(){
        for(var i=0;i<NUM_PAYLINES;i++){
            _aPayline[i].visible = false;
        }
    };
    
    this.disableBetBut = function(bDisable){
        for(var i=0;i<NUM_PAYLINES;i++){
            _aLinesBut[i].disable(bDisable);
        }
    };
    
    this.enableGuiButtons = function(){
        _oSpinBut.enable();
        _oAutoSpinBut.setText(TEXT_AUTOSPIN);
        _oAutoSpinBut.enable();
        _oMaxBetBut.enable();
        _oBetCoinBut.enable();
        _oAddLineBut.enable();
        _oInfoBut.enable();
    };
	
    this.enableSpin = function(){
        _oSpinBut.enable();
        _oAutoSpinBut.setText(TEXT_AUTOSPIN);
        _oAutoSpinBut.enable();
        _oMaxBetBut.enable();
    };
    
    this.enableAutoSpin = function(){
        _oAutoSpinBut.enable();
    };

    this.disableSpin = function(bAutoSpin){
        _oSpinBut.disable();
        if(bAutoSpin){
            _oAutoSpinBut.setText(TEXT_STOP_AUTO);
        }else{
            _oAutoSpinBut.disable();
        }
        _oMaxBetBut.disable();
    };
    
    this.disableAutoSpin = function(){
        _oAutoSpinBut.disable();
    };
    
    this.disableGuiButtons = function(bAutoSpin){
        _oSpinBut.disable();
        if(bAutoSpin){
            _oAutoSpinBut.setText(TEXT_STOP_AUTO);
        }else{
            _oAutoSpinBut.disable();
        }
        
        _oMaxBetBut.disable();
        _oBetCoinBut.disable();
        _oAddLineBut.disable();
        _oInfoBut.disable();
    };
    
    this._onBetLineClicked = function(iLine){
        this.refreshNumLines(iLine);
        
        s_oGame.activateLines(iLine);
    };
    
    this._onExit = function(){
        s_oGame.onExit();  
    };
    
    this._onSpin = function(){
        s_oGame.onSpin();
    };
    
    this._onAutoSpin = function(){
        
        if(_oAutoSpinBut.getText() === TEXT_AUTOSPIN){
            s_oGame.onAutoSpin();
        }else{
            _oAutoSpinBut.disable();
            _oAutoSpinBut.setText(TEXT_AUTOSPIN);
            
            s_oGame.onStopAutoSpin();
        }
        
    };
    
    this._onAddLine = function(){
        s_oGame.addLine();
    };
    
    this._onInfo = function(){
        s_oGame.onInfoClicked();
    };
    
    this._onBet = function(){
        s_oGame.changeCoinBet();
    };
    
    this._onMaxBet = function(){
        s_oGame.onMaxBet();
    };
    
    this._onAudioToggle = function(){
        Howler.mute(s_bAudioActive);
        s_bAudioActive = !s_bAudioActive;
    };
    
    this.resetFullscreenBut = function(){
	if (_fRequestFullScreen && screenfull.isEnabled){
		_oButFullscreen.setActive(s_bFullscreen);
	}
    };


    this._onFullscreenRelease = function(){
	if(s_bFullscreen) { 
		_fCancelFullScreen.call(window.document);
	}else{
		_fRequestFullScreen.call(window.document.documentElement);
	}
	
	sizeHandler();
    };
    
    s_oInterface = this;
    
    this._init(iCurBet,iTotBet,iMoney);
    
    return this;
}

var s_oInterface = null;