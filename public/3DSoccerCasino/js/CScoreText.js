function CScoreText (iScore,x,y){
    
    var _oScoreHit;
    
    
    this._init = function(iScore,x,y){

        _oScoreHit = new createjs.Text("00000"," 60px "+FONT_GAME_1, "#ffd202");
        _oScoreHit.textAlign="center";
        _oScoreHit.text = "X"+iScore;
        _oScoreHit.x = x;
        _oScoreHit.y = y;
        _oScoreHit.alpha = 0;
        _oScoreHit.shadow = new createjs.Shadow("#000", 1, 1, 1);
        s_oStage.addChild(_oScoreHit);
        
        var oParent = this;
        createjs.Tween.get(_oScoreHit).to({alpha:1}, 200, createjs.Ease.quadIn).call(function(){oParent.moveUp();});  
    };
	
    this.moveUp = function(){
        var iNewY = _oScoreHit.y-100;
        var oParent = this;
        createjs.Tween.get(_oScoreHit).to({y:iNewY}, 1500, createjs.Ease.sineIn).call(function(){oParent.unload();});
        createjs.Tween.get(_oScoreHit).wait(800).to({alpha:0}, 500);
    };
	
    this.unload = function(){
        s_oStage.removeChild(_oScoreHit);
    };
	
    this._init(iScore,x,y);
    
}