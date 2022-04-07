function CBonusBall(iX,iY,oParentContainer){
    var _bUpdate = false;
    var _iStartPosX;
    var _iStartPosY;
    var _iCntFrames;
    var _iSpeed;
    var _iTotFrame;
    var _iEndBallX;
    var _iEndBallY;
    var _aTrajectoryPoint;
    var _oEasing;
    
    var _oContainer;
    var _oParentContainer;
    
    this._init = function(iX,iY){
        _iStartPosX = iX;
        _iStartPosY = iY;
        _iSpeed = 1;
        _iTotFrame = FPS/2;
        var oSprite = s_oSpriteLibrary.getSprite('ball_anim');
        
        var oData = {   // image to use
                        images: [oSprite], 
                        // width, height & registration point of each sprite
                        frames: {width: 211, height: 205,regX:105,regY:102}, 
                        animations: {  static: [0],moving:[1,29,"moving"] }
       };
       
        var oSpriteSheet = new createjs.SpriteSheet(oData);
        _oContainer = createSprite(oSpriteSheet, "static",0,0,oSprite.width/2,oSprite.height);
        _oContainer.visible = false;
        _oContainer.x = _iStartPosX;
        _oContainer.y = _iStartPosY;
        _oContainer.stop();   
        _oParentContainer.addChild(_oContainer);
        
        _oEasing = new CTweenController();
    };
    
    this.show = function(iEndX,iEndY){
        _iEndBallX = iEndX;
        _iEndBallY = iEndY;
        _oContainer.x = _iStartPosX;
        _oContainer.y = _iStartPosY;
        this._calculateMid(new createjs.Point(_oContainer.x,_oContainer.y),new createjs.Point(_iEndBallX,_iEndBallY));
        
        _oContainer.scaleX = _oContainer.scaleY = 1;
        _oContainer.alpha = 1;
        _oContainer.visible = true;
        _oContainer.gotoAndPlay("moving");
        
        _iCntFrames = 0;
        _bUpdate = true;
    };
    
    this.hide = function(){
        _oContainer.visible = false;
    };
    
    this._resetBall = function(){
        playSound("avatar_win",1,false);
        _iCntFrames = 0;
        _oContainer.gotoAndStop("static");
        _bUpdate = false;
        
        createjs.Tween.get(_oContainer).to({y:CANVAS_HEIGHT/2 }, 1500,createjs.Ease.cubicIn);
        createjs.Tween.get(_oContainer).to({alpha:0 }, 1000,createjs.Ease.cubicIn).call(function(){s_oBonusPanel.ballArrived();});
    };
    
    this._calculateMid = function(pStartPoint, pEndPoint){
        var t0;
        if (pEndPoint.x < CANVAS_WIDTH/2) {
            t0 = new createjs.Point(pEndPoint.x - 100,pEndPoint.y+40);
        }else{
            t0 = new createjs.Point(pEndPoint.x + 100,pEndPoint.y+40);
        }
        
        _aTrajectoryPoint = {start:pStartPoint, end:pEndPoint, traj:t0};
    };
    
    this.getX = function(){
        return _oContainer.x;
    };
    
    this.getY = function(){
        return _oContainer.y;
    };
    
    this.update = function(){
        if(!_bUpdate){
            return;
        }
        
        _iCntFrames += _iSpeed;

        if (_iCntFrames > _iTotFrame ) {
            this._resetBall();
            return;
        }
        
        var fLerp; 
        fLerp = _oEasing.easeOutCubic(_iCntFrames, 0, 1, _iTotFrame);

        var pPos = _oEasing.getTrajectoryPoint(fLerp, _aTrajectoryPoint);
        _oContainer.x = pPos.x;
        _oContainer.y = pPos.y;
        
        //SCALE BALL DIMENSIONS IN DEPTH
        if(_oContainer.scaleX >= 0.2){
            _oContainer.scaleX -= 0.06;
            _oContainer.scaleY -= 0.06;
        }
        
    };

    _oParentContainer = oParentContainer;
    this._init(iX,iY);
}