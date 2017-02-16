<style>
	#m5_ex1_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','SCADA')

@section('section-menu')
@include('module.module11.menu')
@stop

@section('lesson')
<div class="lesson-title">SCADA</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>What is SCADA?</h3>
		<p style = "text-indent: 1.5em">
			Supervisory Control and Data Acquisition, SCADA, receive data from PLCs and processes and organizes
			the data to generate reports, view trends, or send commands back to the controller. SCADA can also 
			sync various data streams togeter allowing the user to view how various inputs interact with each 
			other.
		</p>
		<p>
			<i>NOTE: SCADA is simply software that is installed above the hardware control level of an 
			industrial network hierarchy. This means that the SCADA system does not directly provide control 
			to the system but acts in a supervisory fashion. High level commands are sent to the control 
			hardware, instructing the controller to start a process or change a setpoint.</i>
		</p>
		<br/>
		<h3>SCADA and HMIs</h3>
		<p style = "text-indent: 1.5em">
			In a control system with SCADA installed, various PLCs control I/O control functions on fields 
			devices. These control functions supervised by the SCADA package installed on a centralized 
			HMI, typically a computer. An operator utilizes the HMI/SCADA package to monitor the PLC 
			operation and alters the control parameters as needed based on data supplied by the 
			SCADA package.
		</p>
		<br/>
		<h3>SCADA with Large Systems</h3>
		<p style = "text-indent: 1.5em">
			When processes become more complex and larger in scale the amount of PLCs along with 
			the distance of the communication network increase. In these larger systems the SCADA 
			software does not directly connect to the PLCs controlling field I/O. The data passes 
			through specialized PLCs known as Remote Terminal Units, RTU, and Master Terminal Units, 
			MTU. These units combined with communication distances can cause bandwidth issues when 
			transmitting data. To overcome some of these issues data may be sent using an event 
			driven method opposed to a process driven method. Process driven methods allow a 
			continuous stream of data, typically analog, to be sent to the SCADA software package. 
			Event driven methods send digital binary values during predefined events.
		</p>
		<p>
			<i>NOTE: Due to SCADA being software based, the system is heavily affected by Information 
			Technology standards including operating system and hardware standards. Due to the nature 
			of the Information Technology rapidly changing world, SCADA systems can become obsolete 
			relatively quickly. This can create issues as control hardware like PLCs do not evolve 
			as quickly as computer. This creates a significant difference in the life cycle of 
			SCADA and the PLC.</i>
		</p>
	</div>

</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 3</div>
<div class="lesson-statement">
	<p>
		Select the answer with the correct set of SCADA attributes to the right and once submitted, press 'Continue'.
	</p>
</div>
@stop

@section('exercise')
<div class = "row">
	<div class = "col-lg-9">
		<div class = "thumbnail" style = "padding: 10 px; width: 600px">
			<div id = "m11_ex3_workspace">
				<div id = "question1">
					<p>
						<ol style = "list-style-type: upper-alpha">
							<li> Supervisory Control and Data Acquisition<br/> Uses HMIs<br/> Large systems are event driven</li><br/>
							<li> Supervisory Control and Data Acquisition<br/> Does not use HMIs<br/> Large systems are event driven</li><br/>
							<li> Supervisory Control and Data Acquisition<br/> Uses HMIs<br/> Large systems are process driven</li><br/>
							<li> Supervisory Control and Data Acquisition<br/> Does not use HMIs<br/> SCADA cannot be used in a large system</li><br/>
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
m11_ex3_submit
@stop

@section('additional_script')
<script>
var answer = 3;

$(document).ready(function() {
	$('.radio').val('9999');
});

$('.btn-radio').click(function() {
	$(this).parent().siblings().children().removeClass('active');
	$(this).addClass('active');
	answer = $(this).attr('value');
	$(this).parent().parent().siblings('.radio').val($(this).attr('value'));
});
$(".m11_ex3_submit").button().click(
		function () {
			var solution = 0;
			if(solution == answer){
				submit_post(1);
			}
			else{
				submit_post(0);
			}
		});
</script>
@stop