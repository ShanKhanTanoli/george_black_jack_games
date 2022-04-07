function CAvatar(oParentContainer){
    var _bUpdate = false;
    var _iContAnimCycle =  false;
    var _iFrameCont;
    var _iTotFrameCont = 2;
    var _iCurFrameIndex = 0;
    var _iTotAnimFrame;
    var _iCurAnim = 0;
    var _aAnims;
    var _pStartPosAvatar;
    
    var _oContainer1;
    var _oContainer2;
    var _oContainer;
    var _oParentContainer;
    
    this._init = function(){
        _pStartPosAvatar = {x:50,y:252};
        
        _oContainer = new createjs.Container();
        _oContainer.x = 130;
        _oContainer.y = _pStartPosAvatar.y;
        _oParentContainer.addChild(_oContainer);
        
        _oContainer1 = new createjs.Container();
        _oContainer.addChild(_oContainer1);
        
        _oContainer2 = new createjs.Container();
        _oContainer2.visible = false;
        _oContainer.addChild(_oContainer2);
        
        _aAnims = new Array();
        _aAnims[0] = new Array();
        _aAnims[1] = new Array();
        for(var i=0;i<30;i++){
            var oBmp1 = createBitmap(s_oSpriteLibrary.getSprite('avatar_idle_'+i));
            _oContainer1.addChild(oBmp1);
            
            _aAnims[0][i] = oBmp1;
            
            oBmp1.visible = false;
        }
        
        for(var j=0;j<38;j++){
            var oBmp2 = createBitmap(s_oSpriteLibrary.getSprite('avatar_win_'+j));
            _oContainer2.addChild(oBmp2);
            
            _aAnims[1][j] = oBmp2;

            oBmp2.visible = false;
        }
        
        this.refreshButtonPos(s_iOffsetX);
    };
    
    this._hideAllAnims = function(){
        for(var k=0;k<_aAnims[0].length;k++){
            _aAnims[0][k].visible = false;
            _aAnims[1][k].visible = false;
            _aAnims[2][k].visible = false;
        }
    };
    
    this.refreshButtonPos = function(iNewX,iNewY){
        if( (_pStartPosAvatar.x + iNewX ) < 130){
            _oContainer.x = _pStartPosAvatar.x + iNewX;
        }
    };
    
    this.show = function(iAnim){
        _aAnims[_iCurAnim][_iCurFrameIndex].visible = false;
        _iCurAnim = iAnim;
        
        switch(iAnim){
            case 0:{
                    _oContainer1.visible = true;
                    _oContainer2.visible = false;
                    break;
            }
            case 1:{
                    _oContainer1.visible = false;
                    _oContainer2.visible = true;
                    break;
            }
        }
        
        _iTotAnimFrame = _aAnims[_iCurAnim].length;
        _iTotFrameCont = 2;
        _aAnims[_iCurAnim][0].visible = true;
        _iFrameCont = 0;
        _iCurFrameIndex = 0;
        _iContAnimCycle = 0;
        _bUpdate = true;
        
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
            if (  _iCurFrameIndex === _iTotAnimFrame-1) {
                this.playToFrame(1);
                _iContAnimCycle++;
                if(_iContAnimCycle === 2 && _iCurAnim === 1){
                    this.show(0);
                }
            }else{
                this.nextFrame();
            }
            
        }
    };
    
    _oParentContainer = oParentContainer;
    
    this._init();
}