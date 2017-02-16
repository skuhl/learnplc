 @extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Backwash with Error HMI') @section('section-menu')
@include('module.module12.menu') @stop @section('lesson')
<div class="lesson-title">Backwash with Error HMI</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>Section 8 Purpose</h3>
		<p>The following exercise is a simulation of a Human Machine
			Interface water tank backwash with an fault that must be 'fixed'.</p>
	</div>
	<div class="subsection">
		<h3>Faults</h3>
		<p>
		When an error occurs in an HMI, it is called a fault. These faults can be one of
		two things: The physical part is broken or the HMI encountered a software error.
		In each case the fault must be repaired before use of the HMI and machine can continue.
	</div>
	<div class="subsection">
		<h3>Goal</h3>
		<p>In this simulation, the goal is to complete a backwash procedure with a fault.</p>
		
	</div>
</div>
@stop @section('instructions')
<div class="lesson-title">Exercise 8</div>
<div class="lesson-statement">
	<p>During your duty at the water treatment plant you notice the outflow pressure is 
	low. You must perform a baskwash on the system and return it to normal; however, during the process, a fault occurs.
	</p>
	<p>
	During this simulation, either the HMI or a random physical part will break and turn red to indicate that it is not working.<br/>
	 In order to correct this can continue, you can either press the red "Send an Engineer" button
	 or the dark blue "Refresh the HMI" button. <br/>
	 If you refresh the HMI and the corresponding button is not green, then you must send the engineer to fix it.<br/>
	 If you send the engineer and the corresponding button is not green, then you must refresh the HMI to fix it.<br/>
	 Once the ont of the buttons is green, you can continue as normal.
	 </p>
	<p>Turn on and off the pumps and valves in the correct order to begin the backwash.<br/>
	 Once the backwash animation begins, wait a few moments and then click on the dirty water drain 
	 pipe to 'clear' the debris.<br/>
	 Turn on and off the pumps and valves again until water is filtering through the system 
	 normally again. </p>
	 <p>
	 If a step is missed or performed in the wrong order, the system will reset and you 
	 must begin again.<br/>
	 When you have accomplished this simulation, press 'Submit' and then 'Continue'.</p>
</div>
@stop @section('exercise')
<div class="row">
	<div class="col-lg-9">
		<div class="thumbnail"
			style="padding: 10 px; width: 945px; background-color: #EEEEEE">
			<div id="m12_ex8_workspace">
				<h3 style = "color: black">Filter Tank</h3>
				<canvas id="canvas" width="1000" height="500"></canvas>
			</div>
		</div>
	</div>
</div>
@stop @section('submit-class') m12_ex8_submit @stop

@section('additional_script')
<script>
var stage = new createjs.Stage("canvas");

//declare engineer button
var button = new createjs.Shape();
var buttong = button.graphics;
var fillCommandbutton = buttong.beginFill("#E60000").command;
var shapeCommandbutton = buttong.drawRect(10, 10, 50, 50).command;

//declare refresh button
var button2 = new createjs.Shape();
var button2g = button2.graphics;
var fillCommandbutton2 = button2g.beginFill("#000052").command;
var shapeCommandbutton2 = button2g.drawRect(65, 10, 50, 50).command;

//declare main tank
var tank1 = new createjs.Shape();
var tank2 = new createjs.Shape();
var tank3 = new createjs.Shape();
var tank4 = new createjs.Shape();
var pipe1 = new createjs.Shape();
var trough1 = new createjs.Shape();
var pipe2 = new createjs.Shape();
var trough2 = new createjs.Shape();
var tank1g = tank1.graphics;
var tank2g = tank2.graphics;
var tank3g = tank3.graphics;
var tank4g = tank4.graphics;
var pipe1g = pipe1.graphics;
var pipe2g = pipe2.graphics;
var trough1g = trough1.graphics;
var trough2g = trough2.graphics;
var fillCommandtank1 = tank1g.beginFill("#CECECE").command;
var fillCommandtank2 = tank2g.beginFill("#CECECE").command;
var fillCommandtank3 = tank3g.beginFill("#EEDEAE").command;
var fillCommandtank4 = tank4g.beginFill("#CECECE").command;
var fillCommandpipe1 = pipe1g.beginFill("#909090").command;
var fillCommandpipe2 = pipe2g.beginFill("#909090").command;
var fillCommandtrough1 = trough1g.beginFill("#000000").command;
var fillCommandtrough2 = trough2g.beginFill("#000000").command;
var shapeCommandtank1 = tank1g.drawRect(180, 25, 540, 75).command;
var shapeCommandtank2 = tank2g.drawRect(180, 125, 540,75).command;
var shapeCommandtank3 = tank3g.drawRect(180, 200, 540, 125).command;
var shapeCommandtank4 = tank4g.drawRect(180, 325, 540,25).command;
var shapeCommandpipe1 = pipe1g.drawRect(180, 100, 120,25).command;
var shapeCommandpipe2 = pipe2g.drawRect(370, 100, 280,25).command;
var shapeCommandtrough1 = trough1g.drawRect(300, 100, 70,25).command;
var shapeCommandtrough2 = trough2g.drawRect(650, 100, 70,25).command;

