//Merges the two dictionaries together. Will take the values in dict1 if a key appears in dict1 and dict2
function joinDictionaries(dict1, dict2) {
    //Make sure dict1 and dict2 are initialized
    dict1 = typeof dict1 !== 'undefined' ? dict1 : {};
    dict2 = typeof dict2 !== 'undefined' ? dict2 : {};
    for( var key in dict2) {
        if(!(key in dict1)) {
            dict1[key] = dict2[key];
        }
    }

    return dict1;
}

function SpriteDefinition(spriteWidth, spriteHeight, visualWidth, visualHeight, spriteSheet, spriteName) {
    this.spriteWidth = spriteWidth;
    this.spriteHeight = spriteHeight;
    this.visualWidth = visualWidth;
    this.visualHeight = visualHeight;
    this.spriteSheet = spriteSheet;
    this.spriteName = spriteName;
}

//This is placed into a function so that we can treat it as a module. It gets run when we create Quintus.
//Q is the Quintus object. So you can work with it just like the Q in all of the tutorials.
Quintus.PLCEntities = function(Q) {

	var BotQuestion = function(offsetX, offsetY, question){
		this.qlabel = new Q.Question_Label( question );
		this.qcontainer = new Q.Question_Container();
		this.baseLabel = new Q.Base_Label(question.getBase());
        this.offsetX = offsetX;
        this.offsetY = offsetY;
        this.question = question;
	};
    BotQuestion.prototype.setX = function(x){
        this.qcontainer.p.x = x + this.offsetX;
    };
    BotQuestion.prototype.setY = function(y){
        this.qcontainer.p.y = y + this.offsetY;
    };
	BotQuestion.prototype.checkAnswer = function(answer) {
		return this.qlabel.checkAnswer(answer);
	};
	BotQuestion.prototype.select = function() {
		this.qlabel.selected = true;
	};
	BotQuestion.prototype.deSelect = function() {
		this.qlabel.selected = false;
	};
    BotQuestion.prototype.destroy = function() {
        this.qlabel.destroy();
        this.baseLabel.destroy();
        this.qcontainer.destroy();
    };
    BotQuestion.prototype.addToStage = function(stage) {
    	stage.insert(this.qcontainer);
    	this.qcontainer.insert(this.qlabel);
    	this.qcontainer.insert(this.baseLabel);
        this.qcontainer.fit(0,0);
		
		//console.log(this.question.getQuestion().toString().length);
		this.baseLabel.p.x = 5+5*this.question.getQuestion().toString().length;
		this.baseLabel.p.y = 25;
    }


    Q.Sprite.extend("Entity", {
        init: function(p, defaults) {
            //Initialize defaults if it isn't passed along. You should do this in any parent class
            defaults = typeof defaults !== 'undefined' ? defaults : {};
            var localDefaults = {};
            localDefaults.maxHP = 100;
            localDefaults.x = 0;
            localDefaults.y = 0;
			localDefaults.hpBarXOffset = 0;
			localDefaults.hpBarMaxWidth = 25;
			localDefaults.hpBarBuffer = 5;
			localDefaults.hpBarAlwaysDraw = false;
            defaults = joinDictionaries(defaults, localDefaults);

            this._super(p, defaults);
            this.p.curHP = this.p.maxHP;
            if(!("visualHeight" in this.p)) {
                this.p.visualHeight = this.p.h;
            }
            if(!("visualWidth" in this.p)) {
               this.p.visualWidth = this.p.w;
            }
        },
        setX: function(x) {
            this.p.x = x * Q.state.scale;
			if("healthBar" in this.p && this.p.healthBar != null) {
               this.p.healthBar.setX(this.getX());
            }
        },
        setY: function(y) {
            this.p.y = y * Q.state.scale;
			if("healthBar" in this.p && this.p.healthBar != null) {
                this.p.healthBar.setY(this.getY());
            }
        },
        getX: function() {
            return this.p.x/Q.state.scale;
        },
        getY: function() {
            return this.p.y/Q.state.scale;
        },
        takeDamage: function(damage) {
            //console.log("Taking Damage " + damage);
            //console.log("Cur HP " + this.p.curHP);
            this.p.curHP -= damage;
			if(this.p.curHP <= 0){
				this.p.curHP = 0;
			}
        },
        changeSprites: function(newSpriteDef, moveVertically, moveHorizontally) {
            //+ vert -> move down, + hor -> move right
            if(moveVertically != 0) {
                this.setY(this.getY() + moveVertically*(this.p.h/2 - newSpriteDef.spriteHeight/2));
            }

            if(moveHorizontally != 0) {
                this.setX(this.getX() + moveVertically*(this.p.w/2 - newSpriteDef.spriteWidth/2));
            }

            this.p.h = newSpriteDef.spriteHeight;
            this.p.w = newSpriteDef.spriteWidth;
            this.p.cx = newSpriteDef.spriteWidth/2;
            this.p.cy = newSpriteDef.spriteHeight/2;
            this.p.visualHeight = newSpriteDef.visualHeight;
            this.p.visualWidth = newSpriteDef.visualWidth;


            this.p.sheet = newSpriteDef.spriteSheet;
            this.p.sprite = newSpriteDef.spriteName;
        },
        addToStage: function(stage) {
            stage.insert(this);
			if(this.p.healthBar){
				stage.insert(this.p.healthBar);
			}
        },
		createHealthbar: function() {
			this.p.healthBar = new Q.HealthBar({unit: this,
				extraXOffset: this.p.hpBarXOffset,
				buffer: this.p.hpBarBuffer,
				maxWidth: this.p.hpBarMaxWidth,
				alwaysDraw: this.p.hpBarAlwaysDraw});

			//Ensure that the healthbar gets positioned properly
			this.setX(this.getX());
			this.setY(this.getY());
		},
		destroy: function() {
			if("team" in this.p) {
				this.p.team.removeUnit(this);
			}
			if("healthbar" in this.p) {
				this.p.healthBar.destroy();
			}
			this._super();
		}
    });

    Q.Entity.extend("Unit", {
        init: function(p, defaults) {
            var localDefaults = {};
            localDefaults.healthBarLength = 25;
            localDefaults.fallSpeed = 50;
            localDefaults.moveSpeed = 50;
            localDefaults.falling = true;
			localDefaults.parachute = false;
            localDefaults.spawned = false;
            localDefaults.attackPower = 5;
			localDefaults.selected = false;
			localDefaults.resourceCost = 5;
            localDefaults.slowed = false;
            localDefaults.hasProblem = true;
            localDefaults.questionXOffest = 0;
            localDefaults.questionYOffest = 0;
            localDefaults.questionDisplay = null;
            localDefaults.crashAnimation = null;
            localDefaults.crashing = false;
            localDefaults.problemDifficulty = 0;
            localDefaults.indicatorsXOff = 0;
            localDefaults.indicatorsYOff = 0;
            localDefaults.slowIndicator = null;
            localDefaults.attackIndicator = null;
            localDefaults.indicators = 0;

            defaults = joinDictionaries(defaults, localDefaults);
            this._super(p, defaults);
            
            this.p.problem = new this.p.problem( Q.state.teams[0].getUnits(), this.p.problemDifficulty );
            this.p.questionDisplay = new BotQuestion( this.p.questionXOffest, this.p.questionYOffest, this.p.problem);
            
        },
		
        fallingRobotStep: function(dt, spawnAnim, parachuteAnim) {
            if(Q.state.map.getGround() - this.getY() == this.p.visualHeight/2) { //We have hit the ground
                this.p.questionDisplay.destroy();
				if(this.p.parachute == false){
                    if(this.p.crashAnimation != null && !this.crashing) {
                        this.play(this.p.crashAnimation);
                        this.on("crashed", this, "crash");
                        this.crashing = true;
                    } else if (!this.crashing) {
                        this.crash();
                    }
				}
				else {
					this.deploy();
				}
			}
            //Check if we are our distance to the ground is less than (out height + the amount that we can move this tick)
            else if (Q.state.map.getGround() - this.getY() < (this.p.visualHeight/2 + this.p.fallSpeed*dt)) {
                //If it is less than, we have it the ground. Move us to the ground and then switch to walking
                //Move us to the ground
                this.setY(Q.state.map.getGround() - (this.p.visualHeight / 2));
            }

			else {
                this.setY(this.getY() + this.p.fallSpeed*dt);
			}
        },
        crash: function() {
            this.p.team.removeUnit(this);
            this.destroy();
        },
        //This is called to succesfully deploy the robot. Customize this if you want to customize the deployment.
        deploy: function() {
            this.p.falling = false;
            this.p.parachute = false;
            this.play(this.p.spawnAnimation);
            this.on("spawned",this,"setSpawned");
            if(this.p.questionDisplay) {
                this.p.questionDisplay.destroy();
            }

            this.createHealthbar();
            Q.stage().insert(this.p.healthBar);
            this.setX(this.getX());
            this.setY(Q.state.map.getGround() - (this.p.visualHeight / 2));
        },
        deployedRobotStep: function(dt) {
            //Check if we can reach the base - if you can, deal damage to the base and disappear
            if(Q.state.teams[1].p.base.p.x - this.p.x <=  Q.state.teams[1].p.base.p.visualWidth/2 + this.p.visualWidth/2){
                if(!this.p.attacking) {
                    this.attack(Q.state.teams[1].p.base);
					this.destroy();
                }
            } else {


                //Otherwise check if we can move
                var canMove = true;

                if(canMove) {
                    this.setX(this.getX() + this.p.moveSpeed * dt);
                }
            }
        },
        takeDamage: function(damage) {
            this._super(damage);
            if(this.p.curHP <= 0) {
                this.destroy();
            }
        },

        attack: function(target) {
            target.takeDamage(this.p.attackPower);
        },

        equals: function(otherUnit) {
            return (this.p.x == otherUnit.p.x && this.p.y == otherUnit.p.y && this.p.curHP == otherUnit.p.curHP);
        },
        setX: function(x) {
            this._super(x);
			if(this.p.questionDisplay != null){
				this.p.questionDisplay.setX(this.getX());
			}
			if(this.p.attackIndicator != null) {
			    this.p.attackIndicator.setX(this.getX());
			}
			
			if(this.p.slowIndicator != null) {
			    this.p.slowIndicator.setX(this.getX());
			}
        },
        setSpawned: function(){
            //console.log("setting spawned");
            this.p.spawned = true;
        },
        setY: function(y) {
            this._super(y);
			if(this.p.questionDisplay != null){
				this.p.questionDisplay.setY(this.getY()-16);
			}
			if(this.p.attackIndicator != null) {
                this.p.attackIndicator.setY(this.getY());
			}
			
			if(this.p.slowIndicator != null) {
                this.p.slowIndicator.setY(this.getY());
			}
        },
        setProblemDifficulty: function(newDifficulty){
            this.p.problemDifficulty = newDifficulty;
        },
        
		select: function() {
			if(this.p.parachute || this.p.changeBotType){
				console.log("TRIED TO SELECT BOT ALREADY DEPLOYED");
			} else {
				this.p.selected = true;
				this.p.questionDisplay.select();
			}
		},
        isParachuteDeployed: function() {
            return this.p.parachute;
        },
		solveQuestion: function () {
			this.p.questionDisplay.destroy();
			this.p.parachute = true;
            this.p.hasProblem = false;
            this.p.questionDisplay.destroy();
		},
		deSelect: function() {
			this.p.selected = false;
			this.p.questionDisplay.deSelect();
		},
        addToStage: function(stage) {
			this._super(stage);
			this.p.questionDisplay.addToStage(stage);
        },
		getResourceCost: function() {
			return this.p.resourceCost;
		},
        boostAttack: function(bonusAttack) {
            this.p.attackPower = this.p.attackPower * (1 + bonusAttack);
            this.p.attackIndicator = Q.stage().insert(
                        new Q.AttackBoostIndicator({
                                xOffset: this.p.indicatorsXOff,
                                yOffset: this.p.indicatorsYOff,
                                place: this.p.indicators})
           );
           this.p.attackIndicator.setX(this.getX());
           this.p.attackIndicator.setY(this.getY());
           this.p.indicators ++;
        },
        slowdownFallSpeed: function(amountSlowed) {
            this.p.originalFallSpeed = this.p.fallSpeed;
        	this.p.fallSpeed = this.p.fallSpeed*(1-amountSlowed);
            this.p.slowed = true;
            this.p.slowIndicator = Q.stage().insert(
                        new Q.SlowDownIndicator({
                                xOffset: this.p.indicatorsXOff,
                                yOffset: this.p.indicatorsYOff,
                                place: this.p.indicators})
           );
           this.p.slowIndicator.setX(this.getX());
           this.p.slowIndicator.setY(this.getY());
           this.p.indicators ++;
        },
        returnNormalFallSpeed: function() {
            if(this.p.slowed) {
                this.p.fallSpeed = this.p.originalFallSpeed;
                this.p.slowed = false;
                if(this.p.slowIndicator != null) {
                    this.p.slowIndicator.destroy();
                    this.p.slowIndicator = null;
                    this.p.indicators --;
                }
            }
        },
        destroy: function() {
            if(this.p.questionDisplay) {
                this.p.questionDisplay.destroy();
            }
            this._super();
            if(this.p.slowIndicator) {
                this.p.slowIndicator.destroy();
            }
            if(this.p.attackIndicator) {
                this.p.attackIndicator.destroy();
            }
        },
        hasProblem: function() {
            return this.p.hasProblem;
        }
    });

    Q.Unit.extend("Grunt", {
        init: function(p, defaults) {
            var localDefaults = {};
            localDefaults.healthBarLength = 25;
            localDefaults.fallSpeed = 50;
            localDefaults.moveSpeed = 50;
            localDefaults.falling = true;
			localDefaults.parachute = false;
            localDefaults.spawned = false;
			localDefaults.healingPower = 5;
			localDefaults.selected = false;
            localDefaults.sprite = "gruntAnimation";
            localDefaults.sheet = "gruntSheet";
            localDefaults.frame = 12;
            localDefaults.angle = 0;
            localDefaults.attackAnimation = "bash";
            localDefaults.spawnAnimation = "spawnGrunt";
            localDefaults.fallingAnimation = "crate";
            localDefaults.parachuteAnimation = "parachute";
            localDefaults.visualHeight = 42;
            localDefaults.visualWidth = 15;
            localDefaults.attackPower = 20;
			localDefaults.resourceCost = 5;
			localDefaults.questionXOffest = 0;
			localDefaults.questionYOffest = 0;
            localDefaults.crashAnimation = "crash";
            localDefaults.problem = Q.DecimalToBinary;
            
            localDefaults.indicatorsXOff = 20;
            localDefaults.indicatorsYOff = -2;
            
            defaults = joinDictionaries(defaults, localDefaults);
            this._super(p, defaults);
            this.add("animation");

            //this.add("Armor, Damage");
        },
		solveQuestion: function() {
			this._super();
			this.p.frame = 14;
		},
		select: function() {
			this._super();
			this.p.frame = 13;
		},
		deSelect: function() {
			this._super();
			this.p.frame = 12;
		},
        step: function(dt) {
            if(this.p.falling) {
                this.fallingRobotStep(dt,this.p.spawnAnimation,this.p.parachuteAnimation);
            } else if(this.p.spawned) {
                this.deployedRobotStep(dt);
            }
        },
    });

    //The SplitBotParent is the state of the bot, when all 3 children are locked together into one.
    //If it's problem is not solved, it will split into three little robots. (Split Bot Child).
    Q.Unit.extend("SplitBotParent", {
        init: function(p, defaults) {
        var localDefaults = {};
            localDefaults.sprite = "splitBotParentAnimation";
            localDefaults.sheet = "combinedSplitBotSheet";
            localDefaults.frame = 0;
            localDefaults.angle = 0;
            localDefaults.spawnAnimation = "split";
            localDefaults.splitAnimation = "split";
            localDefaults.fallingAnimation = "crate";
            localDefaults.parachuteAnimation = "split";
            localDefaults.crashAnimation = "crash";
            localDefaults.visualHeight = 42;
            localDefaults.visualWidth = 15;
            localDefaults.attackPower = 30;
            localDefaults.resourceCost = 5;
            localDefaults.parts = 3;
            localDefaults.fallSpeed = 30;
            //localDefaults.scale = 1.5;
            localDefaults.splitting = false;
			localDefaults.questionXOffest = 0;
			localDefaults.questionYOffest = 2;
            localDefaults.problem = Q.HexToBinary;
            localDefaults.indicatorsXOff = 20;
            localDefaults.indicatorsYOff = -2;
            localDefaults.problemDifficulty = 2;

            //Variables specific to split bot
            var heightOfMap = Q.state.map.p.ground;
            localDefaults.splitPointBase = 5 * heightOfMap/8;
            localDefaults.splitPointRange =heightOfMap*.1; //The actual split point can vary up to 10% of the height of the window


            //Get a random number (0,1). Make it to be (0,splitPointRange). Subtract off half the range to get (-splitPointRange/2, +splitPointRange/2).
            //Add the base split point to get (baseSplit-splitPointRange/2, baseSplit+splitPointRange/2)
            localDefaults.splitPoint = Math.floor((Math.random()*localDefaults.splitPointRange) - localDefaults.splitPointRange/2 + localDefaults.splitPointBase);

            defaults = joinDictionaries(defaults, localDefaults);
            this._super(p, defaults);
            this.add("animation");

        },
        fallingRobotStep: function(dt, spawnAnimation, parachuteAnimation) {
            this._super(dt, spawnAnimation, parachuteAnimation);
            if(this.getY() >= this.p.splitPoint && !this.isParachuteDeployed() && !this.p.splitting) {
                this.p.splitting = true;
                this.play(this.p.splitAnimation); //start the split
                this.on("splitFinished",this,"splitComplete");
            }
        },
        splitComplete: function() {
            for(var i = 0; i < this.p.parts; i++) {
                var child = new Q.SplitBotChild({x: this.getX(),
                    y: this.getY(), individualNumber: i, positionFromCenter: true});
                this.p.team.addUnit(child);
                if(this.p.parachute) {
                    child.solveQuestion();
                }
            }

            this.p.team.removeUnit(this);
            this.destroy();

            if(this.p.parachute) {
                //deploy individual units parachutes
            }
        },
        deploy: function() {
            if(!this.p.splitting) {
                this.p.splitting = true;
                this.play(this.p.splitAnimation); //start the split
                this.on("splitFinished",this,"splitComplete");
            }
        },
        step: function(dt) {
            if(this.p.falling) {
                this.fallingRobotStep(dt,this.p.spawnAnimation,this.p.parachuteAnimation);
            } else if(this.p.spawned) {
                this.deployedRobotStep(dt);
            }
        },
        solveQuestion: function() {
            if(!this.p.splitting) {
                this._super();
                this.p.splitting = true;
                this.play(this.p.splitAnimation); //start the split
                this.on("splitFinished",this,"splitComplete");
            }
        },
    });


    Q.Unit.extend("SplitBotChild", {
        init: function(p, defaults) {
            var localDefaults = {};
            switch(p.individualNumber) {
                case 0:
                    p.sheet = "blueSplitBotSheet";
                    break;
                case 1:
                    p.sheet = "greenSplitBotSheet";
                    break;
                case 2:
                    p.sheet = "orangeSplitBotSheet";
                    break;
                default:
                    p.sheet = "blueSplitBotSheet";
                break;
            }

            if(p.positionFromCenter) {
                switch(p.individualNumber) {
                    case 0: //blue
                        p.x -= 9;
                        p.y -= 3;
                        localDefaults.questionYOffest = -30;
                        localDefaults.questionXOffest = -5;
                        break;
                    case 1: //green
                        p.y += 4;
                        localDefaults.questionYOffest = 0;
                        break;
                    case 2: //orange
                        p.x += 10;
                        p.y -= 3;
                        localDefaults.questionYOffest = -30;
                        localDefaults.questionXOffest = 5;
                        break;
                }
            }

            localDefaults.sprite = "splitBotChildAnimation";
            localDefaults.sheet = "blueSplitBotSheet";
            localDefaults.frame = 0;
            localDefaults.angle = 0;
            localDefaults.spawnAnimation = "spawn";
            localDefaults.fallingAnimation = "crate";
            localDefaults.parachuteAnimation = "deployParachute";
            localDefaults.crashAnimation = "crash";
            //localDefaults.visualHeight = 42;
            localDefaults.visualHeight = 12;
            localDefaults.visualWidth = 15;
            localDefaults.attackPower = 15;
            localDefaults.resourceCost = 0;
            localDefaults.fallSpeed = 30;
            localDefaults.problem = Q.HexToBinary;
            localDefaults.indicatorsXOff = 0;
            localDefaults.indicatorsYOff = 0;
            defaults = joinDictionaries(defaults, localDefaults);
            this._super(p, defaults);
            this.add("animation");

            //this.add("Armor, Damage");
            this.setX(p.x);
            this.setY(p.y)

        },
        boostAttack: function(bonusAttack) {
            //Don't want to boost his attack because they never actually spawn.
        },

        step: function(dt) {
            if(this.p.falling) {
                this.fallingRobotStep(dt,this.p.spawnAnimation,this.p.parachuteAnimation);
            } else if(this.p.spawned) {
                this.deployedRobotStep(dt);
            }
        },
        solveQuestion: function() {
            this._super();
            this.p.frame = 14;
            this.p.visualHeight = 25;
            this.play(this.p.parachuteAnimation);
        },
        select: function() {
            this._super();
            this.p.frame = 13;
        },
        deSelect: function() {
            this._super();
            this.p.frame = 12;
        },
    });

//Creates HealingGrunt that repair the base if they are not solved in time.
    Q.Unit.extend("HealingGrunt", {
        init: function(p, defaults) {
            var localDefaults = {};
            localDefaults.sprite = "healingAnimation";
            localDefaults.sheet = "healingSheet";
            localDefaults.frame = 2;
			localDefaults.count = 0;
            localDefaults.angle = 0;
            localDefaults.visualHeight = 42;
            localDefaults.visualWidth = 15;
            localDefaults.attackPower = 30;
			localDefaults.healingPower = 60;
			localDefaults.resourceCost = 0;
			localDefaults.questionXOffest = -1;
			localDefaults.questionYOffest = -38;
			localDefaults.changeBotType = false;
            localDefaults.problem = Q.OctalToBinary;
            
            localDefaults.indicatorsXOff = 20;
            localDefaults.indicatorsYOff = -2;

            defaults = joinDictionaries(defaults, localDefaults);
            this._super(p, defaults);
            this.add("animation");
        },
		solveQuestion: function() {
			this._super();
            this.p.hasProblem = false;
			//this.p.frame = 1
			this.p.changeBotType = true;
            this.play("change");
		},
		select: function() {
			this._super();
			this.p.frame = 0;
		},
		deSelect: function() {
			this._super();
			this.p.frame = 2;
		},

		health: function(target){
			target.heal(this.p.healingPower);
		},

        step: function(dt) {
			this.p.questionDisplay.setY(100);
			//Set bot on ground
			this.setY(Q.state.map.getGround() - (this.p.visualHeight / 2));

			//If bot touches the base
			
			if(Q.state.teams[1].p.base.p.x - this.p.x <=  Q.state.teams[1].p.base.p.visualWidth/2 + this.p.visualWidth/2){

				if (this.p.changeBotType) {
                    this.attack(Q.state.teams[1].p.base);
				}

				else{
					this.health(Q.state.teams[1].p.base);
				}

				this.p.questionDisplay.destroy();

				this.destroy();

			}
			
			else{

				//makes sure that the HealingGrunt starts at the edge and move towards base
				if(this.p.count == 0){
					this.setX(0);
					this.p.count++;
				}
				else{
				this.setX(this.getX() + this.p.moveSpeed * dt);
				}
			}
		}
    });

    Q.Entity.extend("HealthBar",{
        init: function(p) {
            this._super(p,{
                color: "red",
                maxWidth: 25,
                w: 25,
                h: 5,
                buffer: 5,
				z: 10,
                extraXOffest: 0, //For taking out the width of weapons and such
				alwaysDraw: false,
                type: Q.SPRITE_UI,
            });
        },

        draw: function(ctx) {
			//console.log("drawing health bar for turret");
			if(this.p.unit.p.curHP !== this.p.unit.p.maxHP || this.p.alwaysDraw) {
                ctx.fillStyle = this.p.color;
                this.p.w = this.p.maxWidth*(this.p.unit.p.curHP/this.p.unit.p.maxHP);

                ctx.fillRect(-this.p.cx,
                         -this.p.cy,
                         this.p.w,
                         this.p.h);
				ctx.lineWidth = 1;
				ctx.strokeRect(-this.p.cx,
							 -this.p.cy,
							 this.p.maxWidth,
							 this.p.h);
			}
        },

        setX: function(x) {
            this._super(x - this.p.extraXOffset) ;
        },

        setY: function(y) {
            this._super(y - this.p.unit.p.visualHeight/2 - this.p.buffer);
        },
    });
    
    Q.Entity.extend("AbilityIndicator", {
        init: function(p) {
            //expects place to be defined in p
            this._super(p, {
                place: 0,
                scale: .5,
                xOffset: 0,
                yOffset: 0,
            });
        },
        setX: function(newX) {
            this.p.x = newX + this.p.xOffset + this.p.place*8;
        },
        setY: function(newY) {
            this.p.y = newY + this.p.yOffset;
        }
    });
    
    Q.AbilityIndicator.extend("SlowDownIndicator", {
        init: function(p) {
            p.sheet = "abilityIndicatorsSheet";
            p.frame = 0;
            this._super(p);
        }
    });
    
    Q.AbilityIndicator.extend("AttackBoostIndicator", {
        init: function(p) {
            p.sheet = "abilityIndicatorsSheet";
            p.frame = 1;
            this._super(p);
        }
    });

    Q.Entity.extend("EnemyBase",{

        init: function(p) {
            this._super(p,{sheet:"enemyBuilding",
			sprite: "baseDestroyAnimation",
            frame:0, 
            maxHP:500,
            hpBarMaxWidth: 80,
            hpBarXOffset: 30,
            hpBarBuffer: 10,
            hpBarAlwaysDraw: true,
            visualWidth: 130
        });
            this.add("animation");
            this.createHealthbar();
        },
        takeDamage: function(damage) {
            this._super(damage);
            if(this.p.curHP <= 0) {
				//var player = new init();
				this.play("destroy");
				Q.state.endingGame = true;
				this.on("doneExploding", this,"endGame");
            }
        },
		heal: function(health){
			this.p.curHP += health;
			if(this.p.curHP > this.p.maxHP){
				this.p.curHP = this.p.maxHP;
			}
		},
		endGame: function() {
            Q.stage().pause();		    
            Q.stageScene("VictoryScene",1);
		}
    });

    //The Team Class, init is the constructor. This extends Evented so that it can send and recieve events
    //You have to insert it into the stage to have update run.
    Q.Evented.extend("Team", {
        init: function(p) {
            this.p = p; //P has to be defined. Errors are thrown otherwise.
            this.p.units = [];
            if(this.p.resources == null) {
                this.p.resources = 10;
            }
            //Gotta put the instance of the turret entity here too
        },
        update: function(dt) {

        },
        addUnit: function(newUnit) {
            newUnit.p.team = this;
            this.p.units.push(newUnit);

        },
        removeUnit: function(unit) {
            var index = this.p.units.indexOf(unit);
            if(index >= 0) {
                this.p.units.splice(index, 1);
            }

        },
        addToStage: function(stage) {
            stage.insert(this);
        },
        getUnits: function() {
            return this.p.units;
        }
    });

    Q.Team.extend("PlayerTeam", {
        init: function(p) {
            this._super(p);
            this.p.boostAttack = false;


			this.spawner = new UnitSpawner(this, [[Q.Grunt, 5],[Q.HealingGrunt,1],[Q.SplitBotParent,1]], 80, 200);
        },
        update: function(dt) {
            //Spawning new basic units will happen here
            if (Q.state.map.p.ticks % 200 == 0) {
			//	var temp = new Q.Grunt();
            //    this.addUnit(temp,temp.p.resourceCost);
            }

            if(this.p.resources <= 0 && this.p.units.length == 0 && !Q.state.endingGame) {
				Q.stage().pause();
                Q.stageScene("DefeatScene",1);
            }
			this.spawner.update(dt);
        },


        addUnit: function(newUnit) {
			var resourceCost = newUnit.getResourceCost();
            //Check to see if this unit can actually spawn
            if(this.p.resources < resourceCost) {
				newUnit.destroy(); //Make sure we get rid of it
                return;
            }
            this._super(newUnit);

            //Dealing with resources here because we don't know if the enemy will be using resources
            this.p.resources -= resourceCost;
            newUnit.addToStage(Q.stage());

            if(this.p.boostAttacking) {
                newUnit.boostAttack(this.p.bonusAttack);
            }
        },
        addDeployedUnit: function(newUnit) {
            var resourceCost = newUnit.getResourceCost();
            if(this.p.resources < resourceCost) {
                newUnit.destroy(); //Make sure we get rid of it
                return;
            }

            newUnit.p.team = this;
            this.p.units.push(newUnit);

            //Dealing with resources here because we don't know if the enemy will be using resources
            this.p.resources -= resourceCost;
            newUnit.addToStage(Q.stage());
        },
        removeUnit: function(newUnit) {
            this._super(newUnit);
        },
        strengthenUnits: function(bonusAttack, duration) {
            //Bonus attack is the extra percentage of attack each unit should get
            this.p.bonusAttack = bonusAttack;
            this.p.boostAttacking = true;
        },
        returnUnitsToNormalStrength: function() {
            this.p.bonusAttack = 0;
            this.p.boostAttacking = false;
            console.log("Done boosting");
        },
        slowdownUnitFallSpeed: function(amountSlowed) {
            for(var i = 0; i < this.p.units.length; i++) {
                this.p.units[i].slowdownFallSpeed(amountSlowed);
            }
        },
        returnNormalUnitFallSpeed: function() {
            for(var i = 0; i < this.p.units.length; i++) {
                this.p.units[i].returnNormalFallSpeed();
            }
        }
    });


    Q.Team.extend("EnemyTeam", {
        init: function(p) {
            this._super(p);
        },
        addToStage: function(stage) {
            this._super(stage);
        }
    })
};

