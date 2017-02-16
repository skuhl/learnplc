<style>
	#m5_ex1_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Introduction to SCADA')

@section('section-menu')
@include('module.module11.menu')
@stop

@section('lesson')
<div class="lesson-title">Introduction to SCADA</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
			In this module we will study what SCADA software is, why it is needed, and how it interacts with
			HMIs and other networks.
		</p>
		<br/>
		<p>
			In today's automated industrial processes, simply controlling the process is not enough. 
			Data collection and management is critical to process control. It provides the user with 
			critical information that can improve reliability and efficiency of the process. 
			
		</p>
		<br/>
		<p>
			To do this, programmable logic controllers, PLCs, have basic data collection and report generating capabilities;
			however, there is a better option for data collection: Supervisory Control and Data Acquisition, SCADA. 
		</p>
		<br/>
		<p>
			When used in combination with PLCs, HMIs, and communication networks, SCADA software simplifies
			how process data is collected, managed, and displayed.
		</p>
	</div>

</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 1</div>
<div class="lesson-statement">
	<p>
		Read the list of subjects to the right and then press 'Continue'
	</p>
</div>
@stop

@section('exercise')
<div class = "thumbnail" style = "padding: 100 px; width: 900px">
	<div id = "m11_ex1_workspace">
		<h2 style = "text-align: center">Subjects Covered in Module 11</h2><br/><br/>
		<ul style = "list-style-position: inside; text-indent: 100px; font-size: 20">
			<li> Human Machine Interface (<b>HMI</b>)</li><br/>
			<li> Supervisory Control and Data Acquisition (<b>SCADA</b>)</li><br/>
			<li> Data Communication</li><br/>
			<li> Networking Schemes</li> 
			<ul style = "list-style-position: inside; text-indent: 100px; font-size: 18">
				<li><i>Data Highway</i></li>
				<li><i>Serial Communication</i></li>
				<li><i>DeviceNet</i></li>
				<li><i>ControlNet</i></li>
				<li><i>EtherNet/IP</i></li>
				<li><i>Modbus</i></li>
				<li><i>Fieldbus</i></li>
				<li><i>Profibus-DP</i></li>
			</ul>
		</ul>				
	</div>
</div>
@stop

@include('module.only_continue_fix')