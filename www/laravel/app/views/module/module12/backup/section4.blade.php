<style>
	#m12_ex4_workspace {
		/*font: 62.5% "Trebuchet MS", sans-serif;*/
		padding: 0 px;
	
	}

	#m12_ex4_namelist {
		width: 170px;
	}

	.m12_ex4_name {
		margin: 4px;
		padding: 3px;
		width: 200px;
	}

	#m12_ex4_namelist .ui-accordion-content {
		padding: 0px;
	}

	.m12_ex4_name_text {
		padding: 3px;
		margin: 1px;
		text-align: center;
		background-color: #3498db;
	}

	.m12_ex4_fill {
		/*border: 1px solid #c0392b;*/
	
	}

	.text_name {
		border: 1px dotted #656565;
	}

	.text_wrap {
		vertical-align: middle;
		text-align: center;
		display: table-cell;
		font-size: 130%;
		font-weight: bold;
	}

	.text_wrong {
		background-color: #e74c3c;
	}

	.text_hover {
		background-color: #95a5a6;
	}
</style>

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Backwash') 

@section('section-menu')
@include('module.module12.menu') 
@stop 

@section('lesson')
<div class="lesson-title">Backwash</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>Backwash Purpose</h3>
		<p>When a filter tank becomes clogged, the outflow pressure becomes low or there is a large difference between 
		inflow and outflow pressure and a backwash must be performed. The inlet flow must be stopped and the dirty water 
		drain opened. Clean water is pumped backwards through the tank and the filter medium is agitated such that the 
		system becomes unclogged. Then the dirty water is pumped through the wash troughs and is drained through the 
		dirty water drain. After the backwards is performed, the filter tank can resume water cleaning.</p>
	</div>
	<div class="subsection">
		<h3>Steps for Basckwash</h3>
		<p> 
			<ol>
				<li> Check for low outflow pressure or large pressure difference</li>
				<li> Turn off inlet pump</li>
				<li> Close inlet valve</li>
				<li> Open dirty water drain valve</li>
				<li> Turn on backwash pump</li>
				<li> Turn on surface wash pump</li>
				<li> Open surface wash valve</li>
				<li> Wash until a preset amount of water has been pumped through<br/> 
				At this point it is  time to end the backwash and resume cleaning water</li>
				<li> Shutdown surface wash pump</li>
				<li> Close surface wash valve</li>
				<li> Shutdown backwash pump</li>
				<li> Close dirty water drain valve</li>
				<li> Open inflow valve</li>
				<li> Start inflow pump</li>
				<li> Monitor for correct outflow pressure</li>		
			</ol>
		</p>
	</div>
	<div class = "subsection">
		<h3>Backwash Diagrams</h3>
		<h4>Filter Medium is Clogged</h4>
		<p>
		{{ HTML::image('public/assets/img/module12/section4_diagram1.png','section4_diagram1', array('width'=>'600', 'height'=>'400')) }}
		</p>
		<h4>Begin Backwash</h4>
		<p>
		{{ HTML::image('public/assets/img/module12/section4_diagram2.png','section4_diagram2', array('width'=>'600', 'height'=>'400')) }}
		</p>
		<h4>Backwash is Complete</h4>
		<p>
		{{ HTML::image('public/assets/img/module12/section4_diagram3.png','section4_diagram3', array('width'=>'600', 'height'=>'400')) }}
		</p>
		<h4>Resume Cleaning Water</h4>
		<p>
		{{ HTML::image('public/assets/img/module12/section4_diagram4.png','section4_diagram3', array('width'=>'600', 'height'=>'400')) }}
		</p>
		<p>
		A working pump should read with a gallons per minute intake of 10 to
		10,000 GPM and a water pressure between 50 and 100 PSI.<br />
		</p>
	</div>
</div>
@stop 
@section('instructions')
<div class="lesson-title">Exercise 4</div>
<div class="lesson-statement">
	<p>Choose the correct order for the steps to operate the filter tank
		and then press 'Continue'.</p>
