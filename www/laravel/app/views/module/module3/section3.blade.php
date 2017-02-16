<style>
	#m3_ex3_workspace{
		font: 62.5% "Trebuchet MS", sans-serif;
	}

	.m3_ex3_box{
		position: absolute;
		border: 2px solid #000000;
	}

	.m3_ex3_part{
		/*float: left;*/
		margin-left: 10px;
		/*border: 1px solid #000000;*/
	}


	#m3_ex3_partlist{
		width: 175;
	}

	.text_wrong{
		background-color: #e74c3c;
	}

	.m3_ex3_hover{
		background-color: #f39c12;
		opacity: 0.8;
	}

</style>

@extends('module.template')

@section('title','')

@section('section-menu')
@include('module.module3.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<h3>Using Input and Output to Build a System</h3>
<p>As discussed previously, the input and output modules of a PLC can take many forms. These devices are connected at strategic places in a system and information is fed to and from the computer, allowing a single PLC to control actions of tanks, light systems, motors and more.</p>

<p>Some of the basic devices are as follows:</p>

<ul style="list-style-type: none; padding-left: 0">
	<li><div class='row'>
		<div class='col-lg-2 col-md-3 col-sm-4'>
			{{ HTML::image('public/assets/img/module3/section3/motor.png','motor.png', array('width'=>'75', 'height'=>'75')) }}
		</div>
		<div class='col-lg-10 col-md-9 col-sm-8'>
			<strong>Motor</strong> One of the most commonly used items, motors can be configured to drive wheels, spin objects, pull water and complete many more actions. Their speed, power and timing is controlled by the PLC.
		</div>
	</div></li><br/>
	<li><div class='row'>
		<div class='col-lg-2 col-md-3 col-sm-4'>
			{{ HTML::image('public/assets/img/module3/section3/float.png','float.png', array('width'=>'75', 'height'=>'75')) }}
		</div>
		<div class='col-lg-10 col-md-9 col-sm-8'>
			<strong>Float.</strong> This device floats above a liquid surface and provides depth readings to the PLC.
		</div>
	</div></li><br/>
	<li><div class='row'>
		<div class='col-lg-2 col-md-3 col-sm-4'>
			{{ HTML::image('public/assets/img/module3/section3/temp.png','temp.png', array('width'=>'75', 'height'=>'75')) }}
		</div>
		<div class='col-lg-10 col-md-9 col-sm-8'>
			<strong>Thermometer.</strong> As expected, a temperature gauge can be placed in a system to report a temperature reading back to the logic controller. This information is often used as a threshold value to determine when action needs to be taken, or as a safety precaution.
		</div>
	</div></li><br/>
	<li><div class='row'>
		<div class='col-lg-2 col-md-3 col-sm-4'>
			{{ HTML::image('public/assets/img/module3/section3/flow.png','flow.png', array('width'=>'75', 'height'=>'75')) }}
		</div>
		<div class='col-lg-10 col-md-9 col-sm-8'>
			<strong>Flow control.</strong> The flow control is a reactive switch controlled by the PLC. It either allows liquid to pass through or stops the flow altogether.
		</div>
	</div></li>	<br/>
	<li><div class='row'>
		<div class='col-lg-2 col-md-3 col-sm-4'>
			{{ HTML::image('public/assets/img/module3/section3/Heater.png','heater.png', array('width'=>'75', 'height'=>'75')) }}
		</div>
		<div class='col-lg-10 col-md-9 col-sm-8'>
			<strong>Heater.</strong> The operation of a heater is controlled by the PLC. They are often used in conjunction with a thermometer to control when it is needed. Many different types of heaters exist and can be used for heating different types of liquids and gases.
		</div>
	</div></li>	
</ul>
@stop

@section('instructions')
<div class="lesson-title">Exercise 3</div>
<div class="lesson-statement">
	<p>
		To the right is a setup with the purpose of heating liquid in a tank. The machine's process is as follows:
	</p>
	<ul style='list-style-type: none'>
		<li>1. Liquid is pumped into the tank</li>
		<li>2. A heating element activates and begins warming the water</li>
		<li>3. Once a set temperature is reached water is pumped out of the tank</li>
	</ul>
	<p>Your job is to drag the PLC input and output components onto the tank in the correct location for the process to be completed</p>
	<p style="font-style: italic ">You have unlimited attempts to complete the system, feel free to experiment!</p>
</div>
@stop

@section('exercise')
<div class='row'>
	<div id="m3_ex3_workspace">
		<div class='col-lg-8'>
			<div class='thumbnail' style='height: 550px; background-color: #FBFBF9; width: 500px'>
				<div id="m3_ex3_exercise_space" style="height: 480px">

					<div style='position:absolute; top: 30px; left: 30px'>
						{{ HTML::image('public/assets/img/module3/section3/m3_ex3_water.png','m3_ex3_water.png',array('width' => '500', 'height' => '500')) }}
					</div>

					<div id="m3_ex3_box_1" class="m3_ex3_box" data-index="0" style='top: 204; left: 33'>
						{{ HTML::image('public/assets/img/module3/section3/question_mark.png','question_mark.png',array('width' => '60', 'height' => '60')) }}

					</div>
					<div id="m3_ex3_box_2" class="m3_ex3_box" data-index="1" style='top: 96; left: 105'>
						{{ HTML::image('public/assets/img/module3/section3/question_mark.png','question_mark.png',array('width' => '60', 'height' => '60')) }}

					</div>
					<div id="m3_ex3_box_3" class="m3_ex3_box" data-index="2" style='top: 42; left: 184'>
						{{ HTML::image('public/assets/img/module3/section3/question_mark.png','question_mark.png',array('width' => '60', 'height' => '60')) }}

					</div>
					<div id="m3_ex3_box_4" class="m3_ex3_box" data-index="3" style='top: 446; left: 99'>
						{{ HTML::image('public/assets/img/module3/section3/question_mark.png','question_mark.png',array('width' => '60', 'height' => '60')) }}

					</div>
					<div id="m3_ex3_box_5" class="m3_ex3_box" data-index="4" style='top: 432; left: 387'>
						{{ HTML::image('public/assets/img/module3/section3/question_mark.png','question_mark.png',array('width' => '60', 'height' => '60')) }}

					</div>
					<div id="m3_ex3_box_6" class="m3_ex3_box" data-index="5" style='top: 202; left: 430'>
						{{ HTML::image('public/assets/img/module3/section3/question_mark.png','question_mark.png',array('width' => '60', 'height' => '60')) }}

					</div>
				</div>
			</div>
		</div>

		<div class='col-lg-4'>
			<div id="m3_ex3_partlist">
				<div class='thumbnail' style="text-align: center; background-color: #FBFBF9">
					<h3 style="color: black">Components</h3>

					<ul style="margin: 0px; padding: 0px; list-style-type: none">
						<li class="m3_ex3_part" data-part="1">
							<div>
								{{ HTML::image('public/assets/img/module3/section3/motor.png','motor.png',array('width' => '100', 'height' => '90')) }}
							</div>
						</li>
						<li class="m3_ex3_part" data-part="2">
							<div>
								{{ HTML::image('public/assets/img/module3/section3/float.png','float.png',array('width' => '100', 'height' => '90')) }}
							</div>
						</li>
						<li class="m3_ex3_part" data-part="3">
							<div>
								{{ HTML::image('public/assets/img/module3/section3/temp.png','temp.png',array('width' => '100', 'height' => '90')) }}

							</div>
						</li>
						<li class="m3_ex3_part" data-part="4">
							<div>
								{{ HTML::image('public/assets/img/module3/section3/flow.png','flow.png',array('width' => '100', 'height' => '90')) }}

							</div>
						</li>
			            <li class="m3_ex3_part" data-part="6">
			                <div>
			                    {{ HTML::image('public/assets/img/module3/section3/Heater.png','heater.png',array('width' => '100', 'height' => '90')) }}

			                </div>
			            </li>
					</ul>
				</div>
			</div>
		</div>

	</div>
</div>
@stop

@section('submit-class')
m3_ex3_submit
@stop

@section('additional_script')
<script>
	var m3_ex3_answer = [4,1,2,3,6,1];
	var m3_ex3_result = [];
	var wrong_answer = [];

	$(".m3_ex3_part").draggable({
		opacity: 0.7,
		helper: "clone"
	});

	$(".m3_ex3_box").droppable({
		accept: ".m3_ex3_part",
		hoverClass: "m3_ex3_hover",
		tolerance: "pointer",
		drop: function(event, ui){
			var box_img = $(this).find("img");
			var index = $(this).data("index");
			var value = ui.draggable.data("part");
			switch (value){
				case 1:
				    box_img.attr("src", "/public/assets/img/module3/section3/motor.png");
//                    box_img.css({"background-color": "white"});
				break;
				case 2:
				    box_img.attr("src", "/public/assets/img/module3/section3/float.png");
//                    box_img.css({"background-color": "white"});
				break;
				case 3:
				    box_img.attr("src", "/public/assets/img/module3/section3/temp.png");
//                    box_img.css({"background-color": "white"});
				break;
				case 4:
				    box_img.attr("src", "/public/assets/img/module3/section3/flow.png");
//                    box_img.css({"background-color": "white"});
				break;
				case 5:
				    box_img.attr("src", "/public/assets/img/module3/section3/inductive.png");
//                    box_img.css({"background-color": "white"});
				break;
                case 6:
                    box_img.attr("src", "/public/assets/img/module3/section3/Heater.png");
//                    box_img.css({"background-color": "white"});
                break;
				default:
				break;
			}
			m3_ex3_result[index] = value;
			$(this).removeClass('text_wrong');
		}
	});

	$(".m3_ex3_submit").button().click(
		function () {
			wrong_answer = [];
			var result = 1;
			for(var i=0; i<m3_ex3_answer.length; i++){
				if(m3_ex3_result[i]!=m3_ex3_answer[i]){
					result = 0;
					wrong_answer.push(i);
				}
			}

            submit_post(result);
            $("#continue").show();

//			if(result==1){
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

			for(var k = 0; k<m3_ex3_answer.length; k++) {
				var wrap_name = "#m3_ex3_box_" + (k + 1).toString();
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