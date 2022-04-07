function CBetBut(iXPos,iYPos,oSprite,szText,szFont,szColor,iFontSize,oParentContainer){
    var _bDisable;
    var _iWidth;
    var _aCbCompleted;
    var _aCbOwner;
    var _aParams = [];

    var _oButton;
    var _oContainer;
    var _oParentContainer;
    
    this._init = function(iXPos,iYPos,oSprite,szText,szFont,szColor,iFontSize){
        _bDisable = false;
        
        _aCbCompleted=new Array();
        _aCbOwner =new Array();
        
        _oContainer = new createjs.Container();
        _oContainer.x = iXPos;
        _oContainer.y = iYPos;
        _oParentContainer.addChild(_oContainer);
               
        var oData = {   // image to use
                        images: [oSprite], 
                        // width, height & registration point of each sprite
                        frames: {width: oSprite.width/2, height: oSprite.height}, 
                        animations: {  on: [0, 1],off:[1,2] }
       };
       
        var oSpriteSheet = new createjs.SpriteSheet(oData);
        _oButton = createSprite(oSpriteSheet, "on",0,0,oSprite.width/2,oSprite.height);
        _oButton.stop();          
        _oButton.cursor = "pointer";
        _oContainer.addChild(_oButton);
        
        _iWidth = oSprite.width/2;
        this._initListener();
    };
    
    this.unload = function(){
       _oButton.off("mousedown", this.buttonDown);
       _oButton.off("pressup" , this.buttonRelease); 
       
       _oParentContainer.removeChild(_oButton);
    };
    
    this.disable = function(bDisable){
        _bDisable = bDisable;
    };
    
    this.setVisible = function(bVisible){
        _oButton.visible = bVisible;
    };
    
    this.setOn = function(){
        _oButton.gotoAndStop("on");
    };
    
    this.setOff = function(){
        _oButton.gotoAndStop("off");
    };
    
    this._initListener = function(){
       _oButton.on("mousedown", this.buttonDown);
       _oButton.on("pressup" , this.buttonRelease);      
    };
    
    this.addEventListener = function( iEvent,cbCompleted, cbOwner ){
        _aCbCompleted[iEvent]=cbCompleted;
        _aCbOwner[iEvent] = cbOwner; 
    };
    
    this.addEventListenerWithParams = function(iEvent,cbCompleted, cbOwner,aParams){
        _aCbCompleted[iEvent]=cbCompleted;
        _aCbOwner[iEvent] = cbOwner;
        _aParams = aParams;
    };
    
    this.buttonRelease = function(){
        if(_aCbCompleted[ON_MOUSE_UP] && _bDisable === false){
            playSound("press_but",1,false);
            
            _aCbCompleted[ON_MOUSE_UP].call(_aCbOwner[ON_MOUSE_UP],_aParams);
        }
    };
    
    this.buttonDown = function(){
       if(_aCbCompleted[ON_MOUSE_DOWN] && _bDisable === false){
           _aCbCompleted[ON_MOUSE_DOWN].call(_aCbOwner[ON_MOUSE_DOWN],_aParams);
       }
    };
    
    this.setPosition = function(iXPos,iYPos){
         _oButton.x = iXPos;
         _oButton.y = iYPos;
    };
    
    this.setX = function(iXPos){
         _oButton.x = iXPos;
    };
    
    this.setY = function(iYPos){
         _oButton.y = iYPos;
    };
    
    this.getButtonImage = function(){
        return _oButton;
    };
    
    
    this.getX = function(){
        return _oButton.x;
    };
    
    this.getY = function(){
        return _oButton.y;
    };
    
    _oParentContainer = oParentContainer;
    this._init(iXPos,iYPos,oSprite,szText,szFont,szColor,iFontSize);
}