//declare dirty water part
var ipump = new createjs.Shape();
var ipipe1 = new createjs.Shape();
var ipipe2 = new createjs.Shape();
var ipipe3 = new createjs.Shape();
var isense = new createjs.Shape();
var isense2 = new createjs.Shape();
var isensecon = new createjs.Shape();
var ivalve = new createjs.Shape();
var ivalvecon = new createjs.Shape();
var idrain = new createjs.Shape();
var idvalve = new createjs.Shape();
var idvalvecon = new createjs.Shape();
var ipumpg = ipump.graphics;
var ipipe1g = ipipe1.graphics;
var ipipe2g = ipipe2.graphics;
var ipipe3g = ipipe3.graphics;
var isenseg = isense.graphics;
var isense2g = isense2.graphics;
var isensecong = isensecon.graphics;
var ivalveg = ivalve.graphics;
var ivalvecong = ivalvecon.graphics;
var idraing = idrain.graphics;
var idvalveg = idvalve.graphics;
var idvalvecong = idvalvecon.graphics;
var fillCommandipump = ipumpg.beginFill("#000000").command;
var fillCommandipipe1 = ipipe1g.beginFill("#909090").command;
var fillCommandipipe2 = ipipe2g.beginFill("#909090").command;
var fillCommandipipe3 = ipipe3g.beginFill("#909090").command;
var fillCommandisense = isenseg.beginFill("#B8FFB8").command;
var fillCommandisense2 = isense2g.beginFill("#B8FFB8").command;
var fillCommandisensecon = isensecong.beginFill("#000000").command;
var fillCommandivalve = ivalveg.beginFill("#000000").command;
var fillCommandivalvecon = ivalvecong.beginFill("#000000").command;
var fillCommandidrain = idraing.beginFill("#909090").command;
var fillCommandidvalve = idvalveg.beginFill("#000000").command;
var fillCommandidvalvecon = idvalvecong.beginFill("#000000").command;
var shapeCommandipump = ipumpg.drawCircle(30, 325, 30).command;
var shapeCommandipipe1 = ipipe1g.drawRect(15, 280, 25,35).command;
var shapeCommandipipe2 = ipipe2g.drawRect(15, 100, 25,150).command;
var shapeCommandipipe3 = ipipe3g.drawRect(40, 100, 140,25).command;
var shapeCommandisense = isenseg.drawRect(10, 250, 35,30).command;
var shapeCommandisense2 = isense2g.drawCircle(100, 80, 15).command;
var shapeCommandisensecon = isensecong.drawRect(100, 90, 2,10).command;
var shapeCommandivalve = ivalveg.drawRect(0, 120, 10,30).command;
var shapeCommandivalvecon = ivalvecong.drawRect(10, 135, 5, 2).command;
var shapeCommandidrain = idraing.drawRect(150, 125, 25, 300).command;
var shapeCommandidvalve = idvalveg.drawRect(130, 150, 10, 20).command;
var shapeCommandidvalvecon = idvalvecong.drawRect(140, 160, 10, 2).command;

//declare surface wash
var surfacepump = new createjs.Shape();
var surfacevalve = new createjs.Shape();
var surfacevalve2 = new createjs.Shape();
var surfacepipe = new createjs.Shape();
var surfacepumpg = surfacepump.graphics;
var surfacevalveg = surfacevalve.graphics;
var surfacevalve2g = surfacevalve2.graphics;
var surfacepipeg = surfacepipe.graphics;
var fillsurfacepump = surfacepumpg.beginFill("#000000").command;
var fillsurfacevalve = surfacevalveg.beginFill("#000000").command;
var fillsurfacevalve2 = surfacevalve2g.beginFill("#000000").command;
var fillsurfacepipe = surfacepipeg.beginFill("#909090").command;
var shapesurfacepump = surfacepumpg.drawCircle(780, 163, 20).command;
var shapesurfacevalve2 = surfacevalve2g.drawRect(747, 130, 2, 20).command;
var shapesurfacevalve = surfacevalveg.drawRect(735, 130, 25, 15).command;
var shapesurfacepipe = surfacepipeg.drawRect(720, 150, 90, 25).command;

