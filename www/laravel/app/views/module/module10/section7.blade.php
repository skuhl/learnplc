
@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Troubleshooting')

@section('section-menu')
    @include('module.module10.menu')
@stop

@section('lesson')
    <div class="lesson-title">Troubleshooting</div>
    <div class="lesson-statement">
        <div class="subsection">
            <p>
                &nbsp &nbsp &nbsp When the PLC does fault, it is important to know how to go about figuring out what is the issue.
                PLCs offer a luxury in troubleshooting as they provide means for viewing the status of its inputs and
                outputs on a screen as well as visually being able to see the program.
                When a fault occurs the first question that should be asked is if the system has been running or if it is a new system.
                If it is a new system, the program may contain some bugs causing the fault.
                If the system has been running for a while, however, it is likely that the problem stems from another cause such as the processor module,
                an I/O module, wiring, or faulty field device.<br><br>

                &nbsp &nbsp &nbsp In order to check the processor, there are indication lights that will tell you if the fault is present within the processor.
                These lights and their conditions are as follows:<br><br>

                &nbsp &nbsp &nbsp <b>•	RUN (Green)</b><br>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp o	Steady on means the processor is in RUN mode<br>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp o	Flashing means that a program is being transferred from RAM to the memory module<br>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp o	Off indicates that the processor is in another mode other than RUN<br><br>

                &nbsp &nbsp &nbsp <b>•	FLT (Red)</b><br>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp o	Flashing on power-up means the processor hasn’t been configured<br>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp o	Flashing during operation means critical error in process, chassis, or memory<br>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp o	On steady means fatal error<br>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp o	Off means there is no fault present<br><br>

                &nbsp &nbsp &nbsp <b>•	BATT (Red)</b><br>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp o	On steady means the battery is insufficient to power the processor if needed<br>
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp o	Off means the battery is of normal operation<br><br>


                &nbsp &nbsp &nbsp If the processor is running as expected and the outputs are not performing as expected,
                the fault could be in the input and/or output wiring between field devices and the I/O module,
                the field device power, input sensing devices, output actuators, or the actual I/O module(s).
                By comparing the status of the device with what is indicated by the PLC indication lights and program,
                it is relatively easy to narrow down the cause of the fault.
                If you now an input device is ON and the indication light on the module is off,
                it is clear that the fault either resides in the wiring between that input device and the I/O module or the actual I/O module is faulty.
                Like logic can be applied to other applications to determine the fault cause.<br><br>

                &nbsp &nbsp &nbsp When an output does not energize as anticipated, the fault could lie simply in a blown fuse within the output module,
                indicated by the blown fuse indicator on the module. If the fuse is in normal operating status,
                the fault could lie within the field wiring or the program itself.<br><br>

                &nbsp &nbsp &nbsp When the ladder logic program itself becomes the suspected cause for failure,
                it is important to remember that the program most likely isn’t the cause if the system has been previously in operation.
                If it is sure that the program is at fault, reload the master copy onto the processor to see if normal operation resumes.
                If not, check normally open versus normally closed contacts and ensure all addresses are correct.
                Also, forcing bits on and off allow the troubleshooter to see if the program is reacting to the changed state of a bit correctly.
                Be cautious when forcing bits for they can cause malfunctions in the system by powering devices that should not be powered.<br><br>

                &nbsp &nbsp &nbsp As discussed in a previous module,
                temporary end <b>(TND)</b> and suspend <b>(SUS)</b> instructions are invaluable tools when sorting through long ladder logic programs
                to determine that every aspect of the program is running as intended.<br><br>

            </p>
        </div>
    </div>
@stop

@section('instructions')
    <div class="lesson-title">Exercise 7</div>
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
                <div id = "m10_ex7_workspace">
                    <div id = "question1">
					<p>
						What are the three indication lights used to check the processor?
					</p> 
					<ol style = "list-style-type: upper-alpha">
					<li> RUN, FLT, BETT</li>
					<li> RUN, FIT, BATT</li>
					<li> RAN, FLT, BATT</li>
					<li> RUN, FLT, and BATT</li>
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
    m10_ex7_submit
@stop

@section('additional_script')
    <script>
    var answer = 0;
        $(document).ready(function() {
            $('.radio').val('9999');
        });

        $(".m10_ex7_submit").click(
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