 @extends('module.m12_template', array('submitStatus' => $submitstatus))

@section('title','Simple HMI') @section('section-menu')
@include('module.module12.menu') @stop @section('lesson')
<div class="lesson-title">Backwash HMI</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>Section 7 Purpose</h3>
		<p>The following exercise is a simulation of a Human Machine
			Interface water tank backwash procedure.</p>
	</div>
	<div class="subsection">
		<h3>Goal</h3>
		<p>In this simulation, the goal is to complete a backwash procedure.</p>
		<p>
			<i>Note: In this and the following HMI simulations, valves are
				represented as small rectangles instead of two conjoined triagles.</i>
		</p>
	</div>
</div>
@stop @section('instructions')
<div class="lesson-title">Exercise 7</div>
<div class="lesson-statement">
	<p>During your duty at the water treatment plant you notice a system fault that the outflow pressure is
	low. You must perform a baskwash on one of the filter tank.
	</p>
	<p>Turn on and off the pumps and valves in the correct order to begin the backwash.<br/><br/>
	 Once the backwash animation finished, Turn on and off the pumps and valves again until water is filtering through the system normally again. </p>
	 <p>When you have accomplished this simulation, press 'Submit' and then 'Continue'.</p>
</div>
@stop @section('exercise')
	 <script src="/public/assets/lib/water_treatment/jquery-2.1.1.min.js"></script>
	 <script src="/public/assets/lib/water_treatment/jquery-ui.min.js"></script>
	 <link rel="stylesheet" href="/public/assets/css/water_treatment/jquery-ui.min.css">
	 {{--<link rel="stylesheet" href="/public/assets/css/water_treatment/animate.css">--}}
	 <link rel="stylesheet"
		   href="/public/assets/css/water_treatment/water_treatment_modules/section_6/water_treatment_element.css">

<div class="row">
	<div id="m12_ex7_workspace">
		<div id="water-hmi" style="margin-left:2%;background-color: #ecf0f1;color:black;">
			<img src="/public/assets/img/module12/demo/monitor.png"
				 style="width:100%;height:100%;position:absolute">

			<button id="hmi-overview" class="hmi-button">Overview</button>
			<button id="hmi-faults" class="hmi-button">Faults</button>
			<button id="hmi-data" class="hmi-button">Trend Data</button>

			<div id="pump-block" class="hmi-block">
				<img src="/public/assets/img/module12/demo/pumphouse.png"
					 style="width:100%;height:100%;position:absolute">

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
				<p style="color:#2980b9;border:1px dashed black;position:absolute;top:69.5%;left:68%;"> 40.00
					ft.</p>
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
@stop @section('submit-class') m12_ex7_submit @stop

