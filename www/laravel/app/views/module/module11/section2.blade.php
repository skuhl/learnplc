<style>
	#m5_ex1_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Human Machine Interfaces')

@section('section-menu')
@include('module.module11.menu')
@stop

@section('lesson')
<div class="lesson-title">Human Machine Interfaces</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>What are HMIs?</h3>
		<p style = "text-indent: 1.5em">
			Human Machine Interfaces, called HMIs, allow the user to directly control and view data for a process.
			This interaction allows the user to control, monitor, manage, and finally troubleshoot an automatic process.
			Operations can be as simple as starting or stopping a process and making adjustments to it, to detecting 
			faults or quality issues. HMIs also come packaged with all the necessary hardware, software, and 
			communications to communicate with a PLC.
		</p>
		<br/>
		<h3>Old HMIs vs. New HMIs</h3>
		<p style = "text-indent: 1.5em">
			Older HMIs have simple LCD or LED displays similar to that of a calculator or digital clock and 
			may only have a few buttons. New, modern HMIs often use touchscreens interfaces and a combination 
			of buttons, soft keys, and graphical representations to allow the user to navigate the system.
		</p>
		<br/>
		<h3>HMI Tasks</h3>
		<p style = "text-indent: 1.5em">
			HMIs utilize multiple screens that the user can navigate through to perform a multitude of tasks.
			<ul>
				<li> Operational Summary: Allow the user to monitor the process</li>
				<li> Configuration/Setup: Allow the user to view and adjust process parameters</li>
				<li> Alarm Summary: Shows active faults that have occurred in the process</li>
				<li> Event History: Shows the past faults</li>
				<li> Trend Value: Provide the user with process variable data over a period of time</li>
				<li> Manual Control: Allow the user to bypass certain process controls to manually 
				operate a portion of the process</li>
				<li> Diagnostics: Allow maintenance personnel to troubleshoot failure and 
				pinpoint problems</li>
			</ul>
		</p>
	</div>

</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 2</div>
<div class="lesson-statement">
	<p>
		Select the answer with the correct set of HMI attributes to the right and once submitted, press 'Continue'.
	</p>
</div>
@stop

@section('exercise')
<div class = "row">
	<div class = "col-lg-9">
		<div class = "thumbnail" style = "padding: 10 px; width: 600px">
			<div id = "m11_ex2_workspace">
				<div id = "question1">
					<p>
						<ol style = "list-style-type: upper-alpha">
							<li> Human Machine Interactions<br/> New models only use LCDs<br/> 7 types of screens</li><br/>
							<li> Human Machine Interfaces<br/> New models only use LCDs<br/> 7 types of screens</li><br/>
							<li> Human Machine Interfaces<br/> Old models only use LCDs or LEDs<br/> 7 types of screens</li><br/>
							<li> Human Machine Interactions<br/> Old models only use LCDs or LEDs<br/> 7 types of screens</li><br/>
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
m11_ex2_submit
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
$(".m11_ex2_submit").button().click(
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