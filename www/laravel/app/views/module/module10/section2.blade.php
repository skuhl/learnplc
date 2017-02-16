

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Electrical Noise')

@section('section-menu')
@include('module.module10.menu')
@stop

@section('lesson')
<div class="lesson-title"> Electrical Noise & Leaky Inputs and Outputs</div>
<div class="lesson-statement">
	<div class="subsection">
        <h4>1. Electrical Noise</h4>
		<p>
            &nbsp &nbsp &nbsp PLCs utilize electrical AC signals for their analog inputs and outputs as well as other communications.
            These signals are susceptible to electromagnetic interference (EMI) from outside sources within the same environment as the PLC system.
            A noisy system is bound to fail in both providing accurate signals as well as safety. This interference, whether conducted or radiated,
            can stem from other equipment within a facility that also use AC power and therefore can emit electromagnetic waves.<br>

            &nbsp &nbsp &nbsp The interference usually occurs at the inputs, outputs, and power line wiring.
            In order to combat this issue it is vital that when installing a PLC system one makes sure they:<br><br>

            <ol style = "list-style-type: disk">
            <li> Properly ground the system<br></li>
            <li> Do Not run signal wires and power wires together in the same tray/conduit<br></li>
            <li> Use the shortest possible wire run lengths for I/O points<br></li>
            <li> Use conduit to shield conductors<br></li>
            <li> Do Not run AC and DC signal wires together in the same conduit or cable trays<br></li>
            <li> Properly shield field devices and their signal wires<br></li>
            <li> Install the proper Noise-Suppression equipment if necessary<br><br></li>
            </ol>

            &nbsp &nbsp &nbsp Following these guidelines will help minimize any EMI in your system. The result is a more robust and safe PLC system.<br><br>
        </p>

        <h4>2. Leaky Inputs and Outputs</h4>
        <p>
            &nbsp &nbsp &nbsp Another important topic to be aware of when installing a PLC system is leakage current.
            Leakage current is a small current that is present in devices with transistors or trial outputs when they device is off.
            This is due to the fact that the device is still powered despite it being â€œin an off stateâ€�.
            This leakage current can be great enough to provide a false True signal to the PLC, which can result in process errors as well as safety concerns.<br><br>

            &nbsp &nbsp &nbsp In order to combat this issue, a bleeder resistor can be used in paroles with the component providing
            the leakage current for an output device and between the PLC input and common for an input device.
            This will dissipate the power that is leaking while minimizing the current that the PLC sees.<br><br>

        </p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 2</div>
<div class="lesson-statement">
	<p>
		Select the correct answer and once submitted, press 'Continue'.
	</p>
</div>
@stop

@section('exercise')
<div class = "row">
	<div class = "col-lg-9">
		<div class = "thumbnail" style = "padding: 10 px; width: 600px">
			<div id = "m10_ex2_workspace">
				<div id = "question1">
					<p>
						Where does electrical noise interference occur?
					</p> 
					<ol style = "list-style-type: upper-alpha">
					<li> Inputs and outputs</li>
					<li> Inputs and power line wiring</li>
					<li> Outputs</li>
					<li> Inputs, outputs, and power line wiring</li>
					</ol>
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
m10_ex2_submit
@stop

@section('additional_script')
<script>
var answer = 0;
    $(document).ready(function() {
        $('.radio').val('9999');
    });

    $(".m10_ex2_submit").click(
            function(){
            	var solution = 3;
    			if(solution == answer){
    				submit_post(1);
    			}
    			else{
    				submit_post(0);
    			}
            });



    $('.btn-radio').click(function() {
        $(this).parent().siblings().children().removeClass('active');
        $(this).addClass('active');
        answer = $(this).attr('value');
        $(this).parent().siblings('input').val($(this).attr('value'));
    });

</script>
@stop