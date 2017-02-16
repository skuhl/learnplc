<style>
	#m3_ex4_workspace{
	}

	.m3_ex4_snap{
		border: 3px solid #c0392b;
	}

	.text_wrong{
		background-color: #e74c3c;
	}

	.m3_ex4_snap_hover{
		background-color: #bdc3c7;
	}

	.m3_ex4_snap_active{
		background-color: #7f8c8d;
	}

	.m3_ex4_name{
		margin: 4px;
		padding: 3px;
	}

	.m3_ex4_snap_text{
		width:108px;
		height:30px;
	}

	#m3_ex4_namelist .ui-accordion-content {
		padding: 0px;
	}

	.m3_ex4_name_text {
		padding: 3px;
		margin: 1px;
		text-align: center;
		background-color: #3498db;
	}
	#m3_ex4_namelist{
		width: 200px;

	}
</style>

@extends('module.template')

@section('title','')

@section('section-menu')
@include('module.module3.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<h3>The PLC lifecycle</h3>
<p>A PLC runs in a constant looping state of operation. Each loop consist of four broad actions, each with a specific goal.</p>
<ul style="list-style-type: decimal">
	<li><strong>Input Scan.</strong> At the beginning of the cycle, all input devices are queried so that accurate and recent readings can be analyzed during the program execution.</li><br/>
	<li><strong>Program Execution.</strong> The user designed software is now run. This process includes all logic created through the ladder logic programming. </li><br/>
	<li><strong>Output Scan.</strong> To be useful, PLC's must do something with the input information. After ladder logic has been ran, and if reactions are needed the PLC updates its outputs. These can include motors, control valves and heaters.</li><br/>
	<li><strong>House Keeping.</strong>In order to ensure the PLC can continue to run reliably a number of chores are run after each cycle. These include cleaning system memory and checking basic system faults.</li>
</ul>
@stop

@section('instructions')
<div class="lesson-title">Excercise 4</div>
<div class="lesson-statement">
	<p>
		Drag each step of the PLC cycle into its correct box
	</p>

</div>
@stop

@section('exercise')
<div class='row'>
	<div id="m3_ex4_workspace">

		<div class='col-lg-9'>
			<div class="thumbnail" style="height: 455px; width: 555px">
				<div id="m3_ex4_exercise_space" style="height: 375">

					<div style='position:absolute; top: 60px; left: 60px'>
						{{ HTML::image('public/assets/img/module3/section4/m3_ex4_arrows.png', 'm3_ex4_arrows', array('width'=>'500', 'height'=>'350')) }}
					</div>

					<div id="m3_ex4_snap_1" class="m3_ex4_snap" data-index="0" style="position: absolute; top: 151; left: 447">
						<p id="m3_ex4_text_1" class="m3_ex4_snap_text"></p>
					</div>
					<div id="m3_ex4_snap_2" class="m3_ex4_snap" data-index="1" style="position: absolute; top: 357; left: 402">
						<p id="m3_ex4_text_2" class="m3_ex4_snap_text"></p>
					</div>
					<div id="m3_ex4_snap_3" class="m3_ex4_snap" data-index="2" style="position: absolute; top: 338; left: 69">
						<p id="m3_ex4_text_3" class="m3_ex4_snap_text"></p>
					</div>
					<div id="m3_ex4_snap_4" class="m3_ex4_snap" data-index="3" style="position: absolute; top: 60; left: 104">
						<p id="m3_ex4_text_4" class="m3_ex4_snap_text"></p>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-3">
			<div id="m3_ex4_namelist">
				<h3>Word Bank</h3>

				<ul style='list-style-type: none; margin: 0; padding: 0;'>
					<li class="m3_ex4_name" data-name="1">
						<p class="m3_ex4_name_text">Output Scan</p>
					</li>
					<li class="m3_ex4_name" data-name="2">
						<p class="m3_ex4_name_text">Input Scan</p>
					</li>
					<li class="m3_ex4_name" data-name="3">
						<p class="m3_ex4_name_text">Program Execution</p>
					</li>
					<li class="m3_ex4_name" data-name="4">
						<p class="m3_ex4_name_text">HouseKeeping</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
@stop

@section('submit-class')
m3_ex4_submit
@stop

@section('additional_script')
<script>
	var m3_ex4_array = [];
	var m3_ex4_answer = [2,3,1,4];
	var wrong_answer = [];

	$(".m3_ex4_name").draggable({
		opacity: 0.7,
		helper: "clone",
        cursorAt:{
            top: 20,
            left: 40}
	});

	$(".m3_ex4_snap").droppable({
		accept: ".m3_ex4_name",
		hoverClass: "m3_ex4_snap_hover",
		tolerance: "touch",
		drop: function (event, ui) {
			var name_tag = $(this).children("p");
			var n_value = ui.draggable.data("name");
			var index = $(this).data("index");
			name_text = ui.draggable.children("p").html();
			name_tag.css({
				"vertical-align": "middle",
				"text-align": "center",
				display: "table-cell",
				"font-size": "130%",
				"font-weight": "bold"

			});
			name_tag.html(name_text);
			m3_ex4_array[index] = n_value;
			$(this).removeClass("text_wrong");
		}
	});

	$(".m3_ex4_submit").button().click(
		function () {
			var result = 1;
			wrong_answer = [];
			for(var i=0; i<m3_ex4_answer.length; i++){
				if(m3_ex4_array[i]!=m3_ex4_answer[i]){
					result = 0;
					wrong_answer.push(i);
				}
			}

            submit_post(result);
            $("#continue").show();
//			if(result==1){
//				alert('correct');
//				var result_dialog = $("<div></div>");
//				var result_content = $("<p></p>");
//				result_content.html("Correct!!");
//				result_dialog.append(result_content);
//				result_dialog.dialog({
//					show: {
//						effect: "bounce",
//						duration: 1000
//					},
//					hide: function(){
//						$(this).dialog("destroy");
//					}
//				});
//				// send ajax to modulecontroller
//
//			}
//			else{
//				var result_dialog = $("<div></div>");
//				var result_content = $("<p></p>");
//				result_content.html("Incorrect!! Please check your answer");
//				result_dialog.append(result_content);
//				result_dialog.dialog({
//					show: {
//						effect: "shake",
//						duration: 1000
//					},
//					hide: function(){
//						$(this).dialog("destroy");
//					}
//				});
//			}

			for(var k = 0; k<m3_ex4_answer.length; k++) {
				var wrap_name = "#m3_ex4_snap_" + (k + 1).toString();
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