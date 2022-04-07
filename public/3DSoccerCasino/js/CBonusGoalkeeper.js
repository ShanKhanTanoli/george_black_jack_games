function CBonusGoalkeeper(oParentContainer){
    var _bUpdate = false;
    var _iCurAnim;
    var _iTotAnimFrame;
    var _iCurFrameIndex;
    var _iFrameCont;
    var _iTotFrameCont;
    var _aAnims;
    var _oContainer;
    var _oContainer1;
    var _oContainer2;
    var _oContainer3;
    var _oParentContainer;
    
    this._init = function(){
        _oContainer = new createjs.Container();
        _oParentContainer.addChild(_oContainer);
        
        _oContainer1 = new createjs.Container();
        _oContainer1.x = 650;
        _oContainer1.y = 160;
        _oContainer.addChild(_oContainer1);
        
        _oContainer2 = new createjs.Container();
        _oContainer2.visible = false;
        _oContainer2.x = 292;
        _oContainer2.y = 132;
        _oContainer.addChild(_oContainer2);
        
        _oContainer3 = new createjs.Container();
        _oContainer3.visible = false;
        _oContainer3.x = 662;
        _oContainer3.y = 132;
        _oContainer.addChild(_oContainer3);
        
        _aAnims = new Array();
        _aAnims[0] = new Array();
        _aAnims[1] = new Array();
        _aAnims[2] = new Array();
        //IDLE ANIM
        for(var i=0;i<23;i++){
            var oBmp = createBitmap(s_oSpriteLibrary.getSprite('gk_idle_'+i));
            _oContainer1.addChild(oBmp);
            
            _aAnims[0].push(oBmp);
            
            if(i > 0){
                oBmp.visible = false;
            }
        }
        
        for(var j=0;j<33;j++){
            var oBmp1 = createBitmap(s_oSpriteLibrary.getSprite('gk_save_left_'+j));
            _oContainer2.addChild(oBmp1);
            
            _aAnims[1].push(oBmp1);
            
            var oBmp2 = createBitmap(s_oSpriteLibrary.getSprite('gk_save_right_'+j));
            _oContainer3.addChild(oBmp2);
            
            _aAnims[2].push(oBmp2);
            
            if(j > 0){
                oBmp1.visible = false;
                oBmp2.visible = false;
            }
        } 
    };
    
    this.show = function(){
        _iCurAnim = 0;
        _iFrameCont = 0;
        _iTotFrameCont = 2;
        _iTotAnimFrame = 23;
        _oContainer1.visible = true;
        _oContainer2.visible = false;
        _oContainer3.visible = false;
        _oContainer.visible = true;
        
        _aAnims[_iCurAnim][0].visible = true;
        _iCurFrameIndex = 0;
        _bUpdate = true;
    };

    
    this.dive = function(iDive){
        _iFrameCont = 0;
        _iTotFrameCont = 1;
        _iTotAnimFrame = 33;
        
        _iCurAnim = iDive;
        switch(_iCurAnim){
            case 1:{
                    _oContainer1.visible = false;
                    _oContainer2.visible = true;
                    _oContainer3.visible = false;
                    break;
            }
            case 2:{
                    _oContainer1.visible = false;
                    _oContainer2.visible = false;
                    _oContainer3.visible = true;
                    break;
            }
        }
        
        _aAnims[_iCurAnim][0].visible = true;
        _iCurFrameIndex = 0;
        this.resetIdleAnim();
        
        _bUpdate = true;
    };
    
    this.resetIdleAnim = function(){
        for(var i=0;i<_aAnims[0].length;i++){
            _aAnims[0][i].visible= false;
        }
    };
    
    this._showWinAnim = function(){
        _oContainer.visible = false;
        _oContainer1.visible = true;
        _oContainer2.visible = false;
        _oContainer3.visible = false;
        _bUpdate = false;
    };

    this.playToFrame = function(iFrame){
        _aAnims[_iCurAnim][_iCurFrameIndex].visible = false;
        _iCurFrameIndex = iFrame;
        _aAnims[_iCurAnim][_iCurFrameIndex].visible= true;
    };
    
    this.nextFrame = function(){
        _aAnims[_iCurAnim][_iCurFrameIndex].visible = false;
        _iCurFrameIndex++;
        _aAnims[_iCurAnim][_iCurFrameIndex].visible= true;
    };
    
    this.update = function(){
        if(_bUpdate === false){
            return;
        }
        
        _iFrameCont++;
        if(_iFrameCont === _iTotFrameCont){
            _iFrameCont = 0;
            if (_iCurFrameIndex === _iTotAnimFrame-1) {
                if(_iCurAnim === 0){
                    this.playToFrame(1);
                }else{
                    //SHOW WIN
                    _aAnims[_iCurAnim][_iCurFrameIndex].visible = false;
                    this._showWinAnim();
                }
            }else{
                this.nextFrame();
            }
        }   
    };
    
    _oParentContainer = oParentContainer;
    this._init();
}