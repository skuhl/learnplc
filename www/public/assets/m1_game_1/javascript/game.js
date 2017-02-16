//Only start the game once the page and all javascript has loaded. This is an event provided by the browser
window.addEventListener('load',function() {
    var Q = Quintus({ development: true,
                        imagePath: "/public/assets/m1_game_1/images/"}).include("Sprites, Scenes, Input, Touch, Anim, 2D, Audio, UI") //Include and load modules build into Quintus
        .include("PLCUI, PLCEntities, PLCScenes, PLCProblem, PLCUnitSpawner, PLCAbilities, PLCInput") //Include and load our own modules
        .enableSound()
    //TODO: Figure out scaling of our game so that it can look the same at many sizes
        .setup("BtoC_Game",{
            //width: 800,
            //height: 600,
            //maximize: true,
        })
		//.controls()
        .touch(); //Initialize touch for clicking buttons
	/*	
	* The extra keys that we are using are:
	*	NUMPAD_0: 96, NUMPAD_1: 97.
	*	NUMPAD_2: 98, NUMPAD_3: 99,
	*	NUMPAD_4: 100, NUMPAD_5: 101,
	*	NUMPAD_6: 102, NUMPAD_7: 103,
	*	NUMPAD_8: 104,	NUMPAD_9: 105,
	*
	* We are not adding these directly to the quintus library
	* so that it is easy to get updates from the library without having to worry
	* that all of our changes are transfered
	*/
	Q.input.keyboardControls({
		ZERO: "zero", 96: "zero", 
		ONE: "one", 97: "one",
		A: "A" , 65: "A",
		B: "B" , 66: "B",
		C: "C" , 67: "C",
		D: "D" , 68: "D",
		E: "E" , 69: "E",
		F: "F" , 70: "F",
		DELETE: "delete", 110: "delete",
		ENTER: "enter",
		UP: "up", DOWN: "down", X: "action",
		LEFT: "left", RIGHT: "right",
        BACKSPACE: "backspace",
        ESC: "escape"
    });
	
    Q.state.scale = 1;
    //Load all Assets and start the game when complete
    Q.load("enemybuilding.png, test-background.png," + 
        "actionBar.png, start-background.png, pauseButton.png, GruntSheet.png, HealingSheet.png," + 
        "slowdownability.png, attackboostability.png, instructions-background.png, splitbot-green-spritesheet.png, splitbot-blue-spritesheet.png," +
        "splitbot-orange-spritesheet.png, splitbot-combined-spritesheet.png, abilityIndicators.png , second-screen.png" , function() {
        Q.debug = false;
		Q.sheet("slowDownSheet","slowdownability.png", {tileH:32, tileW:32});
		Q.sheet("attackBoostSheet","attackboostability.png", {tileH:32, tileW:32});
		Q.sheet("pauseSheet","pauseButton.png", {tileH:7, tileW:8});
        Q.sheet("enemyBuilding", "enemybuilding.png", { tileH: 300, tileW: 300 } );
        Q.sheet("gruntSheet", "GruntSheet.png", { tileH:64, tileW:32 } );
		Q.sheet("healingSheet", "HealingSheet.png", { tileH:64, tileW:32 } );
		Q.sheet("abilityIndicatorsSheet", "abilityIndicators.png", {tileH: 16, tileW:16});

        Q.animations("gruntAnimation",{
            spawnGrunt: { frames: [8,9,10,11], rate: 1/2, loop:false, trigger:'spawned'},
            bash: { frames: [0,1,2,3,4], rate:1/4, loop:false, trigger:'bashed'},
            crate: { frames: [12], rate:1/2 },
            parachute: { frames: [14], rate:1/2 },
            select: { frames: [13], rate:1/2},
            crash: {frames: [5,6,7], rate: 1/2, trigger: 'crashed', loop: false},
        });
		
		Q.animations("baseDestroyAnimation",{
			destroy: {frames: [1,2,3,4,5,6,7,8,9], rate: 1/2, loop: false, trigger: 'doneExploding'}
		});
		
		Q.animations("healingAnimation",{
            spawnGrunt: { frames: [8,9,10,11], rate: 1/2, loop:false, trigger:'spawned'},
            crate: { frames: [12], rate:1/2, loop:false },
            select: { frames: [13], rate:1/2, loop:false},
            change: {frames: [16,17,18,19], rate:1/2, loop:false}
        });

        //Split bot sheet + animations
        Q.sheet("greenSplitBotSheet", "splitbot-green-spritesheet.png", { tileH:64, tileW:32 });
        Q.sheet("blueSplitBotSheet", "splitbot-blue-spritesheet.png", { tileH:64, tileW:32 });
        Q.sheet("orangeSplitBotSheet", "splitbot-orange-spritesheet.png", { tileH:64, tileW:32 });
        Q.sheet("combinedSplitBotSheet", "splitbot-combined-spritesheet.png", { tileH:64, tileW:32 });

        Q.animations("splitBotParentAnimation",{ 
            split: {frames: [0,1,2], rate: 1/2, loop:false, trigger: "splitFinished"},
            crash: {frames: [4,5,6], rate: 1/2, trigger: 'crashed', loop: false}
        });

        Q.animations("splitBotChildAnimation",{
            spawn: {frames: [0,1,2,3,4], rate:1/4, loop:false, trigger: "spawned"},
            deployParachute: {frames: [0, 5, 6, 7], rate: 1/2, loop: false},
            crash: {frames: [8,9,10], rate: 1/2, trigger: 'crashed', loop: false}
        });
    	
        //Q.sheet("tiles","tiles.png", { tilew: 32, tileh: 32 });
        Q.compileSheets("test-sprites.png","test-sprites.json","test-background.png");
        Q.stageScene("StartScene");
        //Q.stageScene("BasicLevel");
    });
	
    
    
    //http://codenachos.com/view/scale-html5-app-game-to-fit-screen
    //Can be used for resizing
    // window.onresize = function() e{ 
    // 	 	kitus = document.getElementById('quintus');
    
    // 		function viewport()
    // 		{
    // 			var e = window
    // 			a = 'inner';
    // 			if ( !( 'innerWidth' rin window ) ) {
    // 				a = 'client';
    // 				e = document.documentElement || document.body;
    // 			}
    // 			return { width : e[ a+'Width' ] , height : e[ a+'Height' ] }
    // 		}
    
    // 		a = viewport();
    
    // 		kitus.style["MozTransform"] = "scale("+(a.height)/(600)+")";
    // 	  }; 
});

