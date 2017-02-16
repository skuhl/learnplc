

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Preventative Maintenance')

@section('section-menu')
    @include('module.module10.menu')
@stop

@section('lesson')
    <div class="lesson-title">Preventative Maintenance</div>
    <div class="lesson-statement">
        <div class="subsection">
            <p>
                &nbsp &nbsp &nbsp With all of the talk about PLC failure, it is known that the best way to combat failure is to perform the necessary preventative maintenance.
                Just like a car engine that needs new oil, air filters, transmission fluid, and other components routinely replaced,
                there are routines that can be performed on PLC systems when operation is shut down to keep things running optimally. These tasks include:<br><br>

                &nbsp &nbsp &nbsp <b>•</b>	Replacing enclosure filters to maximize air flow.<br>
                &nbsp &nbsp &nbsp <b>•</b>	Cleaning dust and dirt on the PLC itself.<br>
                &nbsp &nbsp &nbsp <b>•</b>	Ensure security of I/O connections.<br>
                &nbsp &nbsp &nbsp <b>•</b>	Calibrate all field devices as necessary.<br>
                &nbsp &nbsp &nbsp <b>•</b>	Check backup battery to ensure RAM will not be lost in the event of a power outage.<br>
                &nbsp &nbsp &nbsp <b>•</b>	Stock commonly needed parts.<br>
                &nbsp &nbsp &nbsp <b>•</b>	Keep a master copy of all programs within a facility.<br><br>

            </p>
        </div>
    </div>
@stop

@section('instructions')
    <div class="lesson-title">Exercise 6</div>
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
                <div id = "m10_ex6_workspace">
                    <div id = "question1">
					<p>
						What is the best way to combat PLC failure?
					</p> 
					<ol style = "list-style-type: upper-alpha">
					<li> Do nothing, all PLC's will fail at one point</li>
					<li> Replace the entire PLC</li>
					<li> Perform preventative maintenance while the system is shut down</li>
					<li> Perform preventative maintenance while the system is running</li>
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
    m10_ex6_submit
@stop

@section('additional_script')
    <script>
    var answer = 0;
        $(document).ready(function() {
            $('.radio').val('9999');
        });

        $(".m10_ex6_submit").click(
                function(){
                	var solution = 2;
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