<style>
	#m3_ex2_workspace{
		font: 62.5% "Trebuchet MS", sans-serif;
	}

	#m3_ex2_partlist{
		text-align: center
	}

	.m3_ex2_fill{
		/*border: 1px solid #c0392b;*/
		/*background-color: #f1c40f;*/
		/*opacity: 0.4;*/
	}

	.m3_ex2_part{
		/*float: left;
		margin-left: 20px;*/
	}

	.text_wrong{
		background-color: #e74c3c;
		padding: 5px;
	}

	.m3_ex2_hover{
		background-color: #f39c12;
		opacity: 0.8;
	}

	.text_wrap{
		background-color: #f1c40f;
		opacity: 0.4;
	}

	.m3_ex2_img{
		position: absolute;
		top: 0px;
		left:0px;
	}
</style>

@extends('module.template')

@section('title','')

@section('section-menu')
@include('module.module3.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<h3>Create a Modular PLC</h3>
<p>Conceptually it is easier to think of the PLC as six different components, but in reality the basic parts of a PLC are simplified down to three hardware objects.</p>
<ul style="list-style-type: decimal">
	<li><div class='row'>
		<div class='col-lg-2'>
			{{ HTML::image('public/assets/img/module3/section2/power_iso.png', 'power_iso.png', array('width'=>'50', 'height'=>'75')) }}
		</div>
		<div class='col-lg-10'>
			<strong>Power Supply.</strong> Most PLCs contain only one power supply. In the example board to the right the power supply in inserted on the farthest left port.
		</div>
	</div></li>
	<li><div class='row'>
		<div class='col-lg-2'>
			{{ HTML::image('public/assets/img/module3/section2/CPU_iso.png', 'CPU.png', array('width'=>'50', 'height'=>'75')) }}
		</div>
		<div class='col-lg-10'>
			<strong>Processing.</strong> The processing unit contains the CPU, memory and communication devices of the PLC. Again, there is only one processing unit per PLC. It can be identified by the fact that it requires multiple, in this case, 2 ports to properly attach to the circuit board.
		</div>
	</div></li>
	<li><div class='row'>
		<div class='col-lg-2'>
			{{ HTML::image('public/assets/img/module3/section2/IO_iso.png', 'IO_iso.png', array('width'=>'50', 'height'=>'75')) }}
		</div>
		<div class='col-lg-10'>
			<strong>Input / Output.</strong> Each modular PLC unit will have multiple I/O modules. These generic plug-ins fill a multitude of purposes, but at the circuit board level the attachments will look very similar. Our board will need 5 I/O modules.
		</div>
	</div></li>
</ul>

	@stop

	@section('instructions')
	<div class="lesson-title">Excercise 2</div>
	<div class="lesson-statement">
		<p>
			Fill in the PLC board by dragging hardware components into the correct highlighted locations.
		</p>

	</div>
	@stop

	@section('exercise')
	<div class="row">
		<div class="col-lg-9">
			<div class="thumbnail" style="padding: 10px; width: 600px">
				<div id="m3_ex2_workspace">
					<div id="m3_ex2_exercise">
						{{ HTML::image('public/assets/img/module3/section2/rack.png', 'rack.png', array('width'=>'575', 'height'=>'400')) }}


						<div id="m3_ex2_blank_1" class="m3_ex2_fill" data-index="0" style="position: absolute; top: 252; left: 122">
							<div id="m3_ex2_wrap_1" class="text_wrap" style="width: 25; height: 80"></div>
							<img id="m3_ex2_1" class="m3_ex2_img">
						</div>
						<div id="m3_ex2_blank_2" class="m3_ex2_fill" data-index="1" style="position: absolute; top: 253; left: 186">
							<div id="m3_ex2_wrap_2" class="text_wrap" style="width: 40; height: 80"></div>
							<img id="m3_ex2_2" class="m3_ex2_img">
						</div>
						<div id="m3_ex2_blank_3" class="m3_ex2_fill" data-index="2" style="position: absolute; top: 191; left: 281">
							<div id="m3_ex2_wrap_3" class="text_wrap" style="width: 25; height: 135"></div>
							<img id="m3_ex2_3" class="m3_ex2_img">
						</div>
						<div id="m3_ex2_blank_4" class="m3_ex2_fill" data-index="3" style="position: absolute; top: 192; left: 349">
							<div id="m3_ex2_wrap_4" class="text_wrap" style="width: 25; height: 135"></div>
							<img id="m3_ex2_4" class="m3_ex2_img">
						</div>
						<div id="m3_ex2_blank_5" class="m3_ex2_fill" data-index="4" style="position: absolute; top: 193; left: 415">
							<div id="m3_ex2_wrap_5" class="text_wrap" style="width: 25; height: 135"></div>
							<img id="m3_ex2_5" class="m3_ex2_img">
						</div>
						<div id="m3_ex2_blank_6" class="m3_ex2_fill" data-index="5" style="position: absolute; top: 193; left: 484">
							<div id="m3_ex2_wrap_6" class="text_wrap" style="width: 25; height: 135"></div>
							<img id="m3_ex2_6" class="m3_ex2_img">
						</div>
						<div id="m3_ex2_blank_7" class="m3_ex2_fill" data-index="6" style="position: absolute; top: 193; left: 554">
							<div id="m3_ex2_wrap_7" class="text_wrap" style="width: 25; height: 135"></div>
							<img id="m3_ex2_7" class="m3_ex2_img">
						</div>

					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-3">
			<div class='thumbnail'>
				<div id="m3_ex2_partlist">
					<h3>Components</h3>

					<ul style="list-style-type: none; padding: 0">
						<li class="m3_ex2_part" data-part="1">
							<div>
								{{ HTML::image('public/assets/img/module3/section2/IO_iso.png', 'IO_iso.png', array('width'=>'50', 'height'=>'75')) }}

							</div>
						</li>
						<li class="m3_ex2_part" data-part="2">
							<div>
								{{ HTML::image('public/assets/img/module3/section2/power_iso.png', 'power_iso.png', array('width'=>'50', 'height'=>'75')) }}

							</div>
						</li>
						<li class="m3_ex2_part" data-part="3">
							<div>
								{{ HTML::image('public/assets/img/module3/section2/CPU_iso.png', 'rack.png', array('width'=>'50', 'height'=>'75')) }}

							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	@stop

@section('submit-class')
m3_ex2_submit
@stop

	@section('additional_script')
	<script>
/**
 * Created by Bochao on 2014/6/25.
 */
 var m3_ex2_answer = [2,3,1,1,1,1,1];
 var m3_ex2_result = [];
 var wrong_answer = [];


 $(".text_wrap").hide();

 $(".m3_ex2_part").draggable({
 	opacity: 0.7,
 	helper: "clone",
     cursorAt:{
        top: 20,
        left: 10},
 	start: function( event, ui ) {
 		$(".text_wrap").show();
 	},
 	stop: function( event, ui ) {
 		$(".text_wrap").hide();
 	}
 });

 $(".m3_ex2_fill").droppable({
 	accept: ".m3_ex2_part",
 	hoverClass: "m3_ex2_hover",
 	tolerance: "pointer",
 	drop: function(event, ui){
 		var item = ui.draggable.data("part");
 		var add_part = $(this).children("img");
 		var index = $(this).data("index");
 		var value = ui.draggable.data("part");

 		switch  (item){
 			case 1:
 			add_part.css({
 				height: $(this).css("height"), width: $(this).css("width")
 			});
 			add_part.attr("src", "/public/assets/img/module3/section2/IO_front.png");
 			break;
 			case 2:
 			add_part.css({
 				height: $(this).css("height"), width: $(this).css("width")
 			});
 			add_part.attr("src", "/public/assets/img/module3/section2/power_front.png");
 			break;
 			case 3:
 			add_part.css({
 				height: $(this).css("height"), width: $(this).css("width")
 			});
 			add_part.attr("src", "/public/assets/img/module3/section2/CPU_front.png");
 			break;
 			default:
 			break;
 		};

 		m3_ex2_result[index] = value;
 		$(this).children(".m3_ex2_img").removeClass('text_wrong');
 	}
 });

$(".m3_ex2_submit").button().click(
	function () {
		wrong_answer = [];
		var result = 1;
		for(var i=0; i<m3_ex2_answer.length; i++){
			if(m3_ex2_result[i]!=m3_ex2_answer[i]){
				result = 0;
				wrong_answer.push(i);
			}
		}

        submit_post(result);
        $("#continue").show();
//		if(result==1){
//			var result_dialog = $("<div></div>");
//			var result_content = $("<p></p>");
//			result_content.html("Correct!!");
//			result_dialog.append(result_content);
//			result_dialog.dialog({
//				show: {
//					effect: "bounce",
//					duration: 1000
//				},
//				hide: function(){
//					$(this).dialog("destroy");
//				}
//			});
//		}
//		else{
//			var result_dialog = $("<div></div>");
//			var result_content = $("<p></p>");
//			result_content.html("Incorrect!! Please check your answer");
//			result_dialog.append(result_content);
//			result_dialog.dialog({
//				show: {
//					effect: "shake",
//					duration: 1000
//				},
//				hide: function(){
//					$(this).dialog("destroy");
//				}
//			});
//		}

		for(var k = 0; k<m3_ex2_answer.length; k++) {
			var wrap_name = "#m3_ex2_" + (k + 1).toString();
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