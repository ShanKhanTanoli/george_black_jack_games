function CReelColumn(iIndex,iXPos,iYPos,iDelay){
    var _bUpdate;
    var _bReadyToStop;
    var _bContainsFinalSymbols;
    var _iIndex;
    var _iCol;
    var _iDelay;
    var _iContDelay;
    var _iCurState;
    var _iCntFrames;
    var _iMaxFrames;
    var _iStartY;
    var _iCurStartY;
    var _iFinalY;
    var _aSymbols;
    var _aSymbolValues;
    var _oContainer;
    
    this._init = function(iIndex,iXPos,iYPos,iDelay){
        _bUpdate = false;
        _bReadyToStop = false;
        _bContainsFinalSymbols = false;
        _iContDelay = 0;
        _iIndex = iIndex;
        _iDelay = iDelay;
        
        if(_iIndex < NUM_REELS){
            _iCol = _iIndex;
        }else{
            _iCol = _iIndex - NUM_REELS;
        }
        
        _iCntFrames = 0;
        _iMaxFrames = MAX_FRAMES_REEL_EASE;
        _iCurState = REEL_STATE_START;
        _iCurStartY = _iStartY = iYPos;
        _iFinalY = _iCurStartY + ( (SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS) * NUM_ROWS);
        
        this.initContainer(iXPos,iYPos);
    };
    
    this.initContainer = function(iXPos,iYPos){
        _oContainer = new createjs.Container();
        _oContainer.x = iXPos;
        _oContainer.y = iYPos;
        
        var iX = 0;
        var iY = 0;
        _aSymbols = new Array();
        _aSymbolValues = new Array();
        for(var i=0;i<NUM_ROWS;i++){
             var iRandIndex = Math.floor(Math.random()* s_aRandSymbols.length);
             var iRandSymbol = s_aRandSymbols[iRandIndex];
             var oSprite = createSprite(s_aSymbolData[iRandSymbol], "static",0,0,SYMBOL_WIDTH,SYMBOL_HEIGHT);
             oSprite.stop();
             oSprite.x = iX;
             oSprite.y = iY;
             _oContainer.addChild(oSprite);
             
             _aSymbols[i] = oSprite;
             _aSymbolValues[i] = iRandSymbol;
             
             iY += SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS;
        }
       
        s_oAttachSection.addChild(_oContainer);
    };
    
    this.unload = function(){
        s_oAttachSection.removeChild(_oContainer);
    };
    
    this.activate = function(){
        _iCurStartY = _oContainer.y;
        _iFinalY = _iCurStartY + ((SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS) * NUM_ROWS);
        _bUpdate = true;
    };
    
    this._setSymbol = function(aSymbols){
        _oContainer.removeAllChildren();
        
        var iX = 0;
        var iY = 0;
        for(var i=0;i<aSymbols.length;i++){
            var oSprite = new createjs.Sprite(s_aSymbolData[aSymbols[i]], "static",0,0,SYMBOL_WIDTH,SYMBOL_HEIGHT);
             oSprite.stop();
             oSprite.x = iX;
             oSprite.y = iY;
             _oContainer.addChild(oSprite);
             _aSymbols[i] = oSprite;
             _aSymbolValues[i] = aSymbols[i];
             
             iY += SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS;
        }
    };
    
    this.forceStop = function(aSymbols,iYPos){
        if(aSymbols !== null){
            this._setSymbol(aSymbols);
        }
        _oContainer.y = iYPos;
        _bUpdate = false;
        _iCntFrames = 0;
        _iMaxFrames = MAX_FRAMES_REEL_EASE;
        _iCurState = REEL_STATE_START;
        _iContDelay = 0;
        _bReadyToStop = false;
        _bContainsFinalSymbols = false;
    };
    
    this.setVisible = function(iRow,bVisible){
        _aSymbols[iRow].visible = bVisible;
    };
    
    this.restart = function(aSymbols,bReadyToStop) {
        _oContainer.y = _iCurStartY = REEL_START_Y;
       _iFinalY = _iCurStartY + ((SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS) * NUM_ROWS);
        this._setSymbol(aSymbols);

        _bReadyToStop = bReadyToStop;
        if (_bReadyToStop) {
            _iCntFrames = 0;
            _iMaxFrames = MAX_FRAMES_REEL_EASE;
            _iCurState = REEL_STATE_STOP;
            for (var i = 0; i < NUM_ROWS; i++) {
                _aSymbols[i].gotoAndStop("static");
            }
            _bContainsFinalSymbols = true;
            
        }else{
            for (var i = 0; i < NUM_ROWS; i++) {
                _aSymbols[i].gotoAndStop("moving");
            }
        }
    };
    
    this.setReadyToStop = function() {
        _iCntFrames = 0;
        _iMaxFrames = MAX_FRAMES_REEL_EASE;
        _iCurState = REEL_STATE_STOP;
    };
    
    this.isReadyToStop = function(){
        return _bReadyToStop;
    };
    
    this.getPosUpLeft = function(iRow){
        var iX = _oContainer.x;
        var iY = _oContainer.y + (SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS) * iRow;
        return {x:iX,y:iY};
    };
    
    this.getY = function(){
        return _oContainer.y;
    };
    
    this._updateStart = function(){
        if(_iCntFrames === 0 && _iIndex < NUM_REELS){
            playSound("start_reel",1,false);
        }
        
        _iCntFrames++;
        if ( _iCntFrames > _iMaxFrames ){
            _iCntFrames = 0;
            _iMaxFrames /= 2;
            _iCurState++;
            _iCurStartY = _oContainer.y;
            _iFinalY = _iCurStartY + ((SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS) * NUM_ROWS);
        }
        
        var fLerpY = s_oTweenController.easeInBack( _iCntFrames, 0 ,1, _iMaxFrames);
        
        var iValue = s_oTweenController.tweenValue( _iCurStartY, _iFinalY, fLerpY);
        _oContainer.y = iValue;
    };
    
    this._updateMoving = function(){
        _iCntFrames++;
        if ( _iCntFrames > _iMaxFrames ){
            _iCntFrames = 0;
            _iCurStartY = _oContainer.y;
            _iFinalY = _iCurStartY + ( (SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS)* NUM_ROWS);
        }
        
        var fLerpY = s_oTweenController.easeLinear( _iCntFrames, 0 ,1, _iMaxFrames);
        var iValue = s_oTweenController.tweenValue( _iCurStartY, _iFinalY, fLerpY);
        _oContainer.y = iValue;	
    };
    
    this._updateStopping = function(){
        _iCntFrames++;
        
        if ( _iCntFrames >= _iMaxFrames ){
            _bUpdate = false;
            _iCntFrames = 0;
            _iMaxFrames = MAX_FRAMES_REEL_EASE;
            _iCurState = REEL_STATE_START;
            _iContDelay = 0;
            _bReadyToStop = false;

            if(_bContainsFinalSymbols){
                _bContainsFinalSymbols = false;
                _oContainer.y = REEL_OFFSET_Y;
                
            }

            s_oGame.stopNextReel( (_aSymbolValues[0] === FREESPIN_SYMBOL || _aSymbolValues[1] === FREESPIN_SYMBOL || _aSymbolValues[2] === FREESPIN_SYMBOL )?true:false,
                                  (_aSymbolValues[0] === BONUS_SYMBOL || _aSymbolValues[1] === BONUS_SYMBOL || _aSymbolValues[2] === BONUS_SYMBOL )?true:false );
        }else{
            var fLerpY = s_oTweenController.easeOutCubic( _iCntFrames, 0 ,1, _iMaxFrames);
            var iValue = s_oTweenController.tweenValue( _iCurStartY, _iFinalY, fLerpY);
            _oContainer.y = iValue;	
        }
        
        
    };

    this.update = function() {
        if (_bUpdate === false) {
            return;
        }
        
        _iContDelay++;

	if (_iContDelay > _iDelay) {
            if(_bReadyToStop === false && (_oContainer.y > REEL_ARRIVAL_Y) ){
                s_oGame.reelArrived(_iIndex, _iCol);
            }
            switch(_iCurState) {
                case REEL_STATE_START: {
                    this._updateStart();
                    break;
                }
                case REEL_STATE_MOVING: {
                    this._updateMoving();
                    break;
                }
                case REEL_STATE_STOP: {
                    this._updateStopping();
                    break;
                }
            }
        }
    };
    
    this._init(iIndex,iXPos,iYPos,iDelay);
    
}