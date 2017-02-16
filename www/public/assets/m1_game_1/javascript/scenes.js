//This is placed into a function so that we can treat it as a module. It gets run when we create Quintus.
//Q is the Quintus object. So you can work with it just like the Q in all of the tutorials.
Quintus.PLCScenes = function(Q) {
    Q.scene("BasicLevel", function(stage) {
        //Initialize the level here i.e. create all general listeners, create the bases, and start the game
        //TEST ENEMIES: REMOVE THESE
		Q.stageScene("GameUI",1);
		Q.state.scale = 1;
        stage.add("viewport"); 
        var map = new Q.Map();
        Q.state.map = map;
        map.setEnemyBase(new Q.EnemyBase());
        map.addToStage(stage);
		map.p.enemyBase.addToStage(stage);       
        
        Q.state.teams = [];
        Q.state.teams[0] = new Q.PlayerTeam({teamNumber: 0, resources: 150}); 		//This is us
        Q.state.teams[1] = new Q.EnemyTeam({teamNumber: 1, resources: 100, base: map.p.enemyBase}); 		//This is the enemy
        Q.state.endingGame = false;
        
		// var container = new Q.Input_Container();
		// stage.insert(container);
		// var inputLabel = stage.insert(new Q.Input(), container);
        var inputBox = new Q.InputBox();
        inputBox.insert(stage);
		//stage.insert(new Q.InputBoxTitle());
		stage.insert(new Q.Resources());
        stage.insert(new Q.ActionBar);
        Q.state.teams[0].addToStage(stage);
        Q.state.teams[1].addToStage(stage);

        var input = new Q.ProblemInputHandler(Q.state.teams[0], inputBox);
        
        //We do not need this at the moment
        // stage.on("step", function() {
        // 	if(Q.inputs['left']) {
        // 		this.moveTo(this.)
        // 	}
        // });	
    });
	
	 Q.scene("GameUI", function(stage) {
	//	stage.insert(new Q.UI.Button({
	// 			x:26,
	// 			y:Q.height-24,
	// 			sheet:"button1Sheet",
	// 			frame:0
 //        }, function() {
 //           // Q.state.teams[0].p.resources=50;
 //        }
 //        ));
 
 
        var slowdownability = new Q.RobotSlowDown(stage, 26, Q.height-24);
        stage.insert(slowdownability);
		
            

        var attackBoostAbility = new Q.DamageBoostAbility(stage, 26+40, Q.height-24);
        stage.insert(attackBoostAbility); //Make sure to insert it so that its update gets called
		
		
		/*var button = stage.insert(new Q.UI.Button({ 
			x: Q.width-20, 
			y: 22, 
			sheet:"pauseSheet",
			frame:0,
			scale:3
			}));
			
		button.on("click",function() {
				Q.stage().pause();
				Q.stageScene("pauseScene",1);
        });*/
    
});

Q.scene("pauseScene", function(stage) {
	
        var slowdownability = new Q.RobotSlowDown(stage, 26, Q.height-24);
        //stage.insert(slowdownability);
		
            

        var attackBoostAbility = new Q.DamageBoostAbility(stage, 26+40, Q.height-24);
        //stage.insert(attackBoostAbility); //Make sure to insert it so that its update gets called

	
			var button = stage.insert(new Q.UI.Button({ 
			x: Q.width-20, 
			y: 22, 
			sheet:"pauseSheet",
			scale:3
			}));
			
		button.on("click",function() {
			frame:0;
            Q.stageScene(null, 1); //Remove the UI layer
			Q.stageScene("GameUI", 1);
				Q.stage().unpause();
				
		});

	
		stage.insert(new Q.UI.Text({ 
			label: "paused",
			color: "black",
			align: 'center',
			x: Q.width/2,
			y: Q.height/2
		}));
});

    
    Q.scene("InstructionScene", function(stage) {
        stage.insert(new Q.Background("instructions-background.png"));
        Q.stageScene("InstructionSceneUI", 1);
    });
    
    Q.scene("InstructionSceneUI", function(stage) {
        stage.insert(new Q.UI.Button({
            label: "Next",
            x: 800/5 * 4,
            y: 600/7 * 6,
            fill: "#7FFF00",
            border: 5,
        }, function() {
            Q.stageScene(null, 1);
            Q.stageScene("InstructionScene2"); // switch to start screen
        }));

          stage.insert(new Q.UI.Button({
            label: "Prev",
            x: 800/5 * 1,
            y: 600/7 * 6,
            fill: "#FFD700",
            border: 5,
        }, function() {
            Q.stageScene(null, 1);
            Q.stageScene("StartScene"); // switch to start screen
        }));
    });

     Q.scene("InstructionScene2", function(stage) {
        stage.insert(new Q.Background("second-screen.png"));
        Q.stageScene("InstructionSceneUI2", 1);
    });
    
    Q.scene("InstructionSceneUI2", function(stage) {
        stage.insert(new Q.UI.Button({
            label: "Main Menu",
            x: 800/5 * 4,
            y: 600/7 * 1,
            fill: "#7FFF00",
            border: 5,
        }, function() {
            Q.stageScene(null, 1);
            Q.stageScene("StartScene"); // switch to start screen
        }));

                stage.insert(new Q.UI.Button({
            label: "Prev",
            x: 800/5 * 3,
            y: 600/7 * 1,
            fill: "#FFD700",
            border: 5,
        }, function() {
            Q.stageScene(null, 1);
            Q.stageScene("InstructionScene"); // switch to start screen
        }));

    });



	
    Q.scene("StartScene", function(stage) {
        stage.insert(new Q.Background("start-background.png"));
        Q.stageScene("StartSceneUI", 1);
    });

    Q.scene("StartSceneUI", function(stage) {
        //start button
        stage.insert(new Q.UI.Button({   
            label: "Start",
            x: 800/2,
            y: 600/2,
            fill: "#FFD700",
            border: 5,
        }, function() {
            Q.stageScene(null, 1); //Remove the UI layer
            Q.stageScene("BasicLevel"); //Switch to the BasicLevel
        }));
        //instructions button
        stage.insert(new Q.UI.Button({   
            label: "Instructions",
            x: 800/2,
            y: 600/2 + 70,
            fill: "#7FFF00",
            border: 5,
        }, function() {
            Q.stageScene(null, 1); //Remove the UI layer
            Q.stageScene("InstructionScene"); //Switch to instructions
        }));
    });

    Q.scene("VictoryScene", function(stage) {
        //stage.insert(new Q.Background("victory-background.png"));
        Q.state.endMessage = "Victory!";
        Q.stageScene("EndSceneUI", 1);
    });

    Q.scene("DefeatScene", function(stage) {
        //stage.insert(new Q.Background("defeat-background.png"));
        Q.state.endMessage = "Defeat";
        Q.stageScene("EndSceneUI", 1);
    });

    Q.scene("EndSceneUI", function(stage) {
        //stage.insert(new Q.UI.Button({  
		
	    var box = stage.insert(new Q.UI.Container({x: Q.width/2, y: Q.height/2, fill: "rgba(0,0,0,0.5)"}));

	    var button = box.insert(new Q.UI.Button({ x: 0, y: 0, fill: "#CCCCCC",label: "Play Again" }));     		
/*             label: "Go Back to Start Screen",
            x: 800/2,
            y: 600/2,
            fill: "#990000",
            border: 5, */
            button.on("click",function() {
            //Q.stageScene(null, 1); //Remove the UI layer
			Q.clearStages();
            Q.stageScene("StartScene"); //Switch to the BasicLevel
        });
		box.fit(20);
		
		var label = stage.insert(new Q.UI.Text({
            label: Q.state.endMessage,
            x: Q.width/2, 
            y: Q.height/2 - 150,
            size: 50,
		    color: "black",
        }));
    });
};
