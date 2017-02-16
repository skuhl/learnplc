
window.addEventListener('load',function(e) {
    
    
    var Q = window.Q = Quintus().include("Sprites, Scenes, 2D, Input, Anim")
        .setup({ width: 1000, height: 600 });
    
    
    
    Q.scene("start",function(stage) {
	
	var sprite1 = new Q.Sprite({ x: 500, y: 100, asset: 'bot.png',
                                     angle: 0, collisionMask: 1, scale: 1});
	
	stage.insert(sprite1);
	sprite1.add('2d')
	
	sprite1.on('step',function() {
	    
	});
	sprite1.on('bump.left', function() {
	});
	
	var sprite2 = new Q.Sprite({ x: 500, y: 600, w: 1000, h: 50 });
	sprite2.draw= function(ctx) {
	    ctx.fillStyle = '#FF0000';
	    ctx.fillRect(-this.p.cx,-this.p.cy,this.p.w,this.p.h);
	};
	stage.insert(sprite2);
	
	
	


	//define my spritesheet as botSheet
	Q.sheet('botSheet',   //botSheet is an arbitrary name to serve as a reference to the spritesheet elsewhere
		'botsheet64.png', //this is a 384x384 picture composed of many 64x64 sprites
		{
		    tileW: 64,  // Each tile is 64 pixels wide
		    tileH: 64  // and 64 pixels tall
		});

	// define my animations for a unit as bot
	Q.animations("bot", { //bot is arbitrary name to serve as a reference to the animations defined here
	    swingStart: {frames: [18], rate:2,next:'swing'}, //the frames here refer to the frames of the sprite sheet linked to the entity using the animations.. in this case Q.bot
	    swing: { frames: [19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35],rate: 1/25,next:'swing'}, 
	  //  swingEnd: {frames: [18],rate:2,next: 'swingRecover'},
	  //  swingRecover: {frames: [7,6,2,5,4,3],rate:1/16,next:'swingStart'}
	});
	
	
	
	Q.Sprite.extend("bot", {
	    init: function(p) {
		this._super(p, { //define properties
		    sprite: "bot", //this refers to my group of animations, which i called 'bot'
		    sheet: "botSheet", //this refers to the spritesheet, 'botsheet64.png', which i called 'botSheet'
		    frame:12, //the initial sprite is on the 13th 64x64 section of the spritesheet, which is frame 12 (frames start at 0)
		    x: 100, //initial x position
		    y: 500, //initial y position
		    vx: 40, //initial velocity in the x direction
		    points: [[0,0],[-32,32],[0,32],[-32,0]] //this is a collision box if you need one.. if you add the 2d component of quintus it automatically puts a box around the
		                                            //sprite but defining it manually allows you to place one anywhere.
		});
		this.add("animation,2d");
		this.on("bump.right",this,"attack"); 
	    },
	    step: function(dt) { //this part automatically runs every frame
		this.p.x += this.p.vx * dt;
		
	    },
	    attack: function(collision) {
		this.play("swingStart");
	    }
	});

	var bot1 = new Q.bot; //creates the object i defined
	stage.insert(bot1); //deploys the object onto the stage
	
	
	
    });
    Q.load(['bot.png','botsheet64.png'],function() { //this makes certain that my images are loaded before starting the game
	
	Q.stageScene("start"); //starts the game
	
	
	Q.debug = false; 
	
	
    });
    
    
});