@section('additional_script')
<script>
	var answer_1 = 0;
	var answer_2 = 0;

	$('.btn-radio').click(function() {
		$(this).parent().siblings().children().removeClass('active');
		$(this).addClass('active');
		answer = $(this).attr('value');
		$(this).parent().parent().siblings('.radio').val($(this).attr('value'));
	});

	$(".m12_ex7_submit").click( function () {
		var solution = 1;
		if(solution == answer_2){
			submit_post(1);
		}
		else{
			submit_post(0);
		}
	});

	var inlet_state = 0;
	var pump_1_data = {
		valve : 0,
		pump : 0,
		tube_v : 0,
		tube_h : 0
	};
	var pump_2_data = {
		valve : 0,
		pump : 0,
		tube_v : 0,
		tube_h : 0
	};
	var tank_1_data = {
		clean_valve: 1,
		clean_pump: 0,
		inflow_valve: 1,
		inflow_pump: 1,
		wash_valve: 0,
		wash_pump: 0,
		drain_valve: 0,
		back_wash:0,
		water_level:0,
		normal_operation:1
	};
	var tank_2_data = {
		clean_valve: 0,
		clean_pump: 0,
		inflow_valve: 0,
		inflow_pump: 0,
		wash_valve: 0,
		wash_pump: 0,
		drain_valve: 0,
		back_wash:0,
		water_level:0,
		normal_operation:0
	};

	var faults_list = ["• Fault (12/01/14 17:36:14): Head pressure low Tank-1. Backwash required on Tank-1."];
	$(function () {
		$( document ).tooltip();

		var main_width = $("#water-hmi").width();
		var main_height = 2*(0.96*main_width/3);
		$("#water-hmi").css('height', main_height);

		$("#pump-block").dblclick(function () {
			pumpHouseDiag();
		});
		$("#water-block").dblclick(function () {
			waterTowerDiag();
		});
		$("#tank1-block").dblclick(function () {
			tank1Diag();
		});
		$("#tank2-block").dblclick(function () {
			tank2Diag();
		});
		$("#hmi-faults").css({"background-color": "red"}).click(function () {
			faultsDiag();
		});
		$("#hmi-data").click(function () {
			dataDiag();
		});

		//activate the tank_by default
		tank1Diag();
	});

	function refresh_pump_1_states() {

	}

	function refresh_pump_2_states() {
		//update the river inlet
	}

	function pumpHouseDiag() {

	}

	function waterTowerDiag() {
	}

	function refresh_tank_1_states () {
		//update the inflow valve
		if(tank_1_data.inflow_valve == 1){
			$("#tank_1_inflow_valve").attr("src", "/public/assets/img/module12/tanks/valve_left_green.png").css("left", "4%");
		}
		else {
			$("#tank_1_inflow_valve").attr("src", "/public/assets/img/module12/tanks/valve_left_white.png").css("left", "6.1%");
		}
		//update the inflow pump
		if(tank_1_data.inflow_pump == 1){
			$("#tank_1_inflow_pump").attr("src", "/public/assets/img/module12/tanks/pump_circle_green.png");
		}
		else {
			$("#tank_1_inflow_pump").attr("src", "/public/assets/img/module12/tanks/pump_circle_white.png");
		}

		//update the clean water valve
		if(tank_1_data.clean_valve == 1){
			$("#tank_1_clean_valve").attr("src", "/public/assets/img/module12/tanks/valve_top_green.png").css("top", "52%");
//            $("#tank_1_clean_tube").attr("src", "tanks/clean_tube_blue_outflow.gif");
		}
		else {
			$("#tank_1_clean_valve").attr("src", "/public/assets/img/module12/tanks/valve_top_white.png").css("top", "55.1%");
			$("#tank_1_clean_tube").attr("src", "/public/assets/img/module12/tanks/clean_tube_white.png");
		}
		//update the clean water pump
		if(tank_1_data.clean_pump == 1){
			$("#tank_1_clean_pump").attr("src", "/public/assets/img/module12/tanks/pump_circle_green.png");
			var clean_water_flow = $("<img class='clean_water_flow' src='/public/assets/img/module12/tanks/water_flow_animation.gif' style='width:14%;height:7.5%;position:absolute;top:56.7%;left:62.3%'>").appendTo($("#tank_1_diag"));
			$("#tank_1_clean_tube").attr("src", "/public/assets/img/module12/tanks/clean_tube_blue_inflow.gif");
		}
		else {
			$("#tank_1_clean_pump").attr("src", "/public/assets/img/module12/tanks/pump_circle_white.png");
			$(".clean_water_flow").remove();
		}

		//update the wash valve
		if(tank_1_data.wash_valve == 1){
			$("#tank_1_wash_valve").attr("src", "/public/assets/img/module12/tanks/valve_top_green.png").css("top", "28%");
		}
		else {
			$("#tank_1_wash_valve").attr("src", "/public/assets/img/module12/tanks/valve_top_white.png").css("top", "29.4%");
		}
		//update the wash pump
		if(tank_1_data.wash_pump == 1) {
			$("#tank_1_wash_pump").attr("src", "/public/assets/img/module12/tanks/wash_pump_green.png");
			$("#tank_1_wash_tube").attr("src", "/public/assets/img/module12/tanks/washing_tube_blue.png");
			var wash_water_flow = $("<img class='wash_water_flow' src='/public/assets/img/module12/tanks/water_flow_animation.gif' style='width:10%;height:4.5%;position:absolute;top:32.3%;left:66%'>").appendTo($("#tank_1_diag"));
		}
		else {
			$("#tank_1_wash_pump").attr("src", "/public/assets/img/module12/tanks/wash_pump_white.png");
			$("#tank_1_wash_tube").attr("src", "/public/assets/img/module12/tanks/washing_tube_white.png");
			$(".wash_water_flow").remove();
		}
		//update drain valve
		if(tank_1_data.drain_valve == 1) {
			$("#tank_1_drain_valve").attr("src", "/public/assets/img/module12/tanks/valve_left_green.png").css("left", "10%");
		}
		else{
			$("#tank_1_drain_valve").attr("src", "/public/assets/img/module12/tanks/valve_left_white.png").css("left","12.1%");
		}

		//update the clean water pump water flow

		//update the inflow water pump
		if(tank_1_data.inflow_pump==1 && tank_1_data.drain_valve == 0) {
			$("#tank_1_inflow_tube").attr("src", "/public/assets/img/module12/tanks/inflow_tube_in_blue.gif");
		}
		else{
			$("#tank_1_inflow_tube").attr("src", "/public/assets/img/module12/tanks/incoming_tube_white.png");
		}

		if(tank_1_data.drain_valve == 1 && tank_1_data.inflow_valve==0 && tank_1_data.clean_pump==1) {
			tank_1_data.back_wash=1;
		}
		else {
			tank_1_data.back_wash = 0;
		}

		//update tank water level
		if(tank_1_data.inflow_pump==1){
			tank_1_data.water_level = 1;
		}
		else if(tank_1_data.clean_pump==1 && tank_1_data.back_wash==1){
			tank_1_data.water_level = 2;
		}
		else {
			tank_1_data.water_level = 0;
		}

		//update when normal operation, water goes out from clean pipe
		if(tank_1_data.clean_pump==0) {
			if (tank_1_data.water_level == 1 && tank_1_data.clean_valve == 1 && tank_1_data.clean_pump == 0) {
				$("#tank_1_clean_tube").attr("src", "/public/assets/img/module12/tanks/clean_tube_blue_outflow.gif");
			}
			else {
				$("#tank_1_clean_tube").attr("src", "/public/assets/img/module12/tanks/clean_tube_white.png");
			}
		}

		if(tank_1_data.inflow_pump==1 && tank_1_data.clean_valve==1 && tank_1_data.clean_pump==0){
			tank_1_data.normal_operation = 1;
		}
		else{
			tank_1_data.normal_operation = 0;
		}

		if(tank_1_data.normal_operation==1 && answer_1==1){
			answer_2=1;
		}
		else{
			answer_2=0;
		}

		//update water level
		if(tank_1_data.water_level == 1){
			$("#tank_1_water_level").attr("src", "/public/assets/img/module12/tanks/water_level.png");
		}
		else if(tank_1_data.water_level == 2){
			$("#tank_1_water_level").attr("src", "/public/assets/img/module12/tanks/water_level_backwash_up.png");
		}
		else {
			$("#tank_1_water_level").attr("src", "/public/assets/img/module12/tanks/water_level_empty.png");
		}

		//update operations
		if(tank_1_data.back_wash==1) {
			$("#tank_1_inflow_tube").attr("src", "/public/assets/img/module12/tanks/inflow_tube_drain_blue.gif");
		}
		if(tank_1_data.normal_operation==1) {
			$("#tank_1_water_level").attr("src", "/public/assets/img/module12/tanks/water_level_down.png");
		}

		//set the answer for section
		if(tank_1_data.back_wash==1 && tank_1_data.wash_pump==1){
			answer_1 = 1;
			setTimeout(function(){
				var warning_diag_1 = $("<div><span style='color: #e74c3c'></span>Backwash is finish. Now, please change the tank to perform normal filtering operation.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
			},2000);
		}
	}

	function tank1Diag() {
		var containerDiag = $("#water-hmi");
		var mainDiag = $("<div id='tank_1_diag'></div>").dialog({
			draggable: false,
			dialogClass: "no-close",
			appendTo: "#m12_ex7_workspace",
			title: "Tank - 1",
			position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
			width: containerDiag.width() * 0.91,
			height: containerDiag.height() * 0.87
		});
		var pump_inflow_tube = $("<img id='tank_1_inflow_tube' src='/public/assets/img/module12/tanks/incoming_tube_white.png' style='width:100%;height:85%;position:absolute;left:0%;'>").appendTo(mainDiag);
		var pump_clean_tube = $("<img id='tank_1_clean_tube' src='/public/assets/img/module12/tanks/clean_tube_white.png' style='width:100%;height:85%;position:absolute;left:0%;'>").appendTo(mainDiag);
		var pump_wash_tube = $("<img id='tank_1_wash_tube' src='/public/assets/img/module12/tanks/washing_tube_white.png' style='width:100%;height:85%;position:absolute;left:0%;'>").appendTo(mainDiag);
//        var pump_drain_tube = $("<img src='tanks/drain_tube_white.png' style='width:100%;height:85%;position:absolute;left:0%;'>").appendTo(mainDiag);
		var pump_base = $("<img src='/public/assets/img/module12/tanks/tank_base.png' style='width:100%;height:85%;position:absolute;left:0%;'>").appendTo(mainDiag);

		var water_level = $("<img id='tank_1_water_level' src='/public/assets/img/module12/tanks/water_level_empty.png' style='width:100%;height:85%;position:absolute;left:0;'>").appendTo(mainDiag);

		var inflow_pump = $("<img id='tank_1_inflow_pump' src='/public/assets/img/module12/tanks/pump_circle_white.png' class='tank-pump' style='width:6%;position:absolute;left:6%;top:47%;' title='Inflow Pump'>").click(function(){
			var confirm_dialog = $("<div></div>");
			if(tank_1_data.inflow_pump==0){
				confirm_dialog.html("Do you want to turn on the Pump ?");
			}
			else if(tank_1_data.inflow_pump==1){
				confirm_dialog.html("Do you want to turn off the Pump ?");
			}
			confirm_dialog.dialog({
				resizable: false,
				height: 160,
				width: 350,
				modal: true,
				position: {my: "center", at: "center", of: $("#water-hmi")},
				buttons: {
					Yes: function () {
						if (tank_1_data.inflow_pump == 0) {
							if (tank_1_data.inflow_valve == 1) {
								if(tank_1_data.clean_pump == 0) {
									tank_1_data.inflow_pump = 1;
								}
								else{
									var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Turning on both pumps may overfill the water tank.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});

								}
							}
							else {
								var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Open the valve before activating the pump.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
							}
						}
						else {
							tank_1_data.inflow_pump = 0;
						}
						refresh_tank_1_states();
						$(this).dialog("destroy");
					},
					Cancel: function () {
						$(this).dialog("destroy");
					}
				}
			});
		}).appendTo(mainDiag);
		var inflow_valve = $("<img id='tank_1_inflow_valve' src='/public/assets/img/module12/tanks/valve_left_white.png' class='tank-pump' style='width:4%;position:absolute;left:6.1%;top:29.7%;' title='Inflow Valve'>").click(function(){
			var confirm_dialog = $("<div></div>");
			if(tank_1_data.inflow_valve==0){
				confirm_dialog.html("Do you want to open the valve ?");
			}
			else if(tank_1_data.inflow_valve==1){
				confirm_dialog.html("Do you want to close the valve ?");
			}
			confirm_dialog.dialog({
				resizable: false,
				height: 160,
				width: 350,
				modal: true,
				position: {my: "center", at: "center", of: $("#water-hmi")},
				buttons: {
					Yes: function () {
						if (tank_1_data.inflow_valve == 0) {
							if(tank_1_data.back_wash == 1){
								var warning_diag_2 = $("<div><span style='color: #e74c3c'>Error</span>: Can't open the valve when backwash.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
							}
							else {
								tank_1_data.inflow_valve = 1;
							}
//                            if (tank_data.inflow_valve == 1) {
//                                tank_data.inflow_pump = 1;
//                            }
//                            else {
//                                var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Open the valve before activating the pump.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
//                            }
						}
						else {
							if(tank_1_data.inflow_pump == 1){
								var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Can't close the valve when pump is activating.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
							}
							else{
								tank_1_data.inflow_valve = 0;
							}
						}
						refresh_tank_1_states();
						$(this).dialog("destroy");
					},
					Cancel: function () {
						$(this).dialog("destroy");
					}
				}
			});
		}).appendTo(mainDiag);

		var drain_valve = $("<img id='tank_1_drain_valve' src='/public/assets/img/module12/tanks/valve_left_white.png' class='tank-pump' style='width:4%;position:absolute;left:12.1%;top:31.5%;' title='Drain Valve'>").click(function(){
			var confirm_dialog = $("<div></div>");
			if(tank_1_data.drain_valve==0){
				confirm_dialog.html("Do you want to open the valve ?");
			}
			else if(tank_1_data.drain_valve==1){
				confirm_dialog.html("Do you want to close the valve ?");
			}
			confirm_dialog.dialog({
				resizable: false,
				height: 160,
				width: 350,
				modal: true,
				position: {my: "center", at: "center", of: $("#water-hmi")},
				buttons: {
					Yes: function () {
						if (tank_1_data.drain_valve == 0) {
							tank_1_data.drain_valve = 1;
//                            if (tank_data.inflow_valve == 1) {
//                                tank_data.inflow_pump = 1;
//                            }
//                            else {
//                                var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Open the valve before activating the pump.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
//                            }
						}
						else {
							if(tank_1_data.inflow_pump == 1){
								var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Can't close the valve when inflow pump is activating</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
							}
							else{
								tank_1_data.drain_valve = 0;
							}
						}
						refresh_tank_1_states();
						$(this).dialog("destroy");
					},
					Cancel: function () {
						$(this).dialog("destroy");
					}
				}
			});
		}).appendTo(mainDiag);

		//clean water pump section
		var clean_pump = $("<img id='tank_1_clean_pump' src='/public/assets/img/module12/tanks/pump_circle_white.png' class='tank-pump' style='width:6%;position:absolute;left:82.4%;top:55%;' title='Outflow Pump'>").click(function(){
			var confirm_dialog = $("<div></div>");
			if(tank_1_data.clean_pump==0){
				confirm_dialog.html("Do you want to turn on the Pump ?");
			}
			else if(tank_1_data.clean_pump==1){
				confirm_dialog.html("Do you want to turn off the Pump ?");
			}
			confirm_dialog.dialog({
				resizable: false,
				height: 160,
				width: 350,
				modal: true,
				position: {my: "center", at: "center", of: $("#water-hmi")},
				buttons: {
					Yes: function () {
						if (tank_1_data.clean_pump == 0) {
							if (tank_1_data.clean_valve == 1) {
								if(tank_1_data.inflow_pump == 0) {
									tank_1_data.clean_pump = 1;
								}
								else{
									var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Turning on both pumps may overfill the water tank.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});

								}
							}
							else {
								var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Open the valve before activating the pump.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
							}
						}
						else {
							tank_1_data.clean_pump = 0;
						}
						refresh_tank_1_states();
						$(this).dialog("destroy");
					},
					Cancel: function () {
						$(this).dialog("destroy");
					}
				}
			});
		}).appendTo(mainDiag);
		var clean_valve = $("<img id='tank_1_clean_valve' src='/public/assets/img/module12/tanks/valve_top_white.png' class='tank-pump' style='height:7%;position:absolute;left:78%;top:55.1%;' title='Outflow Valve'>").click(function(){
			var confirm_dialog = $("<div></div>");
			if(tank_1_data.clean_valve==0){
				confirm_dialog.html("Do you want to open the valve ?");
			}
			else if(tank_1_data.clean_valve==1){
				confirm_dialog.html("Do you want to close the valve ?");
			}
			confirm_dialog.dialog({
				resizable: false,
				height: 160,
				width: 350,
				modal: true,
				position: {my: "center", at: "center", of: $("#water-hmi")},
				buttons: {
					Yes: function () {
						if (tank_1_data.clean_valve == 0) {
							tank_1_data.clean_valve = 1;
//                            if (tank_data.inflow_valve == 1) {
//                                tank_data.inflow_pump = 1;
//                            }
//                            else {
//                                var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Open the valve before activating the pump.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
//                            }
						}
						else {
							if(tank_1_data.clean_pump == 1){
								var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Can't close the valve when pump is activating.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
							}
							else{
								tank_1_data.clean_valve = 0;
							}
						}
						refresh_tank_1_states();
						$(this).dialog("destroy");
					},
					Cancel: function () {
						$(this).dialog("destroy");
					}
				}
			});
		}).appendTo(mainDiag);

		//for surface wash section
		var wash_pump = $("<img id='tank_1_wash_pump' src='/public/assets/img/module12/tanks/wash_pump_white.png' class='tank-pump' style='width:3%;position:absolute;left:81%;top:31.8%;' title='Surface-Wash Pump'>").click(function(){
			var confirm_dialog = $("<div></div>");
			if(tank_1_data.wash_pump==0){
				confirm_dialog.html("Do you want to turn on the Pump ?");
			}
			else if(tank_1_data.wash_pump==1){
				confirm_dialog.html("Do you want to turn off the Pump ?");
			}
			confirm_dialog.dialog({
				resizable: false,
				height: 160,
				width: 350,
				modal: true,
				position: {my: "center", at: "center", of: $("#water-hmi")},
				buttons: {
					Yes: function () {
						if (tank_1_data.wash_pump == 0) {
							if (tank_1_data.wash_valve == 1) {
								tank_1_data.wash_pump = 1;
							}
							else {
								var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Open the valve before activating the pump.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
							}
						}
						else {
							tank_1_data.wash_pump = 0;
						}
						refresh_tank_1_states();
						$(this).dialog("destroy");
					},
					Cancel: function () {
						$(this).dialog("destroy");
					}
				}
			});
		}).appendTo(mainDiag);
		var wash_valve = $("<img id='tank_1_wash_valve' src='/public/assets/img/module12/tanks/valve_top_white.png' class='tank-pump' style='height:6%;position:absolute;left:78%;top:29.4%;' title='Surface-Wash Valve'>").click(function(){
			var confirm_dialog = $("<div></div>");
			if(tank_1_data.wash_valve==0){
				confirm_dialog.html("Do you want to open the valve ?");
			}
			else if(tank_1_data.wash_valve==1){
				confirm_dialog.html("Do you want to close the valve ?");
			}
			confirm_dialog.dialog({
				resizable: false,
				height: 160,
				width: 350,
				modal: true,
				position: {my: "center", at: "center", of: $("#water-hmi")},
				buttons: {
					Yes: function () {
						if (tank_1_data.wash_valve == 0) {
							tank_1_data.wash_valve = 1;
//                            if (tank_data.inflow_valve == 1) {
//                                tank_data.inflow_pump = 1;
//                            }
//                            else {
//                                var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Open the valve before activating the pump.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
//                            }
						}
						else {
							if(tank_1_data.wash_pump == 1){
								var warning_diag_1 = $("<div><span style='color: #e74c3c'>Error</span>: Can't close the valve when pump is activating.</div>").dialog({position: {my: "center", at: "center", of: $("#water-hmi")}});
							}
							else{
								tank_1_data.wash_valve = 0;
							}
						}
						refresh_tank_1_states();
						$(this).dialog("destroy");
					},
					Cancel: function () {
						$(this).dialog("destroy");
					}
				}
			});
		}).appendTo(mainDiag);

		var returnButton = $("<button>Return</button>").button().click(function () {
			mainDiag.dialog("destroy");
		}).appendTo(mainDiag).css({
			position: "absolute",
			top: "88%",
			left: "85%"
		});

		refresh_tank_1_states();
	}

	function tank2Diag() {
		var containerDiag = $("#water-hmi");
		var mainDiag = $("<div></div>").dialog({
			dialogClass: "no-close",
			title: "Tank - 2",
			position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
			width: containerDiag.width() * 0.91,
			height: containerDiag.height() * 0.87
		});
		var pumpDemo = $("<img src='/public/assets/img/module12/demo/tank-demo.png' style='width:100%;height:90%;position:absolute;left:0%;'>").appendTo(mainDiag);
		var returnButton = $("<button>Return</button>").button().click(function () {
			mainDiag.dialog("destroy");
		}).appendTo(mainDiag).css({
			position: "absolute",
			top: "88%",
			left: "85%"
		});
	}

	function faultsDiag() {
		var containerDiag = $("#water-hmi");
		var mainDiag = $("<div></div>").dialog({
			dialogClass: "no-close",
			title: "Fault Screen",
			draggable: false,
			appendTo: "#m12_ex7_workspace",
			position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
			width: containerDiag.width() * 0.91,
			height: containerDiag.height() * 0.87
		});
//        var pumpDemo = $("<img src='tank-demo.png' style='width:100%;height:90%;position:absolute;left:0%;'>").appendTo(mainDiag);
		var fault_txt = $("<div style='color:red;width:90%;height:80%;'></div>").appendTo(mainDiag);
		for (i = 0; i < faults_list.length; i++) {
			var new_fault = $("<p></p>").html(faults_list[i]).appendTo(fault_txt);
		}
		var returnButton = $("<button>Return</button>").button().click(function () {
			mainDiag.dialog("destroy");
		}).appendTo(mainDiag).css({
			position: "absolute",
			top: "88%",
			left: "85%"
		});
		var clearButton = $("<button>Clear Faults</button>").button().click(function () {
			new_fault.remove();
			faults_list = [];
			$("#hmi-faults").css({"background-color": "buttonface"})
		}).appendTo(mainDiag).css({
			position: "absolute",
			top: "88%",
			left: "3%"
		});
	}

	function dataDiag() {
		var containerDiag = $("#water-hmi");
		var mainDiag = $("<div></div>").dialog({
			dialogClass: "no-close",
			title: "Log Screen",
			position: {my: "left top", at: "left+4% top+5%", of: containerDiag},
			width: containerDiag.width() * 0.91,
			height: containerDiag.height() * 0.87
		});
		var dataDemo = $("<img src='/public/assets/img/module12/demo/data_demo.png' style='width:96%;height:75%;position:absolute;left:2%;top:10%;'>").appendTo(mainDiag);
		var returnButton = $("<button>Return</button>").button().click(function () {
			mainDiag.dialog("destroy");
		}).appendTo(mainDiag).css({
			position: "absolute",
			top: "88%",
			left: "85%"
		});
	}
</script>
@stop
