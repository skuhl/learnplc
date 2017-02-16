

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Leaky Inputs and Outputs')

@section('section-menu')
@include('module.module10.menu')
@stop

@section('lesson')
<div class="lesson-title">Grounding, Voltage Variations and Surges</div>
<div class="lesson-statement">
	<div class="subsection">
        <h4>1. Grounding</h4>
		<p>
            &nbsp &nbsp &nbsp Grounding is a vital aspect of any system. When the system is properly grounded,
            there is a low impedance path to earth ground. The PLC’s enclosure, CPU, I/O chassis,
            and power supplies are all connected to a common earth ground, with only one point of reference for each.
            This means that each component should only connect to the earth ground at a single point.
            When more than one point of reference to ground is introduced, ground loops can be created.
            These ground loop introduce and/or subtract from the normal current flow and can disrupt sensors and other equipment.
            It is important that when wiring field devices to the PLC that only one end of the wire (PLC or field side)
            is grounded to prevent these ground loops. Another preventative measure against ground
            loops is the use of a single grounding bus within your system.
            This grounding bus consists of all of the components connecting their ground to it and only having one path to actual earth ground.<br><br>

            &nbsp &nbsp &nbsp Any grounding needs to be connected with a physical screw or bolt, no solder.
            This is because if a high fault current is present, the solder could melt and disrupt the path to earth ground resulting in destruction of equipment.<br><br>
        </p>

        <h4>2. Voltage Variations and Surges</h4>
        <p>
            &nbsp &nbsp &nbsp While the power supplies of the PLC systems are designed to allow for subtle voltage fluctuation while
            maintaining standard operation, large variations and surges can cause catastrophic system failure.
            The solution is to isolate the PLC power supply from the main source of power and allow for constant voltage
            by using a constant voltage transformer as well as an Isolation transformer.
            These transformers will allow for surge dissipation before the voltage spike is able to harm the PLC system.<br><br>

            &nbsp &nbsp &nbsp When working with devices which introduce large voltage or current spikes such as solenoids and motor starters connected to an output module,
            it is recommend to include an external suppression circuit in parallel with the load.
            Two of these circuits include the RC snubber circuit, which decreases the rate of the transient voltage and a reversed-biased diode circuit,
            which allows a path for voltage in the opposite of normal direction.<br><br>

            &nbsp &nbsp &nbsp The most common form of surge suppression is the metal oxide varistor.
            This device simply acts as a door for current spikes. When the force is great enough in either direction (the voltage),
            the door opens and allows the force to bypass the circuit, eliminating the potential damage.<br><br>

        </p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 3</div>
<div class="lesson-statement">
	<p>
		Correctly answer the following true or fase question, after it is submitted, press 'Continue'.
	</p>
</div>
@stop

@section('exercise')
<div class = "row">
	<div class = "col-lg-9">
		<div class = "thumbnail" style = "padding: 10 px; width: 600px">
			<div id = "m10_ex3_workspace">
				<p id = "question1">Large voltage variations and power surges do not cause damage to PLC systems.</p> 
				<div class="caption">
						<input type="hidden" name="crypt1" value="1">
						<input class="radio" type="hidden" name="question1" value="99999">
						<div class="btn-group btn-group-justified">
						  <div class="btn-group">
						    <button type="button" class="btn btn-primary btn-radio" value="0">False</button>
						  </div>
						  <div class="btn-group">
						    <button type="button" class="btn btn-primary btn-radio" value="1">True</button>
						  </div>
						</div>
						

					</div>
				
			</div>
		</div>
	</div>
</div>
@stop

@section('submit-class')
m10_ex3_submit
@stop

@section('additional_script')
<script>
var answer = 1;
    $(document).ready(function() {
        $('.radio').val('9999');
    });

    $(".m10_ex3_submit").click(
            function(){
            	var solution = 0;
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