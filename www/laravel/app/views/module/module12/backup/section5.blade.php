<style>
	#m12_ex5_workspace {
		/*font: 62.5% "Trebuchet MS", sans-serif;*/
	
	}

	#m12_ex5_namelist {
		width: 170px;
	}

	.m12_ex5_name {
		margin: 4px;
		padding: 3px;
		width: 200px;
	}

	#m12_ex5_namelist .ui-accordion-content {
		padding: 0px;
	}

	.m12_ex5_name_text {
		padding: 3px;
		margin: 1px;
		text-align: center;
		background-color: #3498db;
	}

	.m12_ex5_fill {
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

@section('title','Water Tower') 

@section('section-menu')
@include('module.module12.menu') 
@stop 

@section('lesson')
<div class="lesson-title">Water Tower</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>Water Tower Purpose</h3>
		<p>The water tower helps maintain system pressure through the use of gravity.
		Water is pumped up to the top of the tower and the weight of the water creates
		a pressure. The amount of pressure if based on the height of the water. If the 
		water height is too low, the system may lose its pressure.</p>
	</div>
	<div class="subsection">
		<h3>Water Tower parts</h3>
		<p> 
			<ol>
				<li> Inflow Valve:<br/> Open/close valve for water going into the tower</li>
				<li> Tower Pump:<br/> Pushes water up to the tower</li>
				<li> Inflow Sensor:<br/> Measures water GPM going into the tower</li>
				<li> Outflow Pressure and Sensor:<br/> Measures PSI at the bottom of the tower and the GPm leaving the tower</li>
				<li> Outflow Valve:<br/> Open/close valve for water leaving the tower</li>
				<li> Tank Sensor:<br/> Measures water level in feet</li>		
			</ol>
		</p>
		<p>
		{{ HTML::image('public/assets/img/module12/section5_diagram1.png','section5_diagram1', array('width'=>'437', 'height'=>'597')) }}
		</p>
	</div>
	<div class = "subsection">
		<h3>Tower Water Pressure</h3>
		<p>The water main's pressure can be determined manually if the water level is known.
		The pressure will be the level divided by two. Conversely, if the main water pressure is known,
		the water level can be found manually as well. It is the main water pressure multiplied by two.
		</p>
		<p>
		{{ HTML::image('public/assets/img/module12/section5_diagram2.png','section5_diagram2', array('width'=>'437', 'height'=>'189')) }}
		</p>
		<p><i>
		Example:<br/>
		If the water level is 200 feet, 200 / 2 = 100, thus the main water pressure is 100 PSI.<br/>
		If the main water pressure is 70 PSI, 70 x 2 = 140, thus the water level is at 140 feet.
		</i>
		</p>
	</div>
</div>
@stop 
@section('instructions')
<div class="lesson-title">Exercise 5</div>
<div class="lesson-statement">
	<p>Choose the correct answer to the multiple choice question to the right.
	Then press 'Continue'.</p>
</div>
@stop 
</div>
@stop 
@section('exercise')
<div class = "row">
	<div class = "col-lg-9">
		<div class = "thumbnail" style = "padding: 10 px; width: 600px">
			<div id = "m12_ex5_workspace">
				<div id = "question1">
					<p>
					Assume that the water tower's main pressure has a required minimum of 78 PSI.<br/>
					What is the minimum level required for the required water pressure?
					<br/>
						<ol style = "list-style-type: upper-alpha">
							<li> 200 feet</li><br/>
							<li> 39 feet</li><br/>
							<li> 156 feet</li><br/>
							<li> 78 feet</li><br/>
						</ol>
					</p> 
					<div class="caption">
						<input type="hidden" name="crypt1" value="1">
						<input class="radio" type="hidden" name="question1" value="99999">
						<div class="btn-group btn-group-justified">
							<div class="btn-group">
						    	<button type="button" class="btn btn-primary btn-radio" value="0">A</button>
							</div>
							<div class="btn-group">
						    	<button type="button" class="btn btn-primary btn-radio" value="1">B</button>
							</div>
							<div class="btn-group">
						    	<button type="button" class="btn btn-primary btn-radio" value="2">C</button>
							</div>
							<div class="btn-group">
						    	<button type="button" class="btn btn-primary btn-radio" value="3">D</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('submit-class')
m12_ex5_submit
@stop

@section('additional_script')
<script>
var answer = 0;

$(document).ready(function() {
	$('.radio').val('9999');
});

$('.btn-radio').click(function() {
	$(this).parent().siblings().children().removeClass('active');
	$(this).addClass('active');
	answer = $(this).attr('value');
	$(this).parent().parent().siblings('.radio').val($(this).attr('value'));
});
$(".m12_ex5_submit").button().click(
		function () {
			var solution = 2;
			if(solution == answer){
				submit_post(1);
			}
			else{
				submit_post(0);
			}
		});
</script>
@stop