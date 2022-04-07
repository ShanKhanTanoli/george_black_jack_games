function CBonusPanel(){
    var _bInitGame;
    var _bSpriteLoaded = false;
    var _bShowing = false;
    var _iTimeIdle;
    var _iTimeWin;
    var _iGameState;
    var _iPrizeToShow;
    var _iCurAlpha;
    var _iEndBallX;
    var _iEndBallY;
    var _iMaskWidth;
    var _iMaskHeight;
    var _iCurResources;
    var _iTotResources;
    var _oMaskPreloader;
    
    var _oButUpLeft;
    var _oButCenterLeft;
    var _oButDownLeft;
    var _oButUpRight;
    var _oButCenterRight;
    var _oButDownRight;
    var _oStaticBall;
    var _oBall;
    var _oGoalKeeper;
    var _oPlayerKick;
    var _oResultPanel;
    var _oBgLoading;
    var _oLoadingText;
    var _oProgressBar;
    var _oContainer;
    
    this._init = function(){
        _iTimeIdle = 0;
        _iTimeWin = 0;
        _iCurAlpha = 0;
        _bInitGame = false;
        _bSpriteLoaded = true;
        _iGameState = -1;
        
        _oContainer.removeAllChildren();
        
        var oBg = createBitmap(s_oSpriteLibrary.getSprite('bg_bonus'));
        _oContainer.addChild(oBg);
        
        
        var oSprite = s_oSpriteLibrary.getSprite("ball_shadow")
        _oStaticBall = createBitmap(oSprite);
        _oStaticBall.x = CANVAS_WIDTH/2 - 100;
        _oStaticBall.y = CANVAS_HEIGHT - 330;
        _oContainer.addChild(_oStaticBall);
        
        _oBall = new CBonusBall(CANVAS_WIDTH/2,538,_oContainer);
        
        var oSpriteBall = s_oSpriteLibrary.getSprite("but_goal");
        _oButUpLeft = new CGfxButton(425,155,oSpriteBall,_oContainer);
        _oButUpLeft.addEventListenerWithParams(ON_MOUSE_UP,this._onShot,this,BONUS_BUTTON_1);
        
        _oButCenterLeft = new CGfxButton(495,235,oSpriteBall,_oContainer);
        _oButCenterLeft.addEventListenerWithParams(ON_MOUSE_UP,this._onShot,this,BONUS_BUTTON_2);
        
        _oButDownLeft = new CGfxButton(565,315,oSpriteBall,_oContainer);
        _oButDownLeft.addEventListenerWithParams(ON_MOUSE_UP,this._onShot,this,BONUS_BUTTON_3);
        
        _oButUpRight = new CGfxButton(1080,155,oSpriteBall,_oContainer);
        _oButUpRight.addEventListenerWithParams(ON_MOUSE_UP,this._onShot,this,BONUS_BUTTON_4);
        
        _oButCenterRight = new CGfxButton(1010,235,oSpriteBall,_oContainer);
        _oButCenterRight.addEventListenerWithParams(ON_MOUSE_UP,this._onShot,this,BONUS_BUTTON_5);
        
        _oButDownRight = new CGfxButton(940,315,oSpriteBall,_oContainer);
        _oButDownRight.addEventListenerWithParams(ON_MOUSE_UP,this._onShot,this,BONUS_BUTTON_6);
        
        _oGoalKeeper = new CBonusGoalkeeper(_oContainer);
        _oPlayerKick = new CBonusPlayer(646,0,_oContainer);
        
        this._startBonus();
    };
    
    this._loadAllResources = function(){
        _oContainer = new createjs.Container();
        _oContainer.on("click",function(){});
        s_oAttachSection.addChild(_oContainer);

        var oSprite = s_oSpriteLibrary.getSprite('bg_loading_bonus');
        _oBgLoading = createBitmap(oSprite);
        _oContainer.addChild(_oBgLoading);
        
        var oSprite = s_oSpriteLibrary.getSprite('progress_bar');
       _oProgressBar  = createBitmap(oSprite);
       _oProgressBar.x = CANVAS_WIDTH/2 - (oSprite.width/2);
       _oProgressBar.y = CANVAS_HEIGHT - 170;
       _oContainer.addChild(_oProgressBar);
       
       _iMaskWidth = oSprite.width;
       _iMaskHeight = oSprite.height;
       _oMaskPreloader = new createjs.Shape();
       _oMaskPreloader.graphics.beginFill("rgba(255,255,255,0.01)").drawRect(_oProgressBar.x, _oProgressBar.y, 1,_iMaskHeight);
       _oContainer.addChild(_oMaskPreloader);
       
       _oProgressBar.mask = _oMaskPreloader;
       
        _oLoadingText = new createjs.Text("","30px "+FONT_GAME_1, "#fff");
        _oLoadingText.x = CANVAS_WIDTH/2;
        _oLoadingText.y = CANVAS_HEIGHT - 125;
        _oLoadingText.shadow = new createjs.Shadow("#000", 2, 2, 2);
        _oLoadingText.textBaseline = "alphabetic";
        _oLoadingText.textAlign = "center";
        _oContainer.addChild(_oLoadingText);

        s_oSpriteLibrary.init( this._onResourceBonusLoaded,this._onAllImagesLoaded, this );
        //LOAD BONUS SPRITES
        s_oSpriteLibrary.addSprite("bg_bonus",window.location.origin +"/3DSoccerCasino/sprites/bonus/bg_bonus.jpg");
        s_oSpriteLibrary.addSprite("ball_shadow",window.location.origin +"/3DSoccerCasino/sprites/bonus/ball_shadow.png");
        s_oSpriteLibrary.addSprite("but_goal",window.location.origin +"/3DSoccerCasino/sprites/bonus/but_goal.png");
        s_oSpriteLibrary.addSprite("ball_anim",window.location.origin +"/3DSoccerCasino/sprites/bonus/ball_anim.png");
        s_oSpriteLibrary.addSprite("bonus_panel_bg",window.location.origin +"/3DSoccerCasino/sprites/bonus/bonus_panel_bg.png");
        
        
        for(var k=0;k<23;k++){
            s_oSpriteLibrary.addSprite("gk_idle_"+k,window.location.origin +"/3DSoccerCasino/sprites/bonus/goalkeeper_idle/gk_idle_"+k+".png");
        }
        
        for(var s=0;s<33;s++){
            s_oSpriteLibrary.addSprite("gk_save_left_"+s,window.location.origin +"/3DSoccerCasino/sprites/bonus/goalkeeper_save_left/gk_save_left_"+s+".png");
            s_oSpriteLibrary.addSprite("gk_save_right_"+s,window.location.origin +"/3DSoccerCasino/sprites/bonus/goalkeeper_save_right/gk_save_right_"+s+".png");
        }
        
        for(var t=0;t<30;t++){
            s_oSpriteLibrary.addSprite("player_"+t,window.location.origin +"/3DSoccerCasino/sprites/bonus/player/player_"+t+".png");
        }
        
        _iCurResources = 0;
       
       
        _iTotResources = s_oSpriteLibrary.getNumSprites() ;
        s_oSpriteLibrary.loadSprites();

        
        _bShowing = true;
    };
    
    // CALLBACK FOR LOADED RESOURCES
    this._onResourceBonusLoaded = function(){
        _iCurResources++;
        var iPerc = Math.floor(_iCurResources/_iTotResources *100);
        _oLoadingText.text = iPerc+"%";
        _oMaskPreloader.graphics.clear();
        var iNewMaskWidth = Math.floor((iPerc*_iMaskWidth)/100);
        _oMaskPreloader.graphics.beginFill("rgba(255,255,255,0.01)").drawRect(_oProgressBar.x, _oProgressBar.y, iNewMaskWidth,_iMaskHeight);
        
        if(_iCurResources === _iTotResources){
           this._init();
        }
    };
    
    this._onAllImagesLoaded = function(){
    };
    
    this.show = function(iPrize){
        _iPrizeToShow = iPrize;
        if(_bSpriteLoaded){
            this._startBonus();
        }else{
            this._loadAllResources();
        }
        
        $(s_oMain).trigger("bonus_start");
    };
    
    this.hide = function(){
        _bInitGame = false;
        _oContainer.off("click",function(){});
        _oContainer.visible = false;
        
        _oResultPanel.unload();
        this._enableAllButtons();
        _bShowing = false;
    };
    
    this._startBonus = function(){
        _oStaticBall.visible = true;
        _oGoalKeeper.show();
        
        _oContainer.on("click",function(){});
        _oContainer.visible = true;
        _bInitGame = true;
        _iGameState = STATE_BONUS_IDLE;
    }
    
    this._enableAllButtons = function(){
        _oButCenterLeft.setVisible(true);
        _oButCenterRight.setVisible(true);
        _oButDownLeft.setVisible(true);
        _oButDownRight.setVisible(true);
        _oButUpLeft.setVisible(true);
        _oButUpRight.setVisible(true);
    };
    
    this._disableAllButtons = function(){
        _oButCenterLeft.setVisible(false);
        _oButCenterRight.setVisible(false);
        _oButDownLeft.setVisible(false);
        _oButDownRight.setVisible(false);
        _oButUpLeft.setVisible(false);
        _oButUpRight.setVisible(false);
    };
    
    this._onShot = function(szType){
        s_oBonusPanel._disableAllButtons();
        
        switch(szType){
            case BONUS_BUTTON_1:{
                    _iEndBallX = _oButUpLeft.getX();
                    _iEndBallY = _oButUpLeft.getY();
                    break;
            }
            case BONUS_BUTTON_2:{
                    _iEndBallX = _oButCenterLeft.getX();
                    _iEndBallY = _oButCenterLeft.getY();
                    break;
            }
            case BONUS_BUTTON_3:{
                    _iEndBallX = _oButDownLeft.getX();
                    _iEndBallY = _oButDownLeft.getY();
                    break;
            }
            case BONUS_BUTTON_4:{
                    _iEndBallX = _oButUpRight.getX();
                    _iEndBallY = _oButUpRight.getY();
                    break;
            }
            case BONUS_BUTTON_5:{
                    _iEndBallX = _oButCenterRight.getX();
                    _iEndBallY = _oButCenterRight.getY();
                    break;
            }
            case BONUS_BUTTON_6:{
                    _iEndBallX = _oButDownRight.getX();
                    _iEndBallY = _oButDownRight.getY();
                    break;
            }
        }
        
        _iGameState = STATE_BONUS_KICK;
        _oPlayerKick.show();
    };  
    
    this.kick = function(){
        playSound("kick",1,false);
        _oStaticBall.visible = false;
        _oBall.show(_iEndBallX,_iEndBallY);

        _oGoalKeeper.dive(Math.round(Math.random() + 1));
    };
    
    this.ballArrived = function(){
        _iGameState = STATE_BONUS_WIN;
        new CScoreText(_iPrizeToShow,_iEndBallX,_iEndBallY);
        setTimeout(function(){_oResultPanel = new CBonusResultPanel(_iPrizeToShow,_oContainer)},2000);
    };
    
    this.unload = function(){
        this.hide();
        
        s_oGame.exitFromBonus();
    };
    
    this.isVisible = function(){
        return _bShowing;
    };
    
    this.update = function(){
	if(_bInitGame){
            switch(_iGameState) {
                case STATE_BONUS_IDLE:{
                        _oGoalKeeper.update();
                        break;
                } 
                case STATE_BONUS_KICK: {
                        _oGoalKeeper.update();
                        _oPlayerKick.update();
                        _oBall.update();
                        break;              

                }   

            }
        }
        
    };
    
    s_oBonusPanel = this;

}

var s_oBonusPanel = null;