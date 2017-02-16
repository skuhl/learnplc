<style>
	#m12_ex2_workspace{
		/*font: 62.5% "Trebuchet MS", sans-serif;*/
	}

	#m12_ex2_namelist{
		width:170px;
	}

	.m12_ex2_name{
		margin: 4px;
		padding: 3px;
		width: 200px;
	}

	#m12_ex2_namelist .ui-accordion-content {
		padding: 0px;
	}

	.m12_ex2_name_text{
		padding: 3px;
		margin: 1px;
		text-align: center;
		background-color: #3498db;
	}

	.m12_ex2_fill{
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

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Pump House')

@section('section-menu')
@include('module.module12.menu')
@stop

@section('lesson')
<div class="lesson-title">Pump House</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
			The pump house is responsible for pumping water from a source, in this case the source is 
			a river, and sending it into the water treatment plant. It consists of an inlet that allows 
			water from the source to enter the system and two pumps.
		</p>
	</div>
	<div class="subsection">
		<p>
			Pump House Parts:<br/>
			<ol> 
				<li> <b>Inlet:</b><br/> Allows or blocks water from entering the system; can be open or shut</li>
				<li> <b>Inlet Flow Meter and Pressure Guage 1/2:</b><br/> Detects pressure at inlet for pump 1/2</li>
				<li> <b>Solenoid Valve 1/2:</b><br/> Opens or closes valve to pump 1/2</li>
				<li> <b>Pump 1/2:</b><br/> Provides pressure and flow for pump 1/2 system</li>
				<li> <b>Flow Meter 1/2:</b><br/> Measures flow GPM for pump 1/2</li>
			</ol>
		</p>
		<p>
		{{ HTML::image('public/assets/img/module12/section2_diagram.PNG', 'section2_diagram', array('width'=>'300', 'height'=>'360')) }}
		</p>
		<p>
		A working pump should read with a gallons per minute intake of 10 to 10,000 GPM and a water pressure between 50 and 100 PSI.
		</p>
	</div>
	<div class = "subsection">
		<p>
			In order to turn on the pump and begin pumping water from the river, there are <b>three</b> steps.<br/>
			<ol>
				<li> Open the inlet</li>
				<li> Open the solenoid valve</li>
				<li> Turn on the pump</li>
			</ol>
		</p>
		<p>
			In order to turn off the pump the <b>three</b> steps are the same, but reversed.<br/>
			<ol>
				<li> Turn off the pump</li>
				<li> Close the solenoid valve</li>
				<li> Close the inlet</li>
			</ol>
		</p>
		<p><i>
		Notes:<br/>
		<ul>
		<li> Pumps will not turn on if the inlet is closed or blocked.</li>
		<li> Only one pump is active at a time.</li>
		<li> In this module, green will indicate an active piece of machinery, black is inactive, and red 
		will indicate a faulted, non working, machinery.</li>
		</ul>
		</i></p>
		<br/>
	</div>

</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 2</div>
<div class="lesson-statement">
	<p>
		Correctly match the names of the parts of the pump house to the definitions to the right. 
		Then press 'Continue'.
	</p>
</div>
@stop
@section('exercise')
<div class='row'>
	<div id="m12_ex2_workspace">
		<div class='col-xs-9' style='height: 400px; min-width: 700px;'>
			<div id="m12_ex2_exercise_space" style='height: 400px;'>
				<p>Match the Parts to their definitions:</p>
				<div class='thumbnail' style="position:absolute; top: 40px; left: 20px; width: 700px; height: 400px" >
					<div style='position:absolute; top: 50px; left: 50px'>
						{{ HTML::image('public/assets/img/module12/section2_ex2.PNG', 'section2_ex2', array('width'=>'600', 'height'=>'300')) }}
					</div>
					<div id="blank_1" class="m12_ex2_fill" data-index="0" style="position: absolute; top: 50; left: 50">
						<div id="wrap_1" class="text_wrap" style="width: 200px; height: 60px"></div>
					</div>
					<div id="blank_2" class="m12_ex2_fill" data-index="1" style="position: absolute; top: 110; left: 50">
						<div id="wrap_2" class="text_wrap" style="width: 200; height: 60px"></div>
					</div>
					<div id="blank_3" class="m12_ex2_fill" data-index="2" style="position: absolute; top: 170; left: 50">
						<div id="wrap_3" class="text_wrap" style="width: 200; height: 60px"></div>
					</div>
					<div id="blank_4" class="m12_ex2_fill" data-index="3" style="position: absolute; top: 230; left: 50">
						<div id="wrap_4" class="text_wrap" style="width: 200; height: 60px"></div>
					</div>
					<div id="blank_5" class="m12_ex2_fill" data-index="4" style="position: absolute; top: 290; left: 50">
						<div id="wrap_5" class="text_wrap" style="width: 200; height: 60px"></div>
					</div>
				</div>
			</div>
		</div>

		<div class='col-xs-3'>
			<h3>Names</h3>

			<ul style='list-style-type: none;padding:0; margin:0;'>
				<li class="m12_ex2_name">
					<p class="m12_ex2_name_text" data-name="1">Solenoid Valve 1/2</p>
				</li>
				<li class="m12_ex2_name">
					<p class="m12_ex2_name_text" data-name="2">Inlet Flow Meter and Pressure Guage 1/2</p>
				</li>
				<li class="m12_ex2_name">
					<p class="m12_ex2_name_text" data-name="3">Inlet</p>
				</li>
				<li class="m12_ex2_name">
					<p class="m12_ex2_name_text" data-name="4">Pump 1/2</p>
				</li>
				<li class="m12_ex2_name">
					<p class="m12_ex2_name_text" data-name="5">Flow Meter 1/2</p>
				</li>
			</ul>
		</div>
	</div>
</div>
@stop

@section('submit-class')
m12_ex2_submit
@stop

@section('additional_script')
<script>
/**
 * Created by Bochao on 2014/6/25.
 */
 var diagram_array = [];
 var diagram_answer = [3,1,5,4,2];
 var wrong_answer = [];

 // $("#m3_ex2_namelist").accordion();

 $(".m12_ex2_name_text").draggable({
 	opacity: 0.7,
 	helper: "clone"
 });

 $(".m12_ex2_fill").droppable({
 	accept: ".m12_ex2_name_text",
 	hoverClass: "text_hover",
//    over: function(event, ui) {
////        $(this).removeClass('text_wrong');
//        $(this).addClass('text_hover');
//    },
//    out: function(event, ui) {
//        $(this).removeClass('text_hover');
//    },
drop: function (event, ui) {
	var input_name = ui.draggable.html();
	$(this).children("div.text_wrap").html(input_name);
	var index = $(this).data("index");
	var n_value = ui.draggable.data("name");
	diagram_array[index] = n_value;
//        alert("entered is: "+value);
$(this).removeClass('text_wrong');
}
});

 $(".m12_ex2_submit").button().click(
 	function () {
 		wrong_answer = [];
 		var result = 1;
 		for(var i=0; i<diagram_answer.length; i++){
 			if(diagram_array[i]!=diagram_answer[i]){
 				result = 0;
 				wrong_answer.push(i);
 			}
 		}

 		submit_post(result);
 		$("#continue").show();

//		if(result==1){
////			var result_dialog = $("<div></div>");
////			var result_content = $("<p></p>");
////			result_content.html("Correct!!");
////			result_dialog.append(result_content);
////			result_dialog.dialog({
////				show: {
////					effect: "bounce",
////					duration: 1000
////				},
////				hide: function(){
////					$(this).dialog("destroy");
////				}
//
//			});
// 		}
// 		else{
// 			var result_dialog = $("<div></div>");
// 			var result_content = $("<p></p>");
// 			result_content.html("Incorrect!! Please check your answer");
// 			result_dialog.append(result_content);
// 			result_dialog.dialog({
// 				show: {
// 					effect: "shake",
// 					duration: 1000
// 				},
// 				hide: function(){
// 					$(this).dialog("destroy");
// 				}
// 			});
// 		}
for(var k = 0; k<diagram_answer.length; k++) {
	var wrap_name = "#blank_" + (k + 1).toString();
	if (wrong_answer.indexOf(k) > -1) {
		$(wrap_name).addClass("text_wrong");
	}
	else {
		$(wrap_name).removeClass("text_wrong");
	}
}
}
);
</script>
@stop