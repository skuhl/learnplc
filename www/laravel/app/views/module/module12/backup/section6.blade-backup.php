 @extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Filter Tank HMI') @section('section-menu')
@include('module.module12.menu') @stop @section('lesson')
<div class="lesson-title">Filter Tank HMI</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>Section 6 Purpose</h3>
		<p>The following exercise is a simulation of a Human Machine
			Interface with a filter tank.</p>
	</div>
	<div class="subsection">
		<h3>Goal</h3>
		<p>In this simulation, the goal is to turn on the filter tank with the
			correct steps you learned in the previous sections.</p>
		<p>
			<i>Note: In this and the following HMI simulations, valves are
				represented as small rectangles instead of two conjoined triagles.</i>
		</p>
	</div>
</div>
@stop @section('instructions')
<div class="lesson-title">Exercise 6</div>
<div class="lesson-statement">
	<p>Turn on the pumps and valves in the correct order. Once the correct order is 
		acheived, the filter tank will begin
		pumping water into the filter and cleaning it if you are correct; if
		not, it will reset the valves and pumps. When you have accomplished
		this simulation, press 'Submit' and then 'Continue'.</p>
</div>
@stop @section('exercise')
<div class="row">
	<div class="col-lg-9">
		<div class="thumbnail"
			style="padding: 10 px; width: 945px; background-color: #EEEEEE">
			<div id="m12_ex6_workspace">
				<h3 style = "color: black">Filter Tank</h3>
				<canvas id="canvas" width="1000" height="500"></canvas>
			</div>
		</div>
	</div>
</div>
@stop @section('submit-class') m12_ex6_submit @stop

@section('additional_script')
<script>
var stage = new createjs.Stage("canvas");

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
var an1g = an1.graphics;
var an2g = an2.graphics;
var an3g = an3.graphics;
var an4g = an4.graphics;
var an5g = an5.graphics;
var fillCommandan1 = an1g.beginFill("#345AA9").command;
var fillCommandan2 = an2g.beginFill("#345AA9").command;
var fillCommandan3 = an3g.beginFill("#345AA9").command;
var fillCommandan4 = an4g.beginFill("#6699FF").command;
var fillCommandan5 = an5g.beginFill("#B2FFFF").command;
var shapeCommandan1 = an1g.drawRect(15, 260, 25, 5).command;
var shapeCommandan2 = an2g.drawRect(15, 100, 5, 25).command;
var shapeCommandan3 = an3g.drawRect(370, 100, 5, 25).command;
var shapeCommandan4 = an4g.drawRect(180, 125, 540, 5).command;
var shapeCommandan5 = an5g.drawRect(180, 325, 5, 25).command;




var j = 0;
var tru = 0;
var answer = [5, 5, 5];

		
		
ivalve.on("click", function(){
	fillCommandivalve.style = "#B8FFB8";
    answer[j] = 1;
    j ++;
    if (j == 3){
		j = 0;
		answer = [5, 5, 5];
		fillCommandivalve.style = "#000000";
		fillCommandipump.style = "#000000";
		fillCommandovalve.style = "#000000";
		stage.update();
		submit_post(0);
		}
    stage.update();
		    
});
		
ipump.on("click", function(){
	fillCommandipump.style = "#B8FFB8";
    answer[j] = 3;
	j ++;
	if(answer[0] == 1 && answer[1] == 2 && answer[2] == 3){
			fillCommandipipe1.style = "#4D6B91";
			fillCommandipipe2.style = "#4D6B91";
			fillCommandipipe3.style = "#4D6B91";
			fillCommandpipe1.style = "#4D6B91";
			fillCommandpipe2.style = "#4D6B91";
			fillCommandtank2.style = "#5F7A9C";
			fillCommandtank4.style = "#8DE2FF";
			fillCommandopipe1.style = "#8DE2FF";
			fillCommandopipe2.style = "#8DE2FF";
			tru = 1;
			stage.addChild(an1);
			stage.addChild(an2);
			stage.addChild(an3);
			stage.addChild(an4);
			stage.addChild(an5);
			
			createjs.Ticker.addEventListener("tick", tick);
			createjs.Ticker.setFPS(30);
			stage.update();
			submit_post(1);
	}
	else if (j == 3){
		j = 0;
		answer = [5, 5, 5];
		fillCommandivalve.style = "#000000";
		fillCommandipump.style = "#000000";
		fillCommandovalve.style = "#000000";
		stage.update();
		submit_post(0);
		}
    stage.update();
    
});
		
ovalve.on("click", function(){
    fillCommandovalve.style = "#B8FFB8";
    answer[j] = 2;
	j ++;
	if (j == 3){
		j = 0;
		answer = [5, 5, 5];
		fillCommandivalve.style = "#000000";
		fillCommandipump.style = "#000000";
		fillCommandovalve.style = "#000000";
		stage.update();
		submit_post(0);
		}
    stage.update();
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
		stage.update();
	

		function tick(event) {
			if(tru == 1){
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
  		    stage.update(event);
  		}

$(".m12_ex6_submit").button().click(
		function () {
			if(answer[0] == 1 && answer[1] == 2 && answer[2] == 3){

				submit_post(1);
			}
			else{
				
				submit_post(0);
			}
		});
</script>
@stop
