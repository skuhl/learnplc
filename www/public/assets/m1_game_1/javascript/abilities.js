Quintus.PLCAbilities = function(Q) {

	//The base ability class. Since we need to manage cooldowns and such, we make it extend
	//evented to get an update function
    Q.Evented.extend("Ability", {
    	init: function(stage, x, y, runTime, cooldownTime, buttonProperties) {
    		/* Input: Stage - the stage that the buttons will be added too.
			* x,y - the postion the button is located at
			* runTime - the time that the ability lasts for in seconds
			* cooldown - The amount of time the ability will go on cooldown in seconds 
			* buttonProperies - properties for the button other than x,y. This includes all necessary 
			*	image infromation
			*/
            this.p = {}; //P has to be defined. Errors are thrown otherwise.
            this.p.runtime = runTime;
            this.p.cooldownTime = cooldownTime;
            this.p.stage = stage;
			buttonProperties.x = 0;
			buttonProperties.y = 0;
            buttonProperties.fill = "#CCCCCC";
            buttonProperties.ability = this;
            this.p.container = stage.insert(new Q.UI.Container({
                x: x, y: y, fill: "rgba(0,0,0,0)"
                }));
            this.p.container.fit(0,0); //Have the box fit with 0 padding.
            this.p.button = this.p.container.insert(new Q.UI.Button(buttonProperties, this.activateAbility));

            this.p.onCooldown = false;
            this.p.isRunning = false;
            this.p.counter = 0;

            this.p.counterLabel = null;
    	   this.p.disabledOverlay = null;
        },
    	update: function(dt) {
    		//Don't change this or override this
            if(this.p.isRunning) {
                console.log("Running");
                if(this.p.counterLabel == null) {
                    var floor = Math.floor(this.p.counter);
                    this.p.counterLabel = this.createAbilityCounterLabel(floor.toString(), "white");
                } else if(Math.floor(this.p.counter) != Math.floor(this.p.counter - dt)) {
                    this.p.counterLabel.destroy();
                    var floor = Math.floor(this.p.counter);
                    this.p.counterLabel = this.createAbilityCounterLabel(floor.toString(), "white");
                }

                this.p.counter -= dt; //It looks like dt is in seconds, so this should be good.

                if(this.p.counter <= 0) {
                    this.p.counterLabel.destroy();
                    this.turnOffAbility();
                }
            } else if (this.p.onCooldown) {
                if(this.p.disabledOverlay == null) {
                    this.p.disabledOverlay = new Q.UI.Container({
                    x: 0, y: 0, fill: "rgba(0,0,0,.75)",
                    w:32,
                    h:32,
                    });
                    this.p.container.insert(this.p.disabledOverlay);
                }

                if(this.p.counterLabel == null) {
                    var floor = Math.floor(this.p.counter);
                    this.p.counterLabel = this.createAbilityCounterLabel(floor.toString(), "gray");
                    console.log("Added a label");
                } else if(Math.floor(this.p.counter) != Math.floor(this.p.counter - dt)) {
                    this.p.counterLabel.destroy();
                    var floor = Math.floor(this.p.counter - dt);
                    this.p.counterLabel = this.createAbilityCounterLabel(floor.toString(), "gray");
                }

                this.p.counter -= dt; //It looks like dt is in seconds, so this should be good.

                if(this.p.counter <= 0) {
                    this.p.counterLabel.destroy();
                    this.p.disabledOverlay.destroy();
                    this.p.disabledOverlay = null;
                    this.p.onCooldown = false;
                    this.enableAbility();
                }
            }
    	},
        createAbilityCounterLabel: function(value, color) {
            var label = new Q.UI.Text({
                label: value,
                color: color,
                x: -1,
                y: -13,
                outline: "black",
                outlineWidth: 3,
            });
            return this.p.container.insert(label);
        },
    	activateAbility: function() {
    		//Override this. But makesure to call this function
            console.log("Activated");
            this.p.ability.p.isRunning = true;
            this.p.ability.p.counter = this.p.ability.p.runtime;
    	    this.p.ability.p.counterLabel = null;

            //Disable the ability by removing the callback 
            this.p.ability.p.button.callback = function() {
                console.log("disabled");
            };
        },
    	turnOffAbility: function() {
    		//Override this. But make sure to call this function
            this.p.isRunning = false;
            this.p.onCooldown = true;
            this.p.counterLabel = null;
            this.p.counter = this.p.cooldownTime;
    	},
        enableAbility: function() {
            this.p.button.callback = this.activateAbility;
        },
    });

	Q.Ability.extend("RobotSlowDown", {
    	init: function(stage, x, y) {
    		this._super(stage, x, y, 5, 40, {sheet:"slowDownSheet",
                    frame:0});
    	},
        activateAbility: function() {
    	   this._super();
    	   Q.state.teams[0].slowdownUnitFallSpeed(.5); //reduce their speed in half
    	},
    	turnOffAbility: function(){
    	   this._super();
    	   Q.state.teams[0].returnNormalUnitFallSpeed(); 
        }
    });

    Q.Ability.extend("DamageBoostAbility", {
    	init: function(stage, x, y) {
            //Ability that lasts for 5 seconds and has a 40 second cooldown.
    		this._super(stage, x, y, 5, 40, {sheet:"attackBoostSheet",
                    frame:0});
    	}, 
    	activateAbility: function() {
    		this._super();
            Q.state.teams[0].strengthenUnits(1);//Double attack power.
    	},
    	turnOffAbility: function() {
            this._super();
    		Q.state.teams[0].returnUnitsToNormalStrength();
    	}
    });

    
}