var drainLabel = new createjs.Text("Dirty Water Drain", "20px Arial", "#000000");
drainLabel.x = 90;
drainLabel.y = 440;
drainLabel.textBaseline = "alphabetic";

//declare clean water part
var opipe1 = new createjs.Shape();
var opipe2 = new createjs.Shape();
var opump = new createjs.Shape();
var ovalve = new createjs.Shape();
var ovalvecon = new createjs.Shape();
var osense = new createjs.Shape();
var osensecon = new createjs.Shape();
var osense2 = new createjs.Shape();
var opipe1g = opipe1.graphics;
var opipe2g = opipe2.graphics;
var opumpg = opump.graphics;
var ovalveg = ovalve.graphics;
var ovalvecong = ovalvecon.graphics;
var osenseg = osense.graphics;
var osensecong = osensecon.graphics;
var osense2g = osense2.graphics;
var fillCommandopipe1 = opipe1g.beginFill("#909090").command;
var fillCommandopipe2 = opipe2g.beginFill("#909090").command;
var fillCommandopump = opumpg.beginFill("#000000").command;
var fillCommandovalve = ovalveg.beginFill("#000000").command;
var fillCommandovalvecon = ovalvecong.beginFill("#000000").command;
var fillCommandosense = osenseg.beginFill("#B8FFB8").command;
var fillCommandosensecon = osensecong.beginFill("#000000").command;
var fillCommandosense2 = osense2g.beginFill("#B8FFB8").command;
var shapeCommandopipe1 = opipe1g.drawRect(720, 325, 100, 25).command;
var shapeCommandopipe2 = opipe2g.drawRect(840, 325, 100, 25).command;
var shapeCommandopump = opumpg.drawCircle(830, 335, 20).command;
var shapeCommandovalve = ovalveg.drawRect(740, 290, 20, 10).command;
var shapeCommandovalvecon = ovalvecong.drawRect(750, 300, 2, 25).command;
var shapeCommandosense = osenseg.drawCircle(765, 365, 10).command;
var shapeCommandosensecon = osensecong.drawRect(765, 350, 2, 10).command;
var shapeCommandosense2 = osense2g.drawRect(860, 320, 20, 35).command;



//animations
var an1 = new createjs.Shape();
var an2 = new createjs.Shape();
var an3 = new createjs.Shape();
var an4 = new createjs.Shape();
var an5 = new createjs.Shape();
var an6 = new createjs.Shape();
var an7 = new createjs.Shape();
var an1g = an1.graphics;
var an2g = an2.graphics;
var an3g = an3.graphics;
var an4g = an4.graphics;
var an5g = an5.graphics;
var an6g = an6.graphics;
var an7g = an7.graphics;
var fillCommandan1 = an1g.beginFill("#345AA9").command;
var fillCommandan2 = an2g.beginFill("#345AA9").command;
var fillCommandan3 = an3g.beginFill("#345AA9").command;
var fillCommandan4 = an4g.beginFill("#6699FF").command;
var fillCommandan5 = an5g.beginFill("#B2FFFF").command;
var fillCommandan6 = an6g.beginFill("#B2FFFF").command;
var fillCommandan7 = an7g.beginFill("#345AA9").command;
var shapeCommandan1 = an1g.drawRect(15, 260, 25, 5).command;
var shapeCommandan2 = an2g.drawRect(15, 100, 5, 25).command;
var shapeCommandan3 = an3g.drawRect(370, 100, 5, 25).command;
var shapeCommandan4 = an4g.drawRect(180, 125, 540, 5).command;
var shapeCommandan5 = an5g.drawRect(180, 325, 5, 25).command;
var shapeCommandan6 = an6g.drawRect(700, 150, 5, 25).command;
var shapeCommandan7 = an7g.drawRect(150, 125, 25, 5).command;



