function CSlotSettings(){
    
    this._init = function(){
        this._initSymbolSpriteSheets();
        this._initSymbolAnims();
        this._initSymbolsOccurence();
    };
    
    this._initSymbolSpriteSheets = function(){
        s_aSymbolData = new Array();
        for(var i=1;i<NUM_SYMBOLS+1;i++){
            var oData = {   // image to use
                            images: [s_oSpriteLibrary.getSprite('symbol_'+i)], 
                            // width, height & registration point of each sprite
                            frames: {width: SYMBOL_WIDTH, height: SYMBOL_HEIGHT, regX: 0, regY: 0}, 
                            animations: {  static: [0, 1],moving:[1,2] }
            };

            s_aSymbolData[i] = new createjs.SpriteSheet(oData);
        }  
    };

    this.initSymbolWin = function(szSymbolWin){
        var aSplit = szSymbolWin.split("#");
        
        s_aSymbolWin = new Array();
        
        for(var i=0;i<aSplit.length;i++){
            var aWins = aSplit[i].split(",");
            s_aSymbolWin[i] = new Array();
            for(var j=0;j<aWins.length;j++){
                s_aSymbolWin[i][j] = parseFloat(aWins[j]);
            }
        }
    };
    
    this._initSymbolsOccurence = function(){
        s_aRandSymbols = new Array();
        
        var i;
        //OCCURENCE FOR SYMBOL 1
        for(i=0;i<1;i++){
            s_aRandSymbols.push(1);
        }
        
        //OCCURENCE FOR SYMBOL 2
        for(i=0;i<2;i++){
            s_aRandSymbols.push(2);
        }
        
        //OCCURENCE FOR SYMBOL 3
        for(i=0;i<3;i++){
            s_aRandSymbols.push(3);
        }
        
        //OCCURENCE FOR SYMBOL 4
        for(i=0;i<4;i++){
            s_aRandSymbols.push(4);
        }
        
        //OCCURENCE FOR SYMBOL 5
        for(i=0;i<4;i++){
            s_aRandSymbols.push(5);
        }
        
        //OCCURENCE FOR SYMBOL 6
        for(i=0;i<6;i++){
            s_aRandSymbols.push(6);
        }
        
        //OCCURENCE FOR SYMBOL 7
        for(i=0;i<6;i++){
            s_aRandSymbols.push(7);
        }
        
        //OCCURENCE FOR SYMBOL 8
        for(i=0;i<6;i++){
            s_aRandSymbols.push(8);
        }
        
        //OCCURENCE FOR SYMBOL 9
        for(i=0;i<6;i++){
            s_aRandSymbols.push(9);
        }
        
        //OCCURENCE FOR SYMBOL 10
        for(i=0;i<6;i++){
            s_aRandSymbols.push(10);
        }
        
        //OCCURENCE FOR SYMBOL 11
        for(i=0;i<6;i++){
            s_aRandSymbols.push(11);
        }
        
        //OCCURENCE FOR SYMBOL WILD
        for(i=0;i<1;i++){
            s_aRandSymbols.push(12);
        }
        
        //OCCURENCE FOR SYMBOL BONUS
        for(i=0;i<1;i++){
            s_aRandSymbols.push(13);
        }
        
        
    };
    
    this._initSymbolAnims = function(){
        s_aSymbolAnims = new Array();
        var iFrameRate = Math.floor(FPS/2);
        
        for(var k=0;k<NUM_SYMBOLS;k++){
                var oData = {   
                        framerate: iFrameRate,
                        images: [s_oSpriteLibrary.getSprite("symbol_"+(k+1)+"_anim")], 
                        // width, height & registration point of each sprite
                        frames: {width: SYMBOL_ANIM_WIDTH, height: SYMBOL_ANIM_HEIGHT},  
                        animations: {  static: [0],anim:[0,23] }
                };

                s_aSymbolAnims[k] = new createjs.SpriteSheet(oData);
            
            
        }
        
        /////////////////REGISTRATION POINTS/////////////////////
        s_oAnimRegPoint = new Array();
        s_oAnimRegPoint[0] = {x:85,y:82};
        s_oAnimRegPoint[1] = {x:85,y:82};
        s_oAnimRegPoint[2] = {x:85,y:82};
        s_oAnimRegPoint[3] = {x:85,y:82};
        s_oAnimRegPoint[4] = {x:85,y:82};
        s_oAnimRegPoint[5] = {x:85,y:82};
        s_oAnimRegPoint[6] = {x:85,y:82};
        s_oAnimRegPoint[7] = {x:85,y:82};
        s_oAnimRegPoint[8] = {x:85,y:82};
        s_oAnimRegPoint[9] = {x:85,y:82};
        s_oAnimRegPoint[10] = {x:85,y:82};
        s_oAnimRegPoint[11] = {x:85,y:82};
        s_oAnimRegPoint[13] = {x:85,y:82};
    };

    this._init();
}

var s_aSymbolData;
var s_aPaylineCombo;
var s_aSymbolWin;
var s_aSymbolAnims;
var s_aRandSymbols;
var s_oAnimRegPoint = new Array();