</div>
@stop 
@section('exercise')
<div class='row'>
	<div id="m12_ex4_workspace" style = "padding: 0px">
		<div class='col-xs-9' style='height: 800px; min-width: 1300px;'>
			<div id="m12_ex4_exercise_space" style='height: 800px;'>
				<p>Match the Steps to their Order:</p>
				<div class='thumbnail' style="position:absolute; top: 20px; left: 0px; width: 1300px; height: 800px" >
					<div style="position:absolute; top: 30px; left: 0x">
						{{ HTML::image('public/assets/img/module12/section4_ex4.png', 'section2_ex4', array('width'=>'862', 'height'=>'532')) }}
					</div>
					<div id="blank_1" class="m12_ex4_fill" data-index="0" style="position: absolute; top: 52; left: 97">
						<div id="wrap_1" class="text_wrap" style="width: 380px; height: 70px"></div>
					</div>
					<div id="blank_2" class="m12_ex4_fill" data-index="1" style="position: absolute; top: 122; left: 97">
						<div id="wrap_2" class="text_wrap" style="width: 380px; height: 70px"></div>
					</div>
					<div id="blank_3" class="m12_ex4_fill" data-index="2" style="position: absolute; top: 190; left: 97">
						<div id="wrap_3" class="text_wrap" style="width: 380px; height: 60px"></div>
					</div>
					<div id="blank_4" class="m12_ex4_fill" data-index="3" style="position: absolute; top: 250; left: 97">
						<div id="wrap_4" class="text_wrap" style="width: 380px; height: 60px"></div>
					</div>
					<div id="blank_5" class="m12_ex4_fill" data-index="4" style="position: absolute; top: 315; left: 97">
						<div id="wrap_5" class="text_wrap" style="width: 380px; height: 60px"></div>
					</div>
					<div id="blank_6" class="m12_ex4_fill" data-index="5" style="position: absolute; top: 380; left: 97">
						<div id="wrap_6" class="text_wrap" style="width: 380px; height: 60px"></div>
					</div>
					<div id="blank_7" class="m12_ex4_fill" data-index="6" style="position: absolute; top: 445; left: 97">
						<div id="wrap_7" class="text_wrap" style="width: 380px; height: 60px"></div>
					</div>
					<div id="blank_8" class="m12_ex4_fill" data-index="7" style="position: absolute; top: 52; left: 540">
						<div id="wrap_8" class="text_wrap" style="width: 370px; height: 70px"></div>
					</div>
					<div id="blank_9" class="m12_ex4_fill" data-index="8" style="position: absolute; top: 122; left: 540">
						<div id="wrap_9" class="text_wrap" style="width: 370px; height: 70px"></div>
					</div>
					<div id="blank_10" class="m12_ex4_fill" data-index="9" style="position: absolute; top: 190; left: 540">
						<div id="wrap_10" class="text_wrap" style="width: 370px; height: 60px"></div>
					</div>
					<div id="blank_11" class="m12_ex4_fill" data-index="10" style="position: absolute; top: 250; left: 540">
						<div id="wrap_11" class="text_wrap" style="width: 370px; height: 60px"></div>
					</div>
					<div id="blank_12" class="m12_ex4_fill" data-index="11" style="position: absolute; top: 315; left: 540">
						<div id="wrap_12" class="text_wrap" style="width: 370px; height: 60px"></div>
					</div>
					<div id="blank_13" class="m12_ex4_fill" data-index="12" style="position: absolute; top: 380; left: 540">
						<div id="wrap_13" class="text_wrap" style="width: 370px; height: 60px"></div>
					</div>
					<div id="blank_14" class="m12_ex4_fill" data-index="13" style="position: absolute; top: 445; left: 540">
						<div id="wrap_14" class="text_wrap" style="width: 370px; height: 60px"></div>
					</div>
					<div id="blank_15" class="m12_ex4_fill" data-index="14" style="position: absolute; top: 510; left: 540">
						<div id="wrap_15" class="text_wrap" style="width: 370px; height: 60px"></div>
					</div>
					
				
			</div>
		

		<div class='col-xs-3' style = "position:absolute; padding:0px 0px 0px 900px">
			<h3>Names</h3>

			<ul style='list-style-type: none; margin:0;'>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="1">Open inflow valve</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="2">Wash preset amount</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="3">Open surface wash valve</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="4">Check for low outflow pressure</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="5">Close dirty water drain valve</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="6">Start inflow pump</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="7">Turn on surface wash pump</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="8">Shutdown backwash pump</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="9">Shutdown surface wash pump</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="10">Turn on backwash pump</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="11">Monitor for correct outflow pressure</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="12">Open dirty water drain valve</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="13">Close inlet valve</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="14">Turn off inlet pump</p>
				</li>
				<li class="m12_ex4_name">
					<p class="m12_ex4_name_text" data-name="15">Close surface wash valve</p>
				</li>
			</ul>
		</div>
		</div>
		</div>
	</div>
</div>
@stop

@section('submit-class')
m12_ex4_submit
@stop

@section('additional_script')
<script>
/**
 * Created by Bochao on 2014/6/25.
 */
 var diagram_array = [];
 var diagram_answer = [4,14,13,12,10,7,3,2,9,15,8,5,1,6,11];
 var wrong_answer = [];

 // $("#m3_ex4_namelist").accordion();

 $(".m12_ex4_name_text").draggable({
 	opacity: 0.7,
 	helper: "clone"
 });

 $(".m12_ex4_fill").droppable({
 	accept: ".m12_ex4_name_text",
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

 $(".m12_ex4_submit").button().click(
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