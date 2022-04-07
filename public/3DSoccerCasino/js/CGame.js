function CGame(){
    var _bUpdate = false;
    var _bReadyToStop = false;
    var _bAutoSpin;
    var _bActivateFreespin;
    var _iCurState;
    var _iCurReelLoops;
    var _iNextColToStop;
    var _iNumReelsStopped;
    var _iLastLineActive;
    var _iTimeElaps;
    var _iCurWinShown;
    var _iCurBet;
    var _iTotBet;
    var _iMoney;
    var _iTotWin;
    var _iTotFreeSpin;
    var _iBonus;
    var _iCurBonusPrizeIndex;
    var _iCurCoinIndex;
    var _iNumSpinCont;
    var _aMovingColumns;
    var _aStaticSymbols;
    var _aWinningLine;
    var _aReelSequence;
    var _aFinalSymbolCombo;
    var _pStartPosLogo;
    
    var _oBg;
    var _oLogo;
    var _oFrontSkin;
    var _oFreespinPanel;
    var _oInterface;
    var _oPayTable = null;
    var _oBonusPanel;
    var _oAvatar;
    
    this._init = function(){
        _iCurState = GAME_STATE_IDLE;
        _iCurReelLoops = 0;
        _iNumReelsStopped = 0;
        _iCurCoinIndex = 0;
        _iTimeElaps = 0;
        _aReelSequence = new Array(0,1,2,3,4);
        _iNextColToStop = _aReelSequence[0];
        _iLastLineActive = NUM_PAYLINES;
        _iMoney = TOTAL_MONEY;
        _iCurBet = MIN_BET;
        _iTotBet = _iCurBet * _iLastLineActive;
        _bAutoSpin = false;
        _iTotFreeSpin = 0;
        _iBonus = 0;
        _iNumSpinCont = 0;
        
        s_oTweenController = new CTweenController();
        
        _oBg = createBitmap(s_oSpriteLibrary.getSprite('bg_game'));
        s_oAttachSection.addChild(_oBg);

        this._initReels();

        _oFrontSkin = new createjs.Bitmap(s_oSpriteLibrary.getSprite('mask_slot'));
        s_oAttachSection.addChild(_oFrontSkin);
        
        var oData = {   // image to use
                        images: [s_oSpriteLibrary.getSprite('logo')], 
                        // width, height & registration point of each sprite
                        frames: {width: 230, height: 86,regX:165,regY:0}, 
                        animations: {  normal: [0],freespin:[1,55] }
       };

        _oInterface = new CInterface(_iCurBet,_iTotBet,_iMoney);
        this._initStaticSymbols();
        
        
        _oAvatar = new CAvatar(s_oAttachSection);
        _oAvatar.show(0);
        
        var oSpriteSheet = new createjs.SpriteSheet(oData);
        _oLogo = createSprite(oSpriteSheet, "normal",165,0,230,86);
        _oLogo.stop();
        s_oAttachSection.addChild(_oLogo);
        
        _oPayTable = new CPayTablePanel();
		
        if(_iMoney < _iTotBet){
            _oInterface.disableSpin();
        }
        
        //FIND MIN WIN
        MIN_WIN = s_aSymbolWin[0][s_aSymbolWin[0].length-1];
        for(var i=0;i<s_aSymbolWin.length;i++){
            var aTmp = s_aSymbolWin[i];
            for(var j=0;j<aTmp.length;j++){
                if(aTmp[j] !== 0 && aTmp[j] < MIN_WIN){
                    MIN_WIN = aTmp[j];
                }
            }
        }
        
        _oBonusPanel = new CBonusPanel();
        _oFreespinPanel = new CFreespinPanel(s_oStage);
        
        this.refreshButtonPos (s_iOffsetX,s_iOffsetY);
        
        playSound("crowd",1,true);
        
        _bUpdate = true;
    };
    
    this.unload = function(){
        stopSound("crowd");
        
        
        _oInterface.unload();
        _oPayTable.unload();
        
        for(var k=0;k<_aMovingColumns.length;k++){
            _aMovingColumns[k].unload();
        }
        
        for(var i=0;i<NUM_ROWS;i++){
            for(var j=0;j<NUM_REELS;j++){
                _aStaticSymbols[i][j].unload();
            }
        }
        
        s_oAttachSection.removeAllChildren();
        s_oGame = null;
    };
    
    this.refreshButtonPos = function(iNewX,iNewY){
        _oInterface.refreshButtonPos(iNewX,iNewY);
        _oPayTable.refreshButtonPos(iNewX,iNewY);

        if(s_iOffsetY < 40){
            _pStartPosLogo = {x:800,y:-2};
        }else{
            _pStartPosLogo = {x:1432,y:80};
        }
        _oLogo.x = _pStartPosLogo.x;
        _oLogo.y = _pStartPosLogo.y + iNewY;
        
        _oAvatar.refreshButtonPos(iNewX,iNewY);
    };
    
    this._initReels = function(){  
        var iXPos = REEL_OFFSET_X;
        var iYPos = REEL_OFFSET_Y;
        
        var iCurDelay = 0;
        _aMovingColumns = new Array();
        for(var i=0;i<NUM_REELS;i++){ 
            _aMovingColumns[i] = new CReelColumn(i,iXPos,iYPos,iCurDelay);
            _aMovingColumns[i+NUM_REELS] = new CReelColumn(i+NUM_REELS,iXPos,iYPos + ( ( SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS)*NUM_ROWS),iCurDelay );
            iXPos += SYMBOL_WIDTH + SPACE_BETWEEN_SYMBOLS;
            iCurDelay += REEL_DELAY;
        }
        
    };
    
    this._initStaticSymbols = function(){
        var iXPos = REEL_OFFSET_X;
        var iYPos = REEL_OFFSET_Y;
        _aStaticSymbols = new Array();
        for(var i=0;i<NUM_ROWS;i++){
            _aStaticSymbols[i] = new Array();
            for(var j=0;j<NUM_REELS;j++){
                var oSymbol = new CStaticSymbolCell(i,j,iXPos,iYPos);
                _aStaticSymbols[i][j] = oSymbol;
                
                iXPos += SYMBOL_WIDTH + SPACE_BETWEEN_SYMBOLS;
            }
            iXPos = REEL_OFFSET_X;
            iYPos += (SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS);
        }
    };
    
    this.generateLosingPattern = function(){
         var aFirstCol = new Array();
         for(var i=0;i<NUM_ROWS;i++){
            var iRandIndex = Math.floor(Math.random()* (s_aRandSymbols.length-2));
            var iRandSymbol = s_aRandSymbols[iRandIndex];
            aFirstCol[i] = iRandSymbol;  
        }
        
        _aFinalSymbolCombo = new Array();
        for(var i=0;i<NUM_ROWS;i++){
            _aFinalSymbolCombo[i] = new Array();
            for(var j=0;j<NUM_REELS;j++){
                
                if(j === 0){
                    _aFinalSymbolCombo[i][j] = aFirstCol[i];
                }else{
                    do{
                        var iRandIndex = Math.floor(Math.random()* (s_aRandSymbols.length-2));
                        var iRandSymbol = s_aRandSymbols[iRandIndex];
                    }while(aFirstCol[0] === iRandSymbol || aFirstCol[1] === iRandSymbol || aFirstCol[2] === iRandSymbol);

                    _aFinalSymbolCombo[i][j] = iRandSymbol;
                }  
            }
        }
        
        _aWinningLine = new Array();
        _bReadyToStop = true;
    };
    
    this._generateRandSymbols = function() {
        var aRandSymbols = new Array();
        for (var i = 0; i < NUM_ROWS; i++) {
                var iRandIndex = Math.floor(Math.random()* s_aRandSymbols.length);
                aRandSymbols[i] = s_aRandSymbols[iRandIndex];
        }

        return aRandSymbols;
    };
    
    this.reelArrived = function(iReelIndex,iCol) {
        if(_iCurReelLoops>MIN_REEL_LOOPS ){
            if (_iNextColToStop === iCol) {
                if (_aMovingColumns[iReelIndex].isReadyToStop() === false) {
                    var iNewReelInd = iReelIndex;
                    if (iReelIndex < NUM_REELS) {
                            iNewReelInd += NUM_REELS;
                            
                            _aMovingColumns[iNewReelInd].setReadyToStop();
                            
                            _aMovingColumns[iReelIndex].restart(new Array(_aFinalSymbolCombo[0][iReelIndex],
                                                                        _aFinalSymbolCombo[1][iReelIndex],
                                                                        _aFinalSymbolCombo[2][iReelIndex]), true);
                            
                    }else {
                            iNewReelInd -= NUM_REELS;
                            _aMovingColumns[iNewReelInd].setReadyToStop();
                            
                            _aMovingColumns[iReelIndex].restart(new Array(_aFinalSymbolCombo[0][iNewReelInd],
                                                                          _aFinalSymbolCombo[1][iNewReelInd],
                                                                          _aFinalSymbolCombo[2][iNewReelInd]), true);
                            
                            
                    }
                    
                }
            }else {
                    _aMovingColumns[iReelIndex].restart(this._generateRandSymbols(),false);
            }
            
        }else {
            
            _aMovingColumns[iReelIndex].restart(this._generateRandSymbols(), false);
            if(_bReadyToStop && iReelIndex === 0){
                _iCurReelLoops++;
            }
            
        }
    };
    
    this.stopNextReel = function(bContainsFreespin,bContainsBonus) {
        _iNumReelsStopped++;

        if(_iNumReelsStopped%2 === 0){
            _iNextColToStop = _aReelSequence[_iNumReelsStopped/2];
            if (_iNumReelsStopped === (NUM_REELS*2) ) {
                    this._endReelAnimation();
            }
        }else{
            if(bContainsBonus ){
                playSound("reel_stop_bonus",1,false);
            }else if(bContainsFreespin){
                playSound("reel_stop_freespin",1,false);
            }else{
                playSound("reel_stop",1,false);
            }
        }    
    };
    
    this._endReelAnimation = function(){
        _bReadyToStop = false;
        
        _iCurReelLoops = 0;
        _iNumReelsStopped = 0;
        _iCurWinShown = 0;
        _iNextColToStop = _aReelSequence[0];

        if(_iBonus > 0){
            _oInterface.disableGuiButtons();
            _oInterface.disableSpin();
        }
        
        if( _oLogo.currentAnimation === "freespin" && _bActivateFreespin === false){
            _oInterface.refreshFreeSpinNum(_iTotFreeSpin);
        }
            
        //INCREASE MONEY IF THERE ARE COMBOS
        if(_aWinningLine.length > 0){
            _oAvatar.show(1);
            //HIGHLIGHT WIN COMBOS IN PAYTABLE
            for(var i=0;i<_aWinningLine.length;i++){
                
                if(_aWinningLine[i].line > 0){
                    _oPayTable.highlightCombo(_aWinningLine[i].value,_aWinningLine[i].num_win);
                    _oInterface.showLine(_aWinningLine[i].line);
                }
                var aList = _aWinningLine[i].list;
                for(var k=0;k<aList.length;k++){
                    _aStaticSymbols[aList[k].row][aList[k].col].showWinFrame();
                }
            }

            if(_oLogo.currentAnimation === "freespin" && _iTotFreeSpin === 0){
                _oLogo.gotoAndStop("normal");
                _oInterface.refreshFreeSpinNum("");
                _oInterface.setSpinState(SPIN_BUT_STATE_SPIN);
            }

            if(_iTotWin>0){
                _oInterface.refreshWinText(_iTotWin);
            }
			
            _iTimeElaps = 0;     
            _iCurState = GAME_STATE_SHOW_ALL_WIN;

            playSound("avatar_win",1,false);
            
            
            if(_iBonus !== BONUS_GOALKEEPER){
                _oInterface.refreshMoney(_iMoney);
            }
        }else{
            if(_iTotFreeSpin > 0){
                _oInterface.disableSpin();
                this.onSpin();
            }else{
                if(_oLogo.currentAnimation === "freespin"){
                    _oLogo.gotoAndStop("normal");
                    _oInterface.refreshFreeSpinNum("");
                    _oInterface.setSpinState(SPIN_BUT_STATE_SPIN);
                }
                
                if(_bAutoSpin){
                    if(_iMoney < _iTotBet && _iTotFreeSpin === 0){
                        this.resetCoinBet();
                        _bAutoSpin = false;
                        _oInterface.enableGuiButtons();
                    }else{
                        this.onSpin();
                    }
                }else{
                    _iCurState = GAME_STATE_IDLE;
                }
            }
            
        }

        if(_iMoney < _iTotBet && _iTotFreeSpin === 0){
            this.resetCoinBet();
            _bAutoSpin = false;
            _oInterface.enableGuiButtons();
        }else{
            if(!_bAutoSpin && _iTotFreeSpin === 0 && _iBonus === 0){
                _oInterface.enableGuiButtons();
                _oInterface.disableBetBut(false);
            }
        }
        
        _iNumSpinCont++;
        if(_iNumSpinCont === NUM_SPIN_FOR_ADS){
            _iNumSpinCont = 0;
            
            $(s_oMain).trigger("show_interlevel_ad");
        }
        
        $(s_oMain).trigger("save_score",_iMoney);
    };

    this.hidePayTable = function(){
        _oPayTable.hide();
    };
    
    this.showWin = function(){
        var iLineIndex;

        if(_iCurWinShown>0){ 
            stopSound("avatar_win");
            
            iLineIndex = _aWinningLine[_iCurWinShown-1].line;
            if(iLineIndex > 0){
                _oInterface.hideLine(iLineIndex);
            }
            
            
            var aList = _aWinningLine[_iCurWinShown-1].list;
            for(var k=0;k<aList.length;k++){
                _aMovingColumns[aList[k].col].setVisible(aList[k].row,true);
                _aMovingColumns[aList[k].col+NUM_REELS].setVisible(aList[k].row,true);
            }
        }

        if(_iCurWinShown === _aWinningLine.length){
            _iCurWinShown = 0;

            if(_bActivateFreespin){
                _bActivateFreespin = false;
                _oFreespinPanel.show(_iTotFreeSpin);
            }else if(_iTotFreeSpin > 0){
                _oInterface.disableSpin();
                this.onSpin();
            }else if(_iBonus === BONUS_GOALKEEPER){
                if(!_oBonusPanel.isVisible()){
                    this._hideAllWins();
                    _oBonusPanel.show(BONUS_PRIZE[_iCurBonusPrizeIndex]);
                    _iCurState = GAME_STATE_BONUS;
                }
                
            }else if(_bAutoSpin){
                this.onSpin();
            }else{
                _oInterface.enableGuiButtons();
                _oInterface.disableBetBut(false);

                _iCurState = GAME_STATE_IDLE;
            }
            
            return;
        }
        
        var iCol;
        var iRow;
        iLineIndex = _aWinningLine[_iCurWinShown].line;
        var aList = _aWinningLine[_iCurWinShown].list;
        if(iLineIndex === 0){
            var iNumSymbols = aList.length;
            var iIndex = Math.floor(iNumSymbols/2);
            iRow = aList[iIndex].row;
            iCol = aList[iIndex].col;
        }else{
            _oInterface.showLine(iLineIndex);

            //DETECT WHICH REEL WE HAVE TO SHOW THE BIG ANIMATION
            iCol = 2;
            var bSkipCheck = false;
            if(aList.length < 3){
                if(_aWinningLine[_iCurWinShown].value === FREESPIN_SYMBOL){
                    iCol = aList[0].col;
                    iRow = aList[0].row;
                    bSkipCheck = true;
                }else{
                    iCol = aList.length - 1;
                    iRow = aList[iCol].row;
                }
            }else{
                iRow = aList[iCol].row;
            }

            //USUALLY WINNING ANIMS IS PLAYED IN THE THIRD REEL. IF IN THAT REEL THERE IS A WILD EXPANDED,
            //CHECK PREVIOUS REEL
            while (!bSkipCheck && (_aFinalSymbolCombo[iRow][iCol] === WILD_SYMBOL ) ){
                iCol--;

                if(iCol<0){
                    iCol = 0;
                    iRow = aList[iCol].row;
                    break;
                }else{
                    iRow = aList[iCol].row;
                }
            }
        }
        
        //SET THE REGISTRATION POINT AND POSITION OF THE WINNING ANIMATION TO ALLOW A CORRECT SCALING
        var oPos = {x:0,y:0};
        var oRegPoint;
        if(iRow === 0){
            if(iCol === 0){
                oRegPoint = {x:0,y:0};
            }else if(iCol === 4){
                oRegPoint = {x:SYMBOL_ANIM_WIDTH,y:0};
                oPos = {x:SYMBOL_WIDTH,y:0};
            }else{
                oRegPoint = {x:SYMBOL_ANIM_WIDTH/2,y:0};
                oPos = {x:SYMBOL_WIDTH/2,y:0};
            }
        }else if(iRow === 1){
            if(iCol === 0){
                oRegPoint = {x:0,y:SYMBOL_ANIM_HEIGHT/2};
                oPos = {x:0,y:SYMBOL_HEIGHT/2};
            }else if(iCol === 4){
                oRegPoint = {x:SYMBOL_ANIM_WIDTH,y:SYMBOL_ANIM_HEIGHT/2};
                oPos = {x:SYMBOL_WIDTH,y:SYMBOL_HEIGHT/2};
            }else{
                oRegPoint = {x:SYMBOL_ANIM_WIDTH/2,y:SYMBOL_ANIM_HEIGHT/2};
                oPos = {x:SYMBOL_WIDTH/2,y:SYMBOL_HEIGHT/2};
            }
        }else{
            if(iCol === 0){
                oRegPoint = {x:0,y:SYMBOL_ANIM_HEIGHT};
                oPos = {x:0,y:SYMBOL_HEIGHT};
            }else if(iCol === 4){
                oRegPoint = {x:SYMBOL_ANIM_WIDTH,y:SYMBOL_ANIM_HEIGHT};
                oPos = {x:SYMBOL_WIDTH,y:SYMBOL_HEIGHT};
            }else{
                oRegPoint = {x:SYMBOL_ANIM_WIDTH/2,y:SYMBOL_ANIM_HEIGHT};
                oPos = {x:SYMBOL_WIDTH/2,y:SYMBOL_HEIGHT};
            }
        }

        _aStaticSymbols[iRow][iCol].show(_aWinningLine[_iCurWinShown].value,_aWinningLine[_iCurWinShown].amount,oPos,oRegPoint,(_bAutoSpin || _bActivateFreespin === false && _iTotFreeSpin >0)?1:3);

        _iCurWinShown++;   
    };
    
    this._hideAllWins = function(){
        
        for(var i=0;i<NUM_ROWS;i++){
            for(var j=0;j<NUM_REELS;j++){
                _aStaticSymbols[i][j].hideWinFrame();
            }
        }
        
        _oInterface.hideAllLines();
    };
    
    this._prepareForWinsShowing = function(){
        this._hideAllWins();
        _iTimeElaps = 0;
        _iCurWinShown = 0;
        _iTimeElaps = TIME_SHOW_WIN;
        _iCurState = GAME_STATE_SHOW_WIN;
        this.showWin(); 
        
        if(_iTotFreeSpin === 0){
            _oInterface.setSpinState(SPIN_BUT_STATE_SKIP);
        }
        
    };
	
    this.activateLines = function(iLine){
        _iLastLineActive = iLine;
        this.removeWinShowing();
		
        var iNewTotalBet = _iCurBet * _iLastLineActive;

        _iTotBet = iNewTotalBet;
        _oInterface.refreshTotalBet(_iTotBet);
        _oInterface.refreshNumLines(_iLastLineActive);


        if(iNewTotalBet>_iMoney){
            _oInterface.disableSpin();
        }else{
            _oInterface.enableSpin();
        }
    };

    this.resetCoinBet = function(){
        _iCurCoinIndex = 0;
        
        var iNewBet = parseFloat(COIN_BET[_iCurCoinIndex]);
        
        var iNewTotalBet = iNewBet * _iLastLineActive;

        _iCurBet = iNewBet;
        _iCurBet = Math.floor(_iCurBet * 100)/100;
        _iTotBet = iNewTotalBet;
        _oInterface.refreshBet(_iCurBet);
        _oInterface.refreshTotalBet(_iTotBet);       
        

        _oInterface.enableSpin();
    };
    
    this.addLine = function(){
        if(_iLastLineActive === NUM_PAYLINES){
            _iLastLineActive = 1;  
        }else{
            _iLastLineActive++;    
        }
		
        var iNewTotalBet = _iCurBet * _iLastLineActive;

        _iTotBet = iNewTotalBet;
        _iTotBet = Math.floor(_iTotBet * 100)/100;
        
        _oInterface.refreshTotalBet(_iTotBet);
        _oInterface.refreshNumLines(_iLastLineActive);


        _oInterface.enableSpin();
    };
    
    this.changeCoinBet = function(){
        _iCurCoinIndex++;
        if(_iCurCoinIndex === COIN_BET.length){
            _iCurCoinIndex = 0;
        }
        var iNewBet = parseFloat(COIN_BET[_iCurCoinIndex]);
        
        var iNewTotalBet = iNewBet * _iLastLineActive;

        _iCurBet = iNewBet;
        _iCurBet = Math.floor(_iCurBet * 100)/100;
        _iTotBet = iNewTotalBet;
        _iTotBet = Math.floor(_iTotBet * 100)/100;
        
        _oInterface.refreshBet(_iCurBet);
        _oInterface.refreshTotalBet(_iTotBet);       

        _oInterface.enableSpin();	
    };
	
    this.onMaxBet = function(){
        if(_iMoney < (MAX_BET*NUM_PAYLINES)){
                s_oMsgBox.show(TEXT_NO_MAX_BET);
                return;
        }
        
        var iNewBet = MAX_BET;
	_iLastLineActive = NUM_PAYLINES;
        
        var iNewTotalBet = iNewBet * _iLastLineActive;

        _iCurBet = MAX_BET;
        _iTotBet = iNewTotalBet;
        _oInterface.refreshBet(_iCurBet);
        _oInterface.refreshTotalBet(_iTotBet);
        _oInterface.refreshNumLines(_iLastLineActive);

        if(iNewTotalBet>_iMoney){
            _oInterface.disableSpin();
        }else{
            _oInterface.enableSpin();
            this.onSpin();
        }
    };
    
    this.removeWinShowing = function(){
        _oPayTable.resetHighlightCombo();
        
        _oInterface.resetWin();
        
        for(var i=0;i<NUM_ROWS;i++){
            for(var j=0;j<NUM_REELS;j++){
                _aStaticSymbols[i][j].hide();
                _aMovingColumns[j].setVisible(i,true);
                _aMovingColumns[j+NUM_REELS].setVisible(i,true);
            }
        }
        
        for(var k=0;k<_aMovingColumns.length;k++){
            _aMovingColumns[k].activate();
        }
        
        _iCurState = GAME_STATE_IDLE;
    };
    
    //THIS FUNCTION IS CALLED WHEN STOP BUTTON IS CLICKED DURING A SPIN
    this.forceStopReel = function(){
        
        if(_iTotFreeSpin === 0){
            _bAutoSpin = false;
        }
        
        
        _iCurState = GAME_STATE_IDLE;
        for(var i=0;i<NUM_REELS;i++){
            _aMovingColumns[i].forceStop(new Array( _aFinalSymbolCombo[0][i],_aFinalSymbolCombo[1][i],_aFinalSymbolCombo[2][i]),REEL_OFFSET_Y);
            _aMovingColumns[i+NUM_REELS].forceStop(null,REEL_OFFSET_Y+( ( SYMBOL_HEIGHT + SPACE_HEIGHT_BETWEEN_SYMBOLS)*NUM_ROWS));
        }  
        
        this._endReelAnimation();
    };
    
    this.onSpin = function(){
        
        if(_iMoney < _iTotBet && _iTotFreeSpin === 0){
            _oInterface.enableGuiButtons();
            _bAutoSpin = false;
            s_oMsgBox.show(TEXT_NOT_ENOUGH_MONEY);
            return;
        }
        
        
        stopSound("avatar_win");
        playSound("spin_but",1,false);
        
        _oInterface.disableBetBut(true);
        this.removeWinShowing();
        
        if(s_bLogged === true){
            if(_oLogo.currentAnimation === "freespin"){
                _iTotBet = 0;
            }else{
                _iTotBet = _iCurBet * _iLastLineActive;
            }
            tryCallSpin(_iCurBet,_iTotBet,_iLastLineActive);
        }else{
            this.generateLosingPattern();
        }

        this._hideAllWins();
        _oInterface.disableGuiButtons();
    };
    
    this.onSkip = function(){
        if(_iBonus > 0){
            this._hideAllWins();
            _oBonusPanel.show(BONUS_PRIZE[_iCurBonusPrizeIndex]);
            _iCurState = GAME_STATE_BONUS;
        }else{
            this.onSpin();
        }
    };
    
    //AUTOSPIN BUTTON CLICKED
    this.onAutoSpin = function(){
        _bAutoSpin = true;
        this.onSpin();
    };
    
    this.onStopAutoSpin = function(){
        _bAutoSpin = false;
        
        if(_iCurState !== GAME_STATE_SPINNING && _iCurState !== GAME_STATE_BONUS){
            _oInterface.enableGuiButtons();
        }
    };
    
    this.generateLosingPattern = function(){
         var aFirstCol = new Array();
         for(var i=0;i<NUM_ROWS;i++){
            var iRandIndex = Math.floor(Math.random()* (s_aRandSymbols.length-2));
            var iRandSymbol = s_aRandSymbols[iRandIndex];
            aFirstCol[i] = iRandSymbol;  
        }
        
        _aFinalSymbolCombo = new Array();
        for(var i=0;i<NUM_ROWS;i++){
            _aFinalSymbolCombo[i] = new Array();
            for(var j=0;j<NUM_REELS;j++){
                
                if(j === 0){
                    _aFinalSymbolCombo[i][j] = aFirstCol[i];
                }else{
                    do{
                        var iRandIndex = Math.floor(Math.random()* (s_aRandSymbols.length-2));
                        var iRandSymbol = s_aRandSymbols[iRandIndex];
                    }while(aFirstCol[0] === iRandSymbol || aFirstCol[1] === iRandSymbol || aFirstCol[2] === iRandSymbol);

                    _aFinalSymbolCombo[i][j] = iRandSymbol;
                }  
            }
        }
        
        _aWinningLine = new Array();
        _bReadyToStop = true;
    };
    
    this.onSpinReceived = function(oRetData){
        _iMoney -= _iTotBet;
        _oInterface.refreshMoney(_iMoney);
        
        if ( oRetData.res === "true" ){
                _iTotFreeSpin = parseInt(oRetData.num_freespin);
                if(oRetData.win === "true"){
                    _aFinalSymbolCombo = JSON.parse(oRetData.pattern);
                    _aWinningLine = JSON.parse(oRetData.win_lines);
                    _bActivateFreespin = false;

                    if(parseInt(oRetData.freespin) === 1 ){
                        _iBonus = BONUS_FREESPIN;   
                        _bAutoSpin = false;
                        _bActivateFreespin = true;
                    }else if(parseInt(oRetData.bonus) > 0){
                        _iBonus = BONUS_GOALKEEPER;
                        _bAutoSpin = false;
                        _iCurBonusPrizeIndex = oRetData.bonus_prize;
                    }else{
                        _iBonus = 0;
                    }
                    
                    //GET TOTAL WIN FOR THIS SPIN
                    _iTotWin = parseFloat(oRetData.tot_win);

                    _bReadyToStop = true;
                }else{
                    _iBonus = 0;
                    
                    _aFinalSymbolCombo = JSON.parse(oRetData.pattern);

                    _aWinningLine = new Array();
                    _bReadyToStop = true;
                }

                _iMoney = parseFloat(oRetData.money);
                
        }else{
                s_oGame.generateLosingPattern();
        }
        
        _iCurState = GAME_STATE_SPINNING;
    };
    
    this.onInfoClicked = function(){
        if(_iCurState === GAME_STATE_SPINNING){
            return;
        }
        
        if(_oPayTable.isVisible()){
            _oPayTable.hide();
        }else{
            _oPayTable.show();
        }
    };
    
    this.exitFromFreespinPanel = function(){
        _oInterface.refreshFreeSpinNum(_iTotFreeSpin);
        _oLogo.gotoAndPlay("freespin");
        _oInterface.setSpinState(SPIN_BUT_STATE_FREESPIN);
        
        _oInterface.disableSpin();
        this.onSpin();
    };
    
    this.exitFromBonus = function(){
        $(s_oMain).trigger("bonus_end",_iMoney);
        _oInterface.refreshMoney(_iMoney);
        
        if(_bAutoSpin){
            this.onSpin();
        }else{
            this.removeWinShowing();
            _oInterface.enableGuiButtons();
            _oInterface.disableBetBut(false);
            _oInterface.enableSpin();
        }
        
        $(s_oMain).trigger("save_score",_iMoney);
    };

    this.onExit = function(){
        this.unload();
        s_oMain.gotoMenu();
        
        $(s_oMain).trigger("end_session");
        $(s_oMain).trigger("share_event", {
                img: "200x200.jpg",
                title: TEXT_CONGRATULATIONS,
                msg:  TEXT_MSG_SHARE1+ _iMoney + TEXT_MSG_SHARE2,
                msg_share: TEXT_MSG_SHARING1 + _iMoney + TEXT_MSG_SHARING2
            });
    };
    
    this.getState = function(){
        return _iCurState;
    };
    
    this.update = function(){
        if(_bUpdate === false){
            return;
        }

        switch(_iCurState){
            
            case GAME_STATE_IDLE:{
                //THIS STATE OCCURS WHEN SLOT IS IN IDLE
                if(_bAutoSpin){
                    return;
                }
                
                if(_iTotFreeSpin === 0){
                    _iTimeElaps += s_iTimeElaps;
                    //MANAGES SPIN/AUTOSPIN IMAGE CHANGING
                    if(_iTimeElaps > TIME_SPIN_BUT_CHANGE){
                        _iTimeElaps = 0;
                        _oInterface.toggleAutoSpinImage();
                    }
                }
		_oInterface.update();
                break;
            }
            case GAME_STATE_SPINNING:{
                for(var i=0;i<_aMovingColumns.length;i++){
                    _aMovingColumns[i].update();
                }
                break;
            }
            case GAME_STATE_SHOW_ALL_WIN:{
                    
                    _iTimeElaps += s_iTimeElaps;
                    if(_iTimeElaps> TIME_SHOW_ALL_WINS){  
                        this._prepareForWinsShowing();
                    }
                    break;
            }
            case GAME_STATE_SHOW_WIN:{
                break;
            }
            case GAME_STATE_BONUS:{
                    _oBonusPanel.update();
                    break;
            }
        }
	
        
        _oAvatar.update();
    };
    
    s_oGame = this;
    
    this._init();
}

var s_oGame = null;
var s_oTweenController;