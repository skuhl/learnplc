<style>
	#m12_ex1_workspace{
		/*font: 62.5% "Trebuchet MS", sans-serif;*/
	}

	#m12_ex1_namelist{
		width:170px;
	}

	.m12_ex1_name{
		margin: 4px;
		padding: 3px;
		width: 200px;
	}

	#m12_ex1_namelist .ui-accordion-content {
		padding: 0px;
	}

	.m12_ex1_name_text{
		padding: 3px;
		margin: 1px;
		text-align: center;
		background-color: #3498db;
	}

	.m12_ex1_fill{
		/*border: 1px solid #c0392b;*/
	}

	.text_name{
		border: 1px dotted #656565;
	}

	.text_wrap{
		vertical-align: middle;
		text-align: center;
		display: table-cell;
		font-size: 130%;
		font-weight: bold;
	}

	.text_wrong{
		background-color: #e74c3c;
	}

	.text_hover{
		background-color: #95a5a6;
	}
</style>

@extends('module.m12_template', array('submitStatus' => $submitstatus))

@section('title','Introduction and Overview')

@section('section-menu')
@include('module.module12.menu')
@stop

@section('lesson')
<div class="lesson-title">Introduction and Overview</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
			In this module we will study a basic water treatment system and its parts 
			before introducing an interactive HMI simulator with scenarios that simulates 
			the water treatment process.
		</p>
		<br/>
	</div>
	<div class="subsection">
		<p>
			The basic water treatment system in this module has three parts:<br/>
			
			<ol> 
				<li> A Pump House</li><br/>
				<li> Filter Tanks</li><br/>
				<li> A Water Tower</li><br/>
			</ol>
		</p>
		<p>
			The pump house is the first stage. It draws water from a river and passes it
			to the filter tanks.
		</p>
		<p>
			A filter tank receives the water from the pump house and uses a filtering system
			to clean the water. There are always at least two filter tanks in a water treatment 
			system. This is so that filtration can continue even if one of the tanks is malfunctioning.
			After the water is cleaned, it is pumped out to the water main with some deing diverted to a water tower.
		</p>
		<p>
			The water tower stores the clean water to maintain water pressure in the water main. 
			This pressure should run about 50 to 100 psi with about 600 gpm, gallons per minute.
		</p>
		<br/>
	</div>

</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 1</div>
<div class="lesson-statement">
	<p>
		Correctly match the names of the three parts of a water treatment system to the diagrams 
		and descriptions to the right. Then press 'Continue'.
	</p>
</div>
@stop
@section('exercise')

<script src="/public/assets/lib/water_treatment/jquery-2.1.1.min.js"></script>
<script src="/public/assets/lib/water_treatment/jquery-ui.min.js"></script>
<link rel="stylesheet" href="/public/assets/css/water_treatment/jquery-ui.min.css">
{{--<link rel="stylesheet" href="/public/assets/css/water_treatment/animate.css">--}}
<link rel="stylesheet" href="/public/assets/css/water_treatment/water_treatment_element.css">

<div class='row'>
	<div id="m12_ex1_workspace">
		<div id="water-hmi" style="margin-left:2%;background-color: #ecf0f1;color:black;">
			<img src="/public/assets/img/module12/demo/monitor.png" style="width:100%;height:100%;position:absolute">

			<button id="hmi-overview" class="hmi-button">Overview</button>
			<button id="hmi-faults" class="hmi-button">Faults</button>
			<button id="hmi-data" class="hmi-button">Trend Data</button>

			<div id="pump-block" class="hmi-block">
				<img src="/public/assets/img/module12/demo/pumphouse.png" style="width:100%;height:100%;position:absolute">

				<p style="position:absolute;top:56%;left:2%;">GMP:</p>
				<p style="color:#2980b9;border:1px dashed black;position:absolute;top:55.5%;left:25%;">xxx.</p>

				<p style="position:absolute;top:69%;left:2%;">Active Pump:</p>
				<p style="color:#2980b9;border:1px dashed black;position:absolute;top:68.5%;left:51%;">2 .</p>

				<p style="position:absolute;top:84%;left:2%;">Water Pressure:</p>
				<p style="color:#2980b9;border:1px dashed black;position:absolute;top:83.5%;left:61%;">15 psi.</p>
			</div>
			<div id="water-block" class="hmi-block">
				<img src="/public/assets/img/module12/demo/water_tower.png" style="width:100%;height:100%;">
				<p style="position:absolute;top:70%;left:45%;">Level: </p>
				<p style="color:#2980b9;border:1px dashed black;position:absolute;top:69.5%;left:68%;"> 40.00 ft.</p>
			</div>

			<button id="tank1-block" class="hmi-tank">Tank 1</button>
			<button id="tank2-block" class="hmi-tank">Tank 2</button>

			<button id="hmi-pressure" class="hmi-title">Pressure to City: 25 psi</button>

			<div class="tank-info" id="tank1-txt">
				<p>Filter Tank #1<br>
					Active Pumps<br>
					GPM: xxx<br>
					Head Pressure: 15 psi</p>
			</div>
			<div id="tank1-connect"></div>
			<div class="tank-info" id="tank2-txt">
				<p>Filter Tank #2<br>
					Active Pumps<br>
					GPM: xxx<br>
					Head Pressure: 15 psi</p>
			</div>
			<div id="tank2-connect"></div>
		</div>
	</div>
</div>
@stop

