function CStaticSymbolCell(iRow,iCol,iXPos,iYPos){
    var _iNumCycles;
    var _iTotAnimCycle;
    var _iRow;
    var _iCol;
    var _iStartX;
    var _iStartY;
    var _iCurSpriteAnimating = -1;
    var _iLastAnimFrame;
    var _aSprites;
    var _oWinningFrame;
    var _oAmountText;
    var _oAmountTextBack;
    var _oAmountBg;
    var _oImageAttach;
    var _oContainer;
    var _oThis;
    
    this._init = function(iRow,iCol,iXPos,iYPos){
        _iRow = iRow;
        _iCol = iCol;
        _iStartX = iXPos;
        _iStartY = iYPos;
        _iNumCycles = 0;
        
        _oContainer = new createjs.Container();
        _oContainer.visible = false;
        s_oAttachSection.addChild(_oContainer);
        
        _oImageAttach = new createjs.Container();
        _oImageAttach.visible = false;
        _oImageAttach.x = iXPos;
        _oImageAttach.y = iYPos;
        _oContainer.addChild(_oImageAttach);
        
        var oParent= this;
        _aSprites = new Array();
        for(var i=0;i<NUM_SYMBOLS;i++){
                var oSprite = createSprite(s_aSymbolAnims[i], "static",0,0,SYMBOL_ANIM_WIDTH,SYMBOL_ANIM_HEIGHT);
                oSprite.stop();
                oSprite.on("animationend", oParent._onAnimEnded, null, false);
                _oImageAttach.addChild(oSprite);

                _aSprites[i] = oSprite;
                _aSprites[i].visible = false;
        }
        
        var oSpriteAmount = s_oSpriteLibrary.getSprite("amount_win_bg");
        _oAmountBg = createBitmap(oSpriteAmount);
        _oAmountBg.regX = oSpriteAmount.width/2;
        _oAmountBg.regY = oSpriteAmount.height/2;
        _oAmountBg.x = SYMBOL_ANIM_WIDTH/2;
        _oAmountBg.y = SYMBOL_ANIM_HEIGHT;
        _oImageAttach.addChild(_oAmountBg);
        
        _oAmountTextBack = new createjs.Text("","48px "+FONT_GAME_1, "#000");
        _oAmountTextBack.textAlign = "center";
        _oAmountTextBack.textBaseline = "alphabetic";
        _oAmountTextBack.x = SYMBOL_ANIM_WIDTH/2 + 2;
        _oAmountTextBack.y = SYMBOL_ANIM_HEIGHT + 17;
        _oImageAttach.addChild(_oAmountTextBack);
        
        _oAmountText = new createjs.Text("","48px "+FONT_GAME_1, "#ffd102");
        _oAmountText.textAlign = "center";
        _oAmountText.textBaseline = "alphabetic";
        _oAmountText.x = SYMBOL_ANIM_WIDTH/2;
        _oAmountText.y = SYMBOL_ANIM_HEIGHT + 15;
        _oImageAttach.addChild(_oAmountText);
        
        var oData = {   // image to use
                        framerate: 20,
                        images: [s_oSpriteLibrary.getSprite('win_frame_anim')], 
                        // width, height & registration point of each sprite
                        frames: {width: SYMBOL_WIDTH, height: SYMBOL_HEIGHT}, 
                        animations: {  static: [0],anim:[1,19] }
        };

        var oSpriteSheet = new createjs.SpriteSheet(oData);
        
        _oWinningFrame = new createjs.Sprite(oSpriteSheet, "static",0,0,SYMBOL_WIDTH,SYMBOL_HEIGHT);
        _oWinningFrame.stop();
        _oWinningFrame.x = iXPos;
        _oWinningFrame.y = iYPos;
        _oContainer.addChild(_oWinningFrame);
    };
    
    this.unload = function(){
        s_oAttachSection.removeChild(_oContainer);
    };
    
    this.hide = function(){
         if(_iCurSpriteAnimating > -1){
             var iValue = _iCurSpriteAnimating+1;
             if(iValue === 9 || iValue === 10 || iValue === 11){
                stopSound("symbol9_10_11");
            }else{
                stopSound("symbol"+iValue);
            }
             
            _oWinningFrame.gotoAndStop("static"); 
            _oWinningFrame.visible = false;
            _oAmountBg.visible = false;
            _oAmountText.text = "";
            _oAmountTextBack.text = "";
            _aSprites[_iCurSpriteAnimating].gotoAndPlay("static");
            _aSprites[_iCurSpriteAnimating].visible = false;
            _oContainer.visible = false;
            _iCurSpriteAnimating = -1;
        }
    };
    
    this.show = function(iValue,iAmountWin,oPos,oRegPoint,iAnimCycle){
        _iNumCycles = 0;
        _iTotAnimCycle = iAnimCycle;

        for(var i=0;i<NUM_SYMBOLS;i++){
            if( (i+1) === iValue){
                _aSprites[i].visible = true;
            }else{
                _aSprites[i].visible = false;
            }
        }
        _oAmountBg.visible = false;
        if(iAmountWin > 0){
            _oAmountText.text = "x"+iAmountWin;
            _oAmountTextBack.text = "x"+iAmountWin;
            _oAmountBg.visible = true;
        }
        
        
        _aSprites[iValue-1].gotoAndPlay("anim");
        _iCurSpriteAnimating = iValue-1;

        _iLastAnimFrame = _aSprites[iValue-1].spriteSheet.getNumFrames();
        _oImageAttach.regX = oRegPoint.x;
        _oImageAttach.regY = oRegPoint.y;
        _oImageAttach.x = _iStartX + oPos.x;
        _oImageAttach.y = _iStartY + oPos.y;
        _oImageAttach.scaleX = _oImageAttach.scaleY = 0.5;
        _oImageAttach.visible = true;
        _oImageAttach.alpha = 1;
        _oContainer.visible= true;
        
        createjs.Tween.get(_oImageAttach).to({scaleX:1,scaleY:1 }, 1500,createjs.Ease.cubicOut);
        
        if(iValue === 9 || iValue === 10 || iValue === 11){
            playSound("symbol9_10_11",1,false);
        }else{
            playSound("symbol"+iValue,1,false);
        }
        
    };
    
    this.showWinFrame = function(){
        _oWinningFrame.gotoAndPlay("anim");
        _oWinningFrame.visible = true;
        _oContainer.visible = true;
    };
    
    this.hideWinFrame = function(){
        _oWinningFrame.gotoAndPlay("static");
        _oWinningFrame.visible = false;
        _oContainer.visible = false;
    };
    
    this._onAnimEnded = function(){
        _iNumCycles++;
        if(_iNumCycles === _iTotAnimCycle && _iCurSpriteAnimating > -1){
            //END WHOLE SYMBOL ANIMATION
            _aSprites[_iCurSpriteAnimating].stop();
            createjs.Tween.get(_oImageAttach).to({scaleX:0.52,scaleY:0.52 ,alpha:0}, 500,createjs.Ease.cubicOut).call(function(){_oThis.stopAnim();s_oGame.showWin();});
        }
    };
    
    this.stopAnim = function(){
        var iValue = _iCurSpriteAnimating+1;
        if(iValue === 9 || iValue === 10 || iValue === 11){
             stopSound("symbol9_10_11");
        }else{
            stopSound("symbol"+iValue);
        }
       
       _aSprites[_iCurSpriteAnimating].visible = false;
       _oImageAttach.visible = false;
       
       _oWinningFrame.gotoAndStop("static");
       _oWinningFrame.visible = false;
    };
    
    _oThis = this;
    this._init(iRow,iCol,iXPos,iYPos);
}