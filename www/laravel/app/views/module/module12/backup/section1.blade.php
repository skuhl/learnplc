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

@extends('module.template', array('submitStatus' => $submitstatus))

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
<div class='row'>
	<div id="m12_ex1_workspace">
		<div class='col-xs-9' style='height: 625px; min-width: 800px;'>
			<div id="m12_ex1_exercise_space" style='height: 625px;'>
				<p>Fill in the water treatment diagram:</p>
				<div class='thumbnail' style="position:absolute; top: 40px; left: 20px; width: 800px; height: 600px" >
					<div style='position:absolute; top: 30px; left: 30px'>
						{{ HTML::image('public/assets/img/module12/overview_ex1.PNG', 'overview_ex1', array('width'=>'700', 'height'=>'550')) }}
					</div>
					<div id="blank_1" class="m12_ex1_fill" data-index="0" style="position: absolute; top: 310; left: 130">
						<div id="wrap_1" class="text_wrap" style="width: 200px; height: 35px"></div>
					</div>
					<div id="blank_2" class="m12_ex1_fill" data-index="1" style="position: absolute; top: 60; left: 480">
						<div id="wrap_2" class="text_wrap" style="width: 200; height: 40"></div>
					</div>
					<div id="blank_3" class="m12_ex1_fill" data-index="2" style="position: absolute; top: 252; left: 130">
						<div id="wrap_3" class="text_wrap" style="width: 200; height: 40"></div>
					</div>
				</div>
			</div>
		</div>

		<div class='col-xs-3'>
			<h3>Names</h3>

			<ul style='list-style-type: none;padding:0; margin:0;'>
				<li class="m12_ex1_name">
					<p class="m12_ex1_name_text" data-name="1">Filter Tanks</p>
				</li>
				<li class="m12_ex1_name">
					<p class="m12_ex1_name_text" data-name="2">Pump House</p>
				</li>
				<li class="m12_ex1_name">
					<p class="m12_ex1_name_text" data-name="3">Water Tower</p>
				</li>
			</ul>
		</div>
	</div>
</div>
@stop

@section('submit-class')
m12_ex1_submit
@stop

@section('additional_script')
<script>
/**
 * Created by Bochao on 2014/6/25.
 */
 var diagram_array = [];
 var diagram_answer = [3,1,2];
 var wrong_answer = [];

 // $("#m3_ex1_namelist").accordion();

 $(".m12_ex1_name_text").draggable({
 	opacity: 0.7,
 	helper: "clone"
 });

 $(".m12_ex1_fill").droppable({
 	accept: ".m12_ex1_name_text",
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

 $(".m12_ex1_submit").button().click(
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