var j = 0;
var inOrOut = 1;
var step = 1;
var stg1 = 1;
var stg2 = 0;
var stg3 = 0;
var stg4 = 0;
var clear = 0;
var broken = 1;
var broken2 = Math.floor((Math.random() * 2) + 1);
var stepBroken = Math.floor((Math.random() * 12) + 1);
		
		
ivalve.on("click", function(){
	if(stg1 == 1 && step == 2){
		if(step == stepBroken && broken == 1){
			fillCommandivalve.style = "#E60000";
		}
		else{
		inOrOut = 0;
		step++;
		stg1 = 0;
		stg2 = 1;
		fillCommandivalve.style = "#000000";
		}
	}
	else if(stg4 == 1 && step == 11){
		if(step == stepBroken && broken == 1){
			fillCommandivalve.style = "#E60000";
		}
		else{
		step++;
		fillCommandivalve.style = "#B8FFB8";
		}
	}
	else{
		stg1 = 1;
		stg2 = 0;
		stg3 = 0;
		stg4 = 0;
		step = 1;
		inOrOut = 1;
		broken = 1;
		fillCommandbutton.style = "#E60000";
		fillCommandbutton2.style = "#000052";
		fillCommandidrain.style = "#909090";
		fillCommandidvalve.style = "#000000";
		fillCommandopump.style = "#000000";
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#596173";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		stage.removeChild(an6);
		stage.removeChild(an7);
		stage.update();
		submit_post(0);
	}
});
		
ipump.on("click", function(){
	if(stg1 == 1 && step == 1){
		if(step == stepBroken && broken == 1){
			fillCommandipump.style = "#E60000";
		}
		else{
		step++;
		fillCommandipump.style = "#000000";
		fillCommandipipe1.style = "#909090";
		fillCommandipipe2.style = "#909090";
		fillCommandipipe3.style = "#909090";
		fillCommandpipe1.style = "#909090";
		fillCommandpipe2.style = "#909090";
		stage.removeChild(an1);
		stage.removeChild(an2);
		stage.removeChild(an3);
		stage.removeChild(an4);
		stage.removeChild(an5);
		stage.update();
		}
	}
	else if(stg4 == 1 && step == 12){
		if(step == stepBroken && broken == 1){
			fillCommandipump.style = "#E60000";
		}
		else{
		step++;
		inOrOut = 1;
		fillCommandidrain.style = "#909090";
		fillCommandidvalve.style = "#000000";
		fillCommandopump.style = "#000000";
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#5F7A9C";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		stage.addChild(an3);
		stage.addChild(an4);
		stage.addChild(an5);
		stage.removeChild(an6);
		stage.removeChild(an7);
		stage.update();
		}
	}
	else{
		stg1 = 1;
		stg2 = 0;
		stg3 = 0;
		stg4 = 0;
		step = 1;
		inOrOut = 1;
		broken = 1;
		fillCommandbutton.style = "#E60000";
		fillCommandbutton2.style = "#000052";
		fillCommandidrain.style = "#909090";
		fillCommandidvalve.style = "#000000";
		fillCommandopump.style = "#000000";
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#596173";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		stage.removeChild(an6);
		stage.removeChild(an7);
		stage.update();
		submit_post(0);
	}
});
		
idvalve.on("click", function(){
	if(stg2 == 1 && step == 3){
		if(step == stepBroken && broken == 1){
			fillCommandidvalve.style = "#E60000";
		}
		else{
		step++;
		fillCommandidvalve.style = "#B8FFB8";
		}
	}
	else if(stg3 == 1 && step == 10){
		if(step == stepBroken && broken == 1){
			fillCommandidvalve.style = "#E60000";
		}
		else{
		step++;
		fillCommandidvalve.style = "#000000";
		stg3 = 0;
		stg4 = 1;
		}
	}
	else{
		stg1 = 1;
		stg2 = 0;
		stg3 = 0;
		stg4 = 0;
		step = 1;
		inOrOut = 1;
		broken = 1;
		fillCommandbutton.style = "#E60000";
		fillCommandbutton2.style = "#000052";
		fillCommandidrain.style = "#909090";
		fillCommandidvalve.style = "#000000";
		fillCommandopump.style = "#000000";
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#596173";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		stage.removeChild(an6);
		stage.removeChild(an7);
		stage.update();
		submit_post(0);
	}
	
});