@section('submit-class')
m12_ex1_submit
@stop

@section('additional_script')
<script>
	var faults_list = ["• Fault (12/01/14 17:36:14): Head pressure low tank X. Backwash required on tank X."];
	$(function() {
		var main_width = $("#water-hmi").width();
		var main_height = 2*(0.96*main_width/3);
		$("#water-hmi").css('height', main_height);

		$("#pump-block").dblclick(function(){
			pumpHouseDiag();
		});
		$("#water-block").dblclick(function(){
			waterTowerDiag();
		});
		$("#tank1-block").dblclick(function(){
			tank1Diag();
		});
		$("#tank2-block").dblclick(function(){
			tank2Diag();
		});
		$("#hmi-faults").css({"background-color":"red"}).click(function(){
			faultsDiag();
		});
	});

	function pumpHouseDiag (){
		var containerDiag = $("#water-hmi");
		var mainDiag = $("<div></div>").dialog({
			dialogClass: "no-close",
			title: "Pump House",
			appendTo: "#m12_ex1_workspace",
			position: { my: "left top", at: "left+4% top+5%", of: containerDiag },
			width: containerDiag.width()*0.91,
			height: containerDiag.height()*0.87
		});
		var pumpDemo = $("<img src='/public/assets/img/module12/demo/pump-control.png' style='width:100%;height:80%;'>").appendTo(mainDiag);
		var returnButton = $("<button>Return</button>").button().click(function() {
			mainDiag.dialog("destroy");
		}).appendTo(mainDiag).css({
			position: "absolute",
			top:"88%",
			left:"85%"
		});
	}

	function waterTowerDiag (){
		var containerDiag = $("#water-hmi");
		var mainDiag = $("<div></div>").dialog({
			dialogClass: "no-close",
			title: "Water Tower",
			appendTo: "#m12_ex1_workspace",
			position: { my: "left top", at: "left+4% top+5%", of: containerDiag },
			width: containerDiag.width()*0.91,
			height: containerDiag.height()*0.87
		});
		var pumpDemo = $("<img src='/public/assets/img/module12/demo/tower-demo.png' style='width:80%;height:90%;position:absolute;left:10%;'>").appendTo(mainDiag);
		var returnButton = $("<button>Return</button>").button().click(function() {
			mainDiag.dialog("destroy");
		}).appendTo(mainDiag).css({
			position: "absolute",
			top:"88%",
			left:"85%"
		});
	}

	function tank1Diag () {
		var containerDiag = $("#water-hmi");
		var mainDiag = $("<div></div>").dialog({
			dialogClass: "no-close",
			title: "Tank - 1",
			appendTo: "#m12_ex1_workspace",
			position: { my: "left top", at: "left+4% top+5%", of: containerDiag },
			width: containerDiag.width()*0.91,
			height: containerDiag.height()*0.87
		});
		var pumpDemo = $("<img src='/public/assets/img/module12/demo/tank-demo.png' style='width:100%;height:90%;position:absolute;left:0%;'>").appendTo(mainDiag);
		var returnButton = $("<button>Return</button>").button().click(function() {
			mainDiag.dialog("destroy");
		}).appendTo(mainDiag).css({
			position: "absolute",
			top:"88%",
			left:"85%"
		});
	}

	function tank2Diag () {
		var containerDiag = $("#water-hmi");
		var mainDiag = $("<div></div>").dialog({
			dialogClass: "no-close",
			appendTo: "#m12_ex1_workspace",
			title: "Tank - 2",
			position: { my: "left top", at: "left+4% top+5%", of: containerDiag },
			width: containerDiag.width()*0.91,
			height: containerDiag.height()*0.87
		});
		var pumpDemo = $("<img src='/public/assets/img/module12/demo/tank-demo.png' style='width:100%;height:90%;position:absolute;left:0%;'>").appendTo(mainDiag);
		var returnButton = $("<button>Return</button>").button().click(function() {
			mainDiag.dialog("destroy");
		}).appendTo(mainDiag).css({
			position: "absolute",
			top:"88%",
			left:"85%"
		});
	}

	function faultsDiag () {
		var containerDiag = $("#water-hmi");
		var mainDiag = $("<div></div>").dialog({
			dialogClass: "no-close",
			appendTo: "#m12_ex1_workspace",
			title: "Fault Screen",
			position: { my: "left top", at: "left+4% top+5%", of: containerDiag },
			width: containerDiag.width()*0.91,
			height: containerDiag.height()*0.87
		});
//        var pumpDemo = $("<img src='tank-demo.png' style='width:100%;height:90%;position:absolute;left:0%;'>").appendTo(mainDiag);
		var fault_txt = $("<div style='color:red;width:80%;height:80%;'></div>").appendTo(mainDiag);
		for (i=0; i<faults_list.length; i++) {
			var new_fault = $("<p></p>").html(faults_list[i]).appendTo(fault_txt);
		}
		var returnButton = $("<button>Return</button>").button().click(function() {
			mainDiag.dialog("destroy");
		}).appendTo(mainDiag).css({
			position: "absolute",
			top:"88%",
			left:"85%"
		});
		var clearButton = $("<button>Clear Faults</button>").button().click(function() {
			new_fault.remove();
			faults_list = [];
			$("#hmi-faults").css({"background-color":"buttonface"})
		}).appendTo(mainDiag).css({
			position: "absolute",
			top:"88%",
			left:"3%"
		});
	}
</script>
@stop