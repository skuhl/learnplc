

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Editing: Program Editing and Commissioning')

@section('section-menu')
@include('module.module10.menu')
@stop

@section('lesson')
<div class="lesson-title">Program Editing and Commissioning</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
            &nbsp &nbsp &nbsp While a program may be considered completed when the system is installed,
            it may need some changes. This requires a programmer to edit the program in the field and is simply done in a windows-based computer fashion.
            Simple point and click commands allow the programmer to edit rungs, delete rungs, edit instructions, and other functions.<br><br>

            &nbsp &nbsp &nbsp When the program is to be started up, or commissioned, it is vital that some precasions are followed to avoid any equipment damage and/or injury.
            Genrally, the steps of commissioning a system are:<br><br>

            &nbsp &nbsp &nbsp <b>•</b>	Disconnect or isolate any output device that could potentially cause harm to anyone or any other piece of equipment.<br>
            &nbsp &nbsp &nbsp <b>•</b>	Apply and measure power to the PLC and other field devices.<br>
            &nbsp &nbsp &nbsp <b>•</b>	Examine the PLC’s indication lights to check for potential faults in wiring or power.<br>
            &nbsp &nbsp &nbsp <b>•</b>	Determine that you have a communication connection between the PLC and the programming device.<br>
            &nbsp &nbsp &nbsp <b>•</b>	Put the PLC in either disable, continuous test, or single-scan mode. This will allow you monitor your inputs without energizing the outputs.<br>
            &nbsp &nbsp &nbsp <b>•</b>	Check the input status lights while manually activating each input to verify the wiring and functionality of the PLC.<br>
            &nbsp &nbsp &nbsp <b>•</b>	Manually power each output to test its functionality.<br>
            &nbsp &nbsp &nbsp <b>•</b>	Verify all preset values for counters, timers, and any other function that relies on a preset value.<br>
            &nbsp &nbsp &nbsp <b>•</b>	Reconnect all output devices and place PLC in the RUN mode.<br>
            &nbsp &nbsp &nbsp <b>•</b>	Test all E-Stops to ensure functionality.<br><br>

		</p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 4</div>
<div class="lesson-statement">
	<p>
		Correctly answer the following multiple choice question and then press 'Continue'.
	</p>
</div>
@stop

@section('exercise')
<div class = "row">
	<div class = "col-lg-9">
		<div class = "thumbnail" style = "padding: 10 px; width: 600px">
			<div id = "m10_ex4_workspace">
				<p id = "question1">Which of the following is NOT a step in the commissioning system?<br>
				<ol style = "list-style-type: upper-alpha">
				<li> Examine the PLC's indication lights to check for potential faults in wiring or power</li>
				<li> Determine that all connections to the PLC are offline, including communications</li>
				<li> Put the PLC in either disable, continuous test, or single-scan mode</li>
				<li> Test all E-Stops to ensure functionality</li>
				</ol></p> 
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
@stop

@section('submit-class')
m10_ex4_submit
@stop

@section('additional_script')
<script>
var answer = 0;
    $(document).ready(function() {
        $('.radio').val('9999');
    });

    $(".m10_ex4_submit").click(
            function(){
            	var solution = 1;
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