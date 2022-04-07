function CBonusResultPanel(iPrize,oParentContainer){
    var _oFade;
    var _oContainer;
    var _oParentContainer;
    
    this._init = function(iPrize){
        _oFade = new createjs.Shape();
        _oFade.graphics.beginFill("black").drawRect(0,0,CANVAS_WIDTH,CANVAS_HEIGHT);
        _oFade.alpha = 0;
        _oParentContainer.addChild(_oFade);
        
        _oContainer = new createjs.Container();
        _oContainer.x = -CANVAS_WIDTH/2;
        _oContainer.y = CANVAS_HEIGHT/2;
        _oParentContainer.addChild(_oContainer);
        
        var oSprite = s_oSpriteLibrary.getSprite("bonus_panel_bg");
        var oBg = createBitmap(oSprite);
        oBg.regX = oSprite.width/2;
        oBg.regY = oSprite.height/2;
        _oContainer.addChild(oBg);
        
        var oCongratsText = new createjs.Text(TEXT_CONGRATS,"52px "+FONT_GAME_1, "#fff");
        oCongratsText.textAlign="center";
        oCongratsText.y =  -110;
        oCongratsText.shadow = new createjs.Shadow("#000", 1, 1, 1);
        _oContainer.addChild(oCongratsText);
        
        var oWonText = new createjs.Text(TEXT_YOU_WIN+"\nX"+iPrize,"50px "+FONT_GAME_1, "#fff");
        oWonText.y = 10;
        oWonText.textAlign="center";
        oWonText.lineHeight = 50;
        oWonText.shadow = new createjs.Shadow("#000", 1, 1, 1);
        _oContainer.addChild(oWonText);

        createjs.Tween.get(_oContainer).to({x:CANVAS_WIDTH/2 }, 1000,createjs.Ease.cubicOut).call(function(){
                                                                        createjs.Tween.get(_oFade).to({alpha:0.6}, 400); 
                                                            }).call(function(){
                                                                        setTimeout(function(){s_oBonusPanel.unload();},2000);
                                                                            });
                                                                            
        playSound("bonus_win",1,false);                                                                    
    };
    
    this.unload = function(){
        _oParentContainer.removeChild(_oFade);
        _oParentContainer.removeChild(_oContainer);
    };
    
    _oParentContainer = oParentContainer;
    this._init(iPrize);
}