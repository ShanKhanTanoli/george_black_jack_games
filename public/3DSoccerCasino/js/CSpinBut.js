//THIS CLASS CREATE THE SPIN BUTTON (NO TEXT INSIDE) WITH A SPRITESHEET (5 STATES: SPIN,STOP,AUTOSPIN,SKIP,DISABLE)
function CSpinBut(iXPos,iYPos,oSprite,iWidth,iHeight,oParentContainer){
    var _bDisable = false;
    var _bUpdate = false;
    var _iWidth;
    var _iHeight;
    var _iTimeElaps;
    var _szPrevState;
    var _aCbCompleted;
    var _aCbOwner;
    var _oButton;
    var _oButtonBg;
    var _oParentContainer;
    
    //INITIALIZE THE BUTTON
    this._init = function(iXPos,iYPos,oSprite,iWidth,iHeight){
        _aCbCompleted=new Array();
        _aCbOwner =new Array();
        
        _oButton = new createjs.Container();
        _oButton.x = iXPos;
        _oButton.y = iYPos;
        _oButton.regX = Math.floor(iWidth/2);
        _oButton.regY = Math.floor(iHeight/2);
        _oButton.cursor = "pointer";
        _oParentContainer.addChild(_oButton);
        
        var oData = {   // image to use
                        framerate: 1,
                        images: [oSprite], 
                        // width, height & registration point of each sprite
                        frames: {width: iWidth, height: iHeight}, 
                        animations: {  spin: [0],stop:[1],autospin:[2],skip:[3],freespin:[4],disable:[5] }
        };

        var oSpriteSheet = new createjs.SpriteSheet(oData);
        
        _oButtonBg = createSprite(oSpriteSheet, "spin",0,0,iWidth,iHeight);
        _oButtonBg.stop();
        _oButton.addChild(_oButtonBg);
        
        _iWidth = iWidth;
        _iHeight = iHeight;
        _szPrevState = SPIN_BUT_STATE_SPIN;
        
        this._initListener();
    };
    
    //SET ENABLE STATE
    this.enable = function(){
        _bDisable = false;
        _oButtonBg.gotoAndStop(_szPrevState);
    };
    
    //SET DISABLE STATE
    this.disable = function(){
        _bDisable = true;
        //_oButtonBg.gotoAndStop(SPIN_BUT_STATE_DISABLE);
    };
    
    //CHANGE BUTTON STATE
    this.setState = function(szState){
        _oButtonBg.gotoAndStop(szState);
        
        if(szState !== SPIN_BUT_STATE_STOP){
            _szPrevState = szState;
        }
    };
    
    //TOGGLE SPIN/AUTOSPIN STATE
    this.toggleAutoSpinImage = function(){
        if(_oButtonBg.currentAnimation === SPIN_BUT_STATE_SPIN){
            _oButtonBg.gotoAndStop(SPIN_BUT_STATE_AUTOSPIN);
        }else{
            _oButtonBg.gotoAndStop(SPIN_BUT_STATE_SPIN);   
        }
        
    };

	//ADD ALL EVENT LISTENERS FOR THE BUTTON
    this._initListener = function(){
       _oButton.on("mousedown", this.buttonDown);
       _oButton.on("pressup" , this.buttonRelease);   
    };
    
	//REMOVE BUTTON FROM THE CANVAS
    this.unload = function(){
       _oButton.off("mousedown", this.buttonDown);
       _oButton.off("pressup" , this.buttonRelease); 

       _oParentContainer.removeChild(_oButton);
    };
    
    this.setVisible = function(bVisible){
        _oButton.visible = bVisible;
    };

	//ADD LISTENER
    this.addEventListener = function( iEvent,cbCompleted, cbOwner ){
        _aCbCompleted[iEvent]=cbCompleted;
        _aCbOwner[iEvent] = cbOwner; 
    };
    
	//BUTTON CLICKED
    this.buttonRelease = function(){
        if(_bUpdate === false || _bDisable){
            return;
        }
        _bUpdate = false;
        
        if(_aCbCompleted[ON_MOUSE_UP]){
            _aCbCompleted[ON_MOUSE_UP].call(_aCbOwner[ON_MOUSE_UP],_oButtonBg.currentAnimation);
        }
    };
    
	//BUTTON PRESSED
    this.buttonDown = function(){
        if(_bDisable){
            return;
        }
        _iTimeElaps = 0;
        _bUpdate = true;
            
        if(_aCbCompleted[ON_MOUSE_DOWN]){
           _aCbCompleted[ON_MOUSE_DOWN].call(_aCbOwner[ON_MOUSE_DOWN]);
        }
    };
    
	//CHANGE BUTTON POSITION
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
    
    this.getHeight = function(){
        return _iHeight;
    };
    
    this.getSprite = function(){
        return _oButton;
    };
    
    this.getState = function(){
        return _oButtonBg.currentAnimation;
    };
    
    this.update = function(){
        if(_bUpdate === false){
            return;
        }
        
        _iTimeElaps += s_iTimeElaps;

        if(_iTimeElaps > TIME_HOLD_AUTOSPIN){
            _iTimeElaps = 0;
            _bUpdate = false;
            if(_aCbCompleted[ON_MOUSE_UP]){
                _aCbCompleted[ON_MOUSE_UP].call(_aCbOwner[ON_MOUSE_UP],_oButtonBg.currentAnimation,true);
            }
        }
    };
    
    _oParentContainer = oParentContainer;
    this._init(iXPos,iYPos,oSprite,iWidth,iHeight);
    
    return this;
}