opump.on("click", function(){
	if(stg2 == 1 && step == 4){
		if(step == stepBroken && broken == 1){
			fillCommandopump.style = "#E60000";
		}
		else{
		step++;
		fillCommandopump.style = "#B8FFB8";
		an5.x = 600;
		stage.addChild(an5);
		}
	}
	else if(stg3 == 1 && step == 9){
		if(step == stepBroken && broken == 1){
			fillCommandopump.style = "#E60000";
		}
		else{
		step++;
		fillCommandopump.style = "#000000";
		stage.removeChild(an5);
		}
	}
	else{
		stg1 = 1;
		stg2 = 0;
		stg3 = 0;
		stg4 = 0;
		step = 1;
		inOrOut = 1;
		broken = 1;
		fillCommandbutton.style = "#E60000";
		fillCommandbutton2.style = "#000052";
		fillCommandidrain.style = "#909090";
		fillCommandidvalve.style = "#000000";
		fillCommandopump.style = "#000000";
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#596173";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		stage.removeChild(an6);
		stage.removeChild(an7);
		stage.update();
		submit_post(0);
	}
});

surfacepump.on("click", function(){
	if(stg2 == 1 && step == 5){
		if(step == stepBroken && broken == 1){
			fillsurfacepump.style = "#E60000";
		}
		else{
		step++;
		fillsurfacepump.style = "#B8FFB8";
		fillsurfacepipe.style = "#8DE2FF";
		stage.addChild(an6);
		}
	}
	else if(stg3 == 1 && step == 8){
		if(step == stepBroken && broken == 1){
			fillsurfacepump.style = "#E60000";
		}
		else{
		step++;
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		stage.removeChild(an6);
		}
	}
	else{
		stg1 = 1;
		stg2 = 0;
		stg3 = 0;
		stg4 = 0;
		step = 1;
		inOrOut = 1;
		broken = 1;
		fillCommandbutton.style = "#E60000";
		fillCommandbutton2.style = "#000052";
		fillCommandidrain.style = "#909090";
		fillCommandidvalve.style = "#000000";
		fillCommandopump.style = "#000000";
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#596173";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		stage.removeChild(an6);
		stage.removeChild(an7);
		stage.update();
		submit_post(0);
	}
});

surfacevalve.on("click", function(){
	if(stg2 == 1 && step == 6){
		if(step == stepBroken && broken == 1){
			fillsurfacevalve.style = "#E60000";
		}
		else{
		step++;
		fillsurfacevalve.style = "#B8FFB8";
		fillCommandipipe3.style = "#6A7181";
		fillCommandpipe1.style = "#6A7181";
		fillCommandpipe2.style = "#6A7181";
		fillCommandidrain.style = "#6A7181";
		an2.x = 280;
		an3.x = 250;
		stage.addChild(an2);
		stage.addChild(an3);
		stage.addChild(an7);
		stage.update();
		stg2 = 0;
		}
	}
	else if(stg3 == 1 && step == 7 && clear == 1){
		if(step == stepBroken && broken == 1){
			fillsurfacevalve.style = "#E60000";
		}
		else{
		step++;
		fillsurfacevalve.style = "#000000";
		fillCommandipipe3.style = "#909090";
		fillCommandpipe1.style = "#909090";
		fillCommandpipe2.style = "#909090";
		fillCommandidrain.style = "#909090";
		fillCommandtank2.style = "#5F7A9C";
		stage.removeChild(an7);
		stage.removeChild(an2);
		stage.removeChild(an3);
		}
	}
	else{
		stg1 = 1;
		stg2 = 0;
		stg3 = 0;
		stg4 = 0;
		step = 1;
		inOrOut = 1;
		broken = 1;
		fillCommandbutton.style = "#E60000";
		fillCommandbutton2.style = "#000052";
		fillCommandidrain.style = "#909090";
		fillCommandidvalve.style = "#000000";
		fillCommandopump.style = "#000000";
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#596173";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		stage.removeChild(an6);
		stage.removeChild(an7);
		stage.update();
		submit_post(0);
	}
});

idrain.on("click", function(){
	if(step == 7){
		clear = 1;
		stg3 = 1;
		fillCommandtank2.style = "#5F7A9C";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandidrain.style = "#4D6B91";
	}
});

button.on("click", function(){
	if(step == stepBroken && broken == 1 && broken2 == 1){
		broken = 0;
		fillCommandbutton.style = "#66FF66";
	}
	else if(step == stepBroken && broken == 1 && broken2 == 2){
		
	}
	else{
		stg1 = 1;
		stg2 = 0;
		stg3 = 0;
		stg4 = 0;
		step = 1;
		inOrOut = 1;
		broken = 1;
		fillCommandbutton.style = "#E60000";
		fillCommandbutton2.style = "#000052";
		fillCommandidrain.style = "#909090";
		fillCommandidvalve.style = "#000000";
		fillCommandopump.style = "#000000";
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#596173";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		stage.removeChild(an6);
		stage.removeChild(an7);
		stage.update();
		submit_post(0);
	}
});

