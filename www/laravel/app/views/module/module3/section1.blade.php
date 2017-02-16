<style>
	#m3_ex1_workspace{
		/*font: 62.5% "Trebuchet MS", sans-serif;*/
	}

	#m3_ex1_namelist{
		width:170px;
	}

	.m3_ex1_name{
		margin: 4px;
		padding: 3px;
		width: 200px;
	}

	#m3_ex1_namelist .ui-accordion-content {
		padding: 0px;
	}

	.m3_ex1_name_text{
		padding: 3px;
		margin: 1px;
		text-align: center;
		background-color: #3498db;
	}

	.m3_ex1_fill{
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

@section('title','')

@section('section-menu')
@include('module.module3.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<h3>Creating a PLC component diagram.</h3>
<p>Each physical PLC can be separated into six distinguishable parts, each with its own purpose, they are:</p>
<ul style="list-style-type: decimal">
	<li><strong>Input.</strong> The input receives commands from a source and passes them on to the grouping of parts that handles the controls of the PLC. The input source may be a human operator or another machine.</li><br/>
	<li><strong>Output.</strong> The output receives commands from the internal components of the PLC and performs actions based on given instructions. Actions might range from turning off a motor to sending a wireless signal.</li><br/>
	<li><strong>Power Supply.</strong>The power supply unit supplies power to each individual element of the PLC.</li><br/>
	<li><strong>Central Processing Unit.</strong>The brains of a PLC. The CPU receives information from Input and uses the memory and communication modules to interpret the input conditions before passing it along.</li><br/>
	<li><strong>Memory.</strong> The memory module is used by the CPU and communication modules to store and use the information given to the PLC.</li><br/>
	<li><strong>Communication.</strong>Handles data transfer to outside sources,  not always included. </li><br/>
</ul>
@stop

@section('instructions')
<div class="lesson-title">Excercise 1</div>
<div class="lesson-statement">
	<p>
		Using the descriptions above, complete the flow diagram by dragging the each item to its correct position
	</p>

</div>
@stop

@section('exercise')
<div class='row'>
	<div id="m3_ex1_workspace">
		<div class='col-xs-9' style='height: 400px; min-width: 600px;'>
			<div id="m3_ex1_exercise_space" style='height: 300px;'>
				<p>Fill in the component diagram:</p>
				<div class='thumbnail' style="position:absolute; top: 40px; left: 20px; width: 600px; height: 350px" >
					<div style='position:absolute; top: 30px; left: 30px'>
						{{ HTML::image('public/assets/img/module3/m3_ex1_diagram.png', 'm3_ex_img', array('width'=>'550', 'height'=>'300')) }}
					</div>
					<div id="blank_1" class="m3_ex1_fill" data-index="0" style="position: absolute; top: 142; left: 36">
						<div id="wrap_1" class="text_wrap" style="width: 115px; height: 115px"></div>
					</div>
					<div id="blank_2" class="m3_ex1_fill" data-index="1" style="position: absolute; top: 37; left: 140">
						<div id="wrap_2" class="text_wrap" style="width: 325; height: 35"></div>
					</div>
					<div id="blank_3" class="m3_ex1_fill" data-index="2" style="position: absolute; top: 117; left: 203">
						<div id="wrap_3" class="text_wrap" style="width: 200; height: 45"></div>
					</div>
					<div id="blank_4" class="m3_ex1_fill" data-index="3" style="position: absolute; top: 169; left: 203">
						<div id="wrap_4" class="text_wrap" style="width: 200; height: 45"></div>
					</div>
					<div id="blank_5" class="m3_ex1_fill" data-index="4" style="position: absolute; top: 220; left: 203">
						<div id="wrap_5" class="text_wrap" style="width: 200; height: 45"></div>
					</div>
					<div id="blank_6" class="m3_ex1_fill" data-index="5" style="position: absolute; top: 141; left: 458">
						<div id="wrap_6" class="text_wrap" style="width: 115; height: 115"></div>
					</div>
				</div>
			</div>
		</div>

		<div class='col-xs-3'>
			<h3>Items</h3>

			<ul style='list-style-type: none;padding:0; margin:0;'>
				<li class="m3_ex1_name">
					<p class="m3_ex1_name_text" data-name="1">Input Section</p>
				</li>
				<li class="m3_ex1_name">
					<p class="m3_ex1_name_text" data-name="2">Output Section</p>
				</li>
				<li class="m3_ex1_name">
					<p class="m3_ex1_name_text" data-name="3">Power Supply Module</p>
				</li>
				<li class="m3_ex1_name">
					<p class="m3_ex1_name_text" data-name="4">Central Processing Unit</p>
				</li>
				<li class="m3_ex1_name">
					<p class="m3_ex1_name_text" data-name="5">Memory</p>
				</li>
				<li class="m3_ex1_name">
					<p class="m3_ex1_name_text" data-name="6">Communications</p>
				</li>
			</ul>
		</div>
	</div>
</div>
@stop

@section('submit-class')
m3_ex1_submit
@stop

@section('additional_script')
<script>
 var diagram_array = [];
 var diagram_answer = [1,3,4,5,6,2];
 var wrong_answer = [];

 // $("#m3_ex1_namelist").accordion();

 $(".m3_ex1_name_text").draggable({
 	opacity: 0.7,
 	helper: "clone"
 });

 $(".m3_ex1_fill").droppable({
 	accept: ".m3_ex1_name_text",
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

 $(".m3_ex1_submit").button().click(
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