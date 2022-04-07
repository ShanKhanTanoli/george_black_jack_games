function CPayTablePanel(){
    var _iCurPage;
    var _aNumSymbolComboText;
    var _aWinComboText;
    var _aPages;
    var _pStartPosCredits;
    var _oCurPage;
    
    var _oButExit;
    var _oButArrowNext;
    var _oButArrowPrev;
    var _oContainer;
    var _oButCredits;
    
    this._init = function(){
        _iCurPage = 0;
        _aPages = new Array();
        
        _oContainer = new createjs.Container();
        _oContainer.on("click",function(){});
        _oContainer.visible = false;
        s_oAttachSection.addChild(_oContainer);
        
        //ATTACH PAGE 1
        var oContainerPage = new createjs.Container();
        _oContainer.addChild(oContainerPage);
        
        var oBg = createBitmap(s_oSpriteLibrary.getSprite('paytable1'));
        oContainerPage.addChild(oBg);
        
        //LIST OF COMBO TEXT

        this._createPayouts(oContainerPage);
        
        _aPages[0] = oContainerPage;
        
        //ATTACH PAGE 2
        oContainerPage = new createjs.Container();
        oContainerPage.visible = false;
        _oContainer.addChild(oContainerPage);
        
        oBg = createBitmap(s_oSpriteLibrary.getSprite('paytable2'));
        oContainerPage.addChild(oBg);

        _aPages[1] = oContainerPage;
        
        _oCurPage = _aPages[_iCurPage];
        
        //ATTACH PAGE 3
        oContainerPage = new createjs.Container();
        oContainerPage.visible = false;
        _oContainer.addChild(oContainerPage);
        
        oBg = createBitmap(s_oSpriteLibrary.getSprite('paytable3'));
        oContainerPage.addChild(oBg);
        
        var oText = new createjs.Text(TEXT_HELP_BONUS1,"28px "+FONT_GAME_1, "#fff");
        oText.textAlign = "center";
        oText.x = 976;
        oText.y = 264;
        oText.lineWidth = 400;
        oContainerPage.addChild(oText);
        
        var oText2 = new createjs.Text(TEXT_HELP_BONUS2,"40px "+FONT_GAME_1, "#fff");
        oText2.textAlign = "center";
        oText2.x = 976;
        oText2.y = 430;
        oText2.lineWidth = 400;
        oContainerPage.addChild(oText2);
        
        _aPages[2] = oContainerPage;
        
        //ATTACH PAGE 4
        oContainerPage = new createjs.Container();
        oContainerPage.visible = false;
        _oContainer.addChild(oContainerPage);
        
        oBg = createBitmap(s_oSpriteLibrary.getSprite('paytable4'));
        oContainerPage.addChild(oBg);
        
        var oText = new createjs.Text(TEXT_HELP_FREESPIN,"40px "+FONT_GAME_1, "#fff");
        oText.textAlign = "center";
        oText.x = CANVAS_WIDTH/2;
        oText.y = 420;
        oText.lineWidth = 400;
        oContainerPage.addChild(oText);
        
        _aPages[3] = oContainerPage;
        
        _oCurPage = _aPages[_iCurPage];

        //ATTACH ARROW
        _oButArrowNext = new CGfxButton(CANVAS_WIDTH - 290,CANVAS_HEIGHT - 160,s_oSpriteLibrary.getSprite('but_arrow_next'),_oContainer);
        _oButArrowNext.addEventListener(ON_MOUSE_UP, this._onNext, this);
        
        _oButArrowPrev = new CGfxButton(290,CANVAS_HEIGHT - 160,s_oSpriteLibrary.getSprite('but_arrow_prev'),_oContainer);
        _oButArrowPrev.addEventListener(ON_MOUSE_UP, this._onPrev, this);
        
        //ATTACH CREDITS BUTTON
        var oSprite = s_oSpriteLibrary.getSprite('but_credits');
        _pStartPosCredits = {x:oSprite.width/2 + 2,y:oSprite.height/2 + 2};
        _oButCredits = new CGfxButton(_pStartPosCredits.x,_pStartPosCredits.y,oSprite,_oContainer);
        _oButCredits.addEventListener(ON_MOUSE_UP, this._onCredits, this);
        
        var oSprite = s_oSpriteLibrary.getSprite('but_exit_info');
        _oButExit = new CGfxButton(1220, 154, oSprite, _oContainer);
        _oButExit.addEventListener(ON_MOUSE_UP, this._onExit, this);
    };
    
    this.unload = function(){
        _oContainer.off("click",function(){});
        _oButExit.unload();
        
        _oButArrowNext.unload();
        _oButArrowPrev.unload();
        _oButCredits.unload();
        
        s_oAttachSection.removeChild(_oContainer);
        
        for(var i=0;i<_aNumSymbolComboText.length;i++){
            _oContainer.removeChild(_aNumSymbolComboText[i]);
        }
        
        for(var j=0;j<_aWinComboText.length;j++){
            _oContainer.removeChild(_aWinComboText[j]);
        }
        
    };
    
    this._createPayouts = function(oContainerPage){
        _aNumSymbolComboText = new Array();
        _aWinComboText = new Array();
        
        var aPos = [{x:544,y:266},{x:764,y:266},{x:984,y:266},{x:435,y:376},{x:655,y:376},{x:875,y:376},{x:1095,y:376},{x:544,y:486},{x:764,y:486},{x:984,y:486}];
        var iCurPos = 0;
        for(var i=0;i<s_aSymbolWin.length;i++){
            var aSymbolPayouts = s_aSymbolWin[i];
            do{
                var iIndex = aSymbolPayouts.indexOf(0);
                if(iIndex !== -1){
                    aSymbolPayouts.splice(iIndex, 1);
                }
                
            }while(iIndex !== -1);
            
            var iLen = aSymbolPayouts.length;
            
            if(iLen === 0){
                continue;
            }
            
            var iOffsetY = 24;
            if(iLen === 4){
                iOffsetY = 18;
            }
            
            var iYPos = aPos[iCurPos].y;
            _aNumSymbolComboText[i] = new Array();
            _aWinComboText[i] = new Array();

            for(var j=0;j<iLen;j++){
                var oTextMult = new createjs.Text("X"+(5-j),"21px "+FONT_GAME_1, "#ffffff");
                oTextMult.textAlign = "center";
                oTextMult.x = aPos[iCurPos].x;
                oTextMult.y = iYPos;
                oTextMult.textBaseline = "alphabetic";
                oContainerPage.addChild(oTextMult);

                _aNumSymbolComboText[i][j] = oTextMult;
                
                var oText = new createjs.Text(aSymbolPayouts[iLen-j-1],"21px "+FONT_GAME_1, "#ffff00");
                oText.textAlign = "center";
                oText.x = oTextMult.x + 50;
                oText.y = oTextMult.y;
                oText.textBaseline = "alphabetic";
                oContainerPage.addChild(oText);

                _aWinComboText[i][j] = oText;
            
                iYPos += iOffsetY;
            }
            
            iCurPos++;
        }
    };
    
    this._onNext = function(){
        if(_iCurPage === _aPages.length-1){
            _iCurPage = 0;
        }else{
            _iCurPage++;
        }
        
        
        _oCurPage.visible = false;
        _aPages[_iCurPage].visible = true;
        _oCurPage = _aPages[_iCurPage];
    };
    
    this._onPrev = function(){
        if(_iCurPage === 0){
            _iCurPage = _aPages.length -1;
        }else{
            _iCurPage--;
        }
        
        
        _oCurPage.visible = false;
        _aPages[_iCurPage].visible = true;
        _oCurPage = _aPages[_iCurPage];
    };
    
    this._onCredits = function(){
        new CCreditsPanel();
    };
    
    this.refreshButtonPos = function(iNewX,iNewY){
        _oButCredits.setPosition(_pStartPosCredits.x + iNewX ,_pStartPosCredits.y + iNewY);
    };
    
    this.show = function(){
        _iCurPage = 0;
        _oCurPage.visible = false;
        _aPages[_iCurPage].visible = true;
        _oCurPage = _aPages[_iCurPage];
        
        _oContainer.visible = true;
    };
    
    this.hide = function(){
        _oContainer.visible = false;
    };
    
    this.resetHighlightCombo = function(){
        for(var i=0;i<_aNumSymbolComboText.length;i++){
            if(_aNumSymbolComboText[i] !== undefined){
                for(var j=0;j<_aNumSymbolComboText[i].length;j++){
                    _aNumSymbolComboText[i][j].color = "#ffffff";
                    _aWinComboText[i][j].color = "#ffff00";
                    createjs.Tween.removeTweens(_aWinComboText[i][j]);
                    _aWinComboText[i][j].alpha = 1;
                }
            }
            
        } 
    };
    
    this.highlightCombo = function(iSymbolValue,iNumCombo){
        
        _aWinComboText[iSymbolValue-1][NUM_REELS-iNumCombo].color = "#ff9000";
        
        this.tweenAlpha(_aWinComboText[iSymbolValue-1][NUM_REELS-iNumCombo],0);
        
    };
    
    this.tweenAlpha = function(oText,iAlpha){
        var oParent = this;
        createjs.Tween.get(oText).to({alpha:iAlpha}, 200).call(function(){if(iAlpha === 1){
                                                                                    oParent.tweenAlpha(oText,0);
                                                                                }else{
                                                                                    oParent.tweenAlpha(oText,1);
                                                                                }
        });
    };
    
    this._onExit = function(){
        s_oGame.hidePayTable();
    };
    
    this.isVisible = function(){
        return _oContainer.visible;
    };
    
    this._init();
}