button2.on("click", function(){
	if(step == stepBroken && broken == 1 && broken2 == 2){
		broken = 0;
		fillCommandbutton2.style = "#66FF66";
	}
	else if(step == stepBroken && broken == 1 && broken2 == 1){
	
	}
	else{
		stg1 = 1;
		stg2 = 0;
		stg3 = 0;
		stg4 = 0;
		step = 1;
		inOrOut = 1;
		broken = 1;
		fillCommandbutton.style = "#E60000";
		fillCommandbutton2.style = "#000052";
		fillCommandidrain.style = "#909090";
		fillCommandidvalve.style = "#000000";
		fillCommandopump.style = "#000000";
		fillsurfacepump.style = "#000000";
		fillsurfacepipe.style = "#909090";
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#596173";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		stage.removeChild(an6);
		stage.removeChild(an7);
		stage.update();
		submit_post(0);
	}
});
		
		//add everything
		stage.addChild(tank1);
		stage.addChild(tank2);
		stage.addChild(tank3);
		stage.addChild(tank4);
		stage.addChild(pipe1);
		stage.addChild(pipe2);
		stage.addChild(trough1);
		stage.addChild(trough2);
		stage.addChild(opipe1);
		stage.addChild(opipe2);
		stage.addChild(opump);
		stage.addChild(ovalve);
		stage.addChild(ovalvecon);
		stage.addChild(osense);
		stage.addChild(osensecon);
		stage.addChild(osense2);
		stage.addChild(ipipe1);
		stage.addChild(ipipe2);
		stage.addChild(ipipe3);
		stage.addChild(ipump);
		stage.addChild(isense);
		stage.addChild(isense2);
		stage.addChild(isensecon);
		stage.addChild(ivalve);
		stage.addChild(ivalvecon);
		stage.addChild(idrain);
		stage.addChild(idvalve);
		stage.addChild(idvalvecon);
		stage.addChild(surfacepipe);
		stage.addChild(surfacepump);
		stage.addChild(surfacevalve2);
		stage.addChild(surfacevalve);
		stage.addChild(button);
		stage.addChild(button2);
		stage.addChild(drainLabel);

		stage.update();
		
		fillCommandivalve.style = "#B8FFB8";
		fillCommandipump.style = "#B8FFB8";
		fillCommandovalve.style = "#B8FFB8";
		fillCommandipipe1.style = "#4D6B91";
		fillCommandipipe2.style = "#4D6B91";
		fillCommandipipe3.style = "#4D6B91";
		fillCommandpipe1.style = "#4D6B91";
		fillCommandpipe2.style = "#4D6B91";
		fillCommandtank2.style = "#596173";
		fillCommandtank4.style = "#8DE2FF";
		fillCommandopipe1.style = "#8DE2FF";
		fillCommandopipe2.style = "#8DE2FF";
		stage.addChild(an1);
		stage.addChild(an2);
		
		createjs.Ticker.addEventListener("tick", tick);
		createjs.Ticker.setFPS(30);
		stage.update();
	    
	    function tick(event) {
			if(inOrOut == 1){
				an1.y = an1.y - 5;
				an2.x = an2.x + 5;
				an3.x = an3.x + 5;
				an4.y = an4.y + 5;
				an5.x = an5.x + 5;
				if(an1.y < -120){
					an1.y = -10;
				}
				if(an2.x > 280){
					an2.x = 15;
				}
				if(an3.x > 250){
					an3.x = 0;
				}
				if(an4.y > 200){
					an4.y = 0;
				}
				if(an5.x > 600){
					an5.x = 0;
				}		
		    }
			else{
				an5.x = an5.x - 5;
				an6.x = an6.x - 5;
				an2.x = an2.x - 5;
				an3.x = an3.x - 5;
				an7.y = an7.y + 5;
				if(an5.x < 0){
					an5.x = 600;
				}
				if(an6.x < 20){
					an6.x = 60;
				}
				if(an2.x < 20){
					an2.x = 280;
				}
				if(an3.x < 0){
					an3.x = 250;
				}
				if(an7.y > 300){
					an7.y = 0;
				}
			}
			    stage.update(event);
		}
 
$(".m12_ex8_submit").button().click(
		function () {
			if(step == 13){

				submit_post(1);
			}
			else{
				
				submit_post(0);
			}
		});
</script>
@stop
