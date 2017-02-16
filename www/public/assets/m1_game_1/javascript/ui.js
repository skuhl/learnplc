//This is placed into a function so that we can treat it as a module. It gets run when we create Quintus.
//Q is the Quintus object. So you can work with it just like the Q in all of the tutorials.
Quintus.PLCUI = function(Q) {
    Q.Sprite.extend("Background", {
        init: function(image, p) {
            this.width = 800;
            this.height = 600;
            this.ground = 460;
            this._super(p, {
                x: (this.width / 2) * Q.state.scale,
                y: (this.height / 2) * Q.state.scale,
                // z: 10,
                asset: image,
                type: Q.SPRITE_UI,
            });
        }, 
    });
			
    Q.Sprite.extend("ActionBar", {
        init: function(p) {
            this._super(p,{
                x:200,
                y:575,
                asset: "actionBar.png"
            });
        },
    });

	//creates the container for the question
	Q.UI.Container.extend("Question_Container", {
		init: function(){
			this._super({
				x: Q.width - 200,
				y: Q.height - 20,
				w: 32,
				h: 16,
			});
		},
	});
		
	//creates the question label in the container
	Q.UI.Text.extend("Question_Label", {
		init: function( question ){
			this.selected = false;
			this.question = question;
			this.answer = "";
			this._super({
				label : "\n"+this.question.getQuestion().toString(),
				size: 15,
				color: "black",
				
			});
		},
		checkAnswer: function(answer) {
			return this.question.checkAnswer(answer);
		},
	});
	
    //creates the question label in the container
	Q.UI.Text.extend("Base_Label", {
		init: function( base ){
			this.base = base;
			this._super({
				label : base.toString(),
				size: 10,
				color: "black",
			});
		},
	});

	Q.Class.extend("InputBox", {
		init: function() {
			this.inputContainer = new Q.InputContainer();
			this.innerInputContainer = new Q.InnerInputContainer();
			this.inputLabel = new Q.Input();
		},
		insert: function(stage) {
			stage.insert(this.inputContainer);
			this.inputContainer.insert(this.innerInputContainer);
			this.innerInputContainer.insert(this.inputLabel);

			this.inputContainer.fit(5);
		},
		setInput: function(newInputString) {
			this.inputLabel.p.label = newInputString;
			this.inputContainer.p.fill = "rgba(0,0,0,0)";
		},
		setInputCorrect: function() {
			this.inputContainer.p.fill = "rgba(0,217,18,1)";
		}, 
		setInputIncorrect: function() {
			this.inputContainer.p.fill = "rgba(237,2,23,1)";
		}
	});
	
	Q.UI.Container.extend("InputContainer", {
		init: function(){
			this._super({
				fill: "rgba(0,0,0,0)",
				y: Q.height - 40,
				x: Q.width - 200,
			});
		},
	});

	Q.UI.Container.extend("InnerInputContainer", {
		init: function() {
			this._super({
				fill: "black",
				y: 10,
				x: 10,
				w: 230,
				h: 30,
			});
		}
	});

	Q.UI.Text.extend("InputBoxTitle", {
		init: function(){
			this._super({
				label : "INPUT",
				color : "black",
				y: Q.height - 70,
				x: Q.width - 200,
			});
		},
	});
	
	//creates the input line in container
	Q.UI.Text.extend("Input", {
		init: function(){
			this._super({
				label : " ",
				color : "red",
				x: 0,
				y: -20,
			});
		},
	});

	Q.UI.Text.extend("Resources", {
		init: function() {
			this._super({
				label : " ",
				color : "black",
				size:18,
				x: 80,
				y: 20
			});
			
		    },
		step: function(dt) {
			this.p.label = "Resources: ";
			this.p.label = this.p.label.concat(Q.state.teams[0].p.resources.toString());
		},
	});
	

    Q.Sprite.extend("Map", {
        init: function(p) {
            this._super(p,{ticks:150});
            this.p.background = new Q.Background("test-background.png");
            this.p.ground = 460;
            this.p.enemyBaseLocation = {x: Q.width-80, y: 365};
            this.p.ourBaseLocation = {x: 50, y: 100};
			this.p.unitSpawnY = 0;
			this.p.unitSpawnXMin = 30;
			this.p.unitSpawnXMax = 400;
        },
        step: function(dt) {
            this.p.ticks+=1;
        },
        addToStage: function(stage) {
            stage.insert(this);
            stage.insert(this.p.background);
        },
        setEnemyBase: function(enemyBase) {
            this.p.enemyBase = enemyBase;
            this.p.enemyBase.setX(this.p.enemyBaseLocation.x);
            this.p.enemyBase.setY(this.p.enemyBaseLocation.y);
        },
        setOurBase: function(ourBase) {
            this.p.ourBase = ourBase;
            this.p.ourBase.setX(this.p.ourBase.x);
            this.p.ourBase.setY(this.p.ourBase.y);
        },
		getGround: function() {
			return this.p.ground;
		},
		   setX: function(x) {
            this.p.x = x * Q.state.scale;
        },
        setY: function(y) {
            this.p.y = y * Q.state.scale;
        },
        getX: function() {
            return this.p.x/Q.state.scale;
        },
        getY: function() {
            return this.p.y/Q.state.scale;
        },
    });
};
