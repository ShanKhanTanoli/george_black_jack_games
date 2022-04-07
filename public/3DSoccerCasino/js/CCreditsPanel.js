function CCreditsPanel(){
    var _oHitArea;
    var _oPanelContainer;
    var _oButExit;
    var _oLogo;
    
    this._init = function(){
        
        _oPanelContainer = new createjs.Container();   
        s_oStage.addChild(_oPanelContainer);
        
        
        var oSprite = s_oSpriteLibrary.getSprite('msg_box');
        var oPanel = createBitmap(oSprite);        
        _oPanelContainer.addChild(oPanel);
        
        _oHitArea = new createjs.Shape();
        _oHitArea.graphics.beginFill("#0f0f0f").drawRect(0, 0, CANVAS_WIDTH, CANVAS_HEIGHT);
        _oHitArea.alpha = 0.01;
        _oHitArea.on("click", this._onLogoButRelease);
        _oPanelContainer.addChild(_oHitArea);
        
        var oTitleStroke = new createjs.Text(TEXT_DEVELOPED," 34px "+FONT_GAME_1, "#000000");
        oTitleStroke.x = CANVAS_WIDTH/2;
        oTitleStroke.y = 336;
        oTitleStroke.textAlign = "center";
        oTitleStroke.textBaseline = "middle";
        oTitleStroke.lineWidth = 300;
        oTitleStroke.outline = 5;
        _oPanelContainer.addChild(oTitleStroke);

        var oTitle = new createjs.Text(TEXT_DEVELOPED," 34px "+FONT_GAME_1, "#ffffff");
        oTitle.x = CANVAS_WIDTH/2;
        oTitle.y = oTitleStroke.y
        oTitle.textAlign = "center";
        oTitle.textBaseline = "middle";
        oTitle.lineWidth = 300;
        _oPanelContainer.addChild(oTitle);
        
        var oLinkStroke = new createjs.Text("www.codethislab.com"," 34px "+FONT_GAME_1, "#000000");
        oLinkStroke.x = CANVAS_WIDTH/2;
        oLinkStroke.y = 460;
        oLinkStroke.textAlign = "center";
        oLinkStroke.textBaseline = "middle";
        oLinkStroke.lineWidth = 300;
        oLinkStroke.outline = 5;
        _oPanelContainer.addChild(oLinkStroke);

        var oLink = new createjs.Text("www.codethislab.com"," 34px "+FONT_GAME_1, "#ffffff");
        oLink.x = CANVAS_WIDTH/2;
        oLink.y = oLinkStroke.y;
        oLink.textAlign = "center";
        oLink.textBaseline = "middle";
        oLink.lineWidth = 300;
        _oPanelContainer.addChild(oLink);
        
        var oSprite = s_oSpriteLibrary.getSprite('ctl_logo');
        _oLogo = createBitmap(oSprite);
        _oLogo.regX = oSprite.width/2;
        _oLogo.regY = oSprite.height/2;
        _oLogo.x = CANVAS_WIDTH/2;
        _oLogo.y = CANVAS_HEIGHT/2;
        _oPanelContainer.addChild(_oLogo);
      
        var oSprite = s_oSpriteLibrary.getSprite('but_exit_info');
        _oButExit = new CGfxButton(970, 264, oSprite, _oPanelContainer);
        _oButExit.addEventListener(ON_MOUSE_UP, this.unload, this);
        
        _oPanelContainer.alpha = 0;
        createjs.Tween.get(_oPanelContainer).to({alpha:1 }, 1000,createjs.Ease.cubicOut);
    };
    
    this.unload = function(){
        _oButExit.unload();

        _oHitArea.off("mousedown",this._onLogoButRelease);  
        
        s_oStage.removeChild(_oPanelContainer);
    };
    
    this._onLogoButRelease = function(){
        window.open("http://www.codethislab.com/index.php?&l=en");
    };

    
    this._init();
    
    
};


