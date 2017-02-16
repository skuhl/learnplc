<style>
	#m12_ex3_workspace {
		/*font: 62.5% "Trebuchet MS", sans-serif;*/
	
	}

	#m12_ex3_namelist {
		width: 170px;
	}

	.m12_ex3_name {
		margin: 4px;
		padding: 3px;
		width: 200px;
	}

	#m12_ex3_namelist .ui-accordion-content {
		padding: 0px;
	}

	.m12_ex3_name_text {
		padding: 3px;
		margin: 1px;
		text-align: center;
		background-color: #3498db;
	}

	.m12_ex3_fill {
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

@section('title','Filter Tank') 

@section('section-menu')
@include('module.module12.menu') 
@stop 

@section('lesson')
<div class="lesson-title">Filter Tank</div>
<div class="lesson-statement">
	<div class="subsection">
		<h3>Filter Tank Purpose</h3>
		<p>The filter tank is responsible for cleaning the water pumped
		through it and then delivering the clean water to the water main. It
		accomplishes this by pumping water through a multilayered filter that
		removes sediment and particles. Many pumps, valves, and gauges are
		required for this process to be successful.</p>
	</div>
	<div class="subsection">
		<h3>Filter Tank Parts</h3>
		<p>
			<ol>
				<li>Inflow Pump:<br />
				Pumps water into the filter tank</li>
				<li>Inflow Valve:<br />
				Open or closes the inflow</li>
				<li>Inflow Meter:<br/>
				Measures inflow water GPM</li>
				<li>Inflow Pressure Gauge:<br />
				Measures pressure of inflow</li>
				<li>Dirty Water Drain Valve:<br />
				Opens or closes dirty water drain</li>
				<li>Dirty Water Drain:<br />
				Drain for the dirty water from the backwash</li>
				<li>Wash Trough:<br />
				Collects dirty backwash water and delivers it to the dirty water drain</li>
				<li>Analog Pressure Gauge:<br />
				Measures filter water level</li>
				<li>Surface Wash Valve:<br />
				Opens or closes surface wash line</li>
				<li>Surface Wash Pump:<br />
				Powers surface wash</li>
				<li>Outflow Valve:<br />
				Opens or closes outflow line</li>
				<li>Outflow Pressure Gauge:<br />
				Measures pressure of outflow</li>
				<li>Backwash Pump:<br />
				Pumps water into and out of filter tank</li>
				<li>Outflow Meter:<br />
				Measures outflow water GPM</li>
				<li>Filter Medium:<br />
				A substance, usually sand, to filter the water</li>
			</ol>
		</p>
		<p>
		{{ HTML::image('public/assets/img/module12/section3_diagram.png','section3_diagram', array('width'=>'600', 'height'=>'400')) }}
		</p>
		<p>
		A working pump should read with a gallons per minute intake of 10 to
		10,000 GPM and a water pressure between 50 and 100 PSI.<br />
		However, the system will lose pressure if the filter medium becomes
		clogged. If that is the case, a backwash-discussed in the next
		section-will be performed.
		</p>
	</div>
	<div class = "subsection">
		<h3>Filter Tank Operation </h3> 
		<p>
		In order to operate the filter tank, follow the <b>four</b> steps below.<br/>
			<ol>
				<li> Check that all valves are closed and all pumps are off</li>
				<li> Open the outflow valve</li>
				<li> Open the inflow valve</li>
				<li> Turn on the inflow pump</li>
			</ol>
		</p>
		<p>
		In order to turn off the filter tank, the <b>four</b> steps are the same, but reversed.<br/>
			<ol>
				<li> Turn off the inflow pump</li>
				<li> Close the inflow valve</li>
				<li> Close the outflow valve</li>
				<li> Check that all valves are closed and all pumps are off</li>
			</ol>		
		
		</p>
	</div>
</div>
@stop 
@section('instructions')
<div class="lesson-title">Exercise 3</div>
<div class="lesson-statement">
	<p>Choose the correct order for the steps to operate the filter tank
		and then press 'Continue'.</p>
</div>
@stop 
@section('exercise')
<div class = "row">
	<div class = "col-lg-9">
		<div class = "thumbnail" style = "padding: 10 px; width: 600px">
			<div id = "m12_ex3_workspace">
				<div id = "question1">
					<p>
						<ol style = "list-style-type: upper-alpha">
							<li> Check that all valves are closed and all pumps are off<br/> Open the inflow valve<br/> Open the outflow valve<br/> Turn on the inflow pump</li><br/>
							<li> Check that all valves are closed and all pumps are off<br/> Open the outflow valve<br/> Open the inflow valve<br/> Turn on the inflow pump</li><br/>
							<li> Open the inflow valve<br/> Check that all valves are closed and all pumps are off<br/> Turn on the inflow pump<br/> Open the outflow valve</li><br/>
							<li> Check that all valves are closed and all pumps are off<br/> Open the outflow valve<br/> Turn on the inflow pump<br/> Open the inflow valve</li><br/>
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
m12_ex3_submit
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
$(".m12_ex3_submit").button().click(
		function () {
			var solution = 1;
			if(solution == answer){
				submit_post(1);
			}
			else{
				submit_post(0);
			}
		});
</script>
@stop