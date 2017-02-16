

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Programming and Monitoring')

@section('section-menu')
    @include('module.module10.menu')
@stop

@section('lesson')
    <div class="lesson-title">Programming and Monitoring</div>
    <div class="lesson-statement">
        <div class="subsection">
            <p>
                &nbsp &nbsp &nbsp PLC programming can be done different ways depending on the manufacturer and PLC model.
                The most common method, however, is a personal computer with the corresponding software.
                This can be done both offline and online.<br><br>

                &nbsp &nbsp &nbsp Offline programming allows the programmer to program, edit, and test their ladder logic program separate from the PLC.
                It is then later downloaded and commissioned on the PLC processor.<br><br>

                &nbsp &nbsp &nbsp Online programming, on the contrary, is editing a PLC program while it is running.
                It is very important to note that any edits made will be immediately executed within the process.
                This requires the person who is performing the edits to be well aware of all changes that will occur and
                how it will affect the overall process as any unwanted change could prove catastrophic to the system.
                It is recommended that all changes are done offline if possible.<br><br>

                &nbsp &nbsp &nbsp Along with the programming flexibility, PLCs offer useful monitoring tools that allow the user to visually see what is happening within the system.
                These two tools are data monitoring and cross referencing.<br><br>

                &nbsp &nbsp &nbsp Data monitoring gives access to the data of the PLCs data tables, such as the output,
                input, timer, counter, status, binary, and other tables.
                Viewing these tables can give the user insight on where the data is being stored,
                what data is actually being stored, and if these correspond with what is expected of the system.<br><br>

                &nbsp &nbsp &nbsp The cross reference function allows the user to access each instance in which a particular address is accessed in the PLC program.
                This can allow for easy troubleshooting if an output is being wrongly energized or if data is being overwritten at some point within the program.<br><br>

            </p>
        </div>
    </div>
@stop

@section('instructions')
    <div class="lesson-title">Exercise 5</div>
    <div class="lesson-statement">
        <p>
            Select the answer with the correct set of PLC programming and monitoring attributes to the right and once submitted, press 'Continue'.
        </p>
    </div>
@stop

@section('exercise')
    <div class = "row">
        <div class = "col-lg-9">
            <div class = "thumbnail" style = "padding: 10 px; width: 600px">
                <div id = "m10_ex5_workspace">
                    <div id = "question1">
						<ol style = "list-style-type: upper-alpha">
							<li> Offline programming is rccommended<br/> Data monitoring gives a user insight to where and what data is being stored<br/> Cross reference allows for easy trouble shooting</li><br/>
							<li> Online programming is rccommended<br/> Data monitoring gives a user insight to only what data is being stored<br/> Cross reference allows for easy trouble shooting</li><br/>
							<li> Offline programming is rccommended<br/> Data monitoring gives a user insight to only where the data is being stored<br/> Cross reference allows for easy trouble shooting</li><br/>
							<li> Offline programming is rccommended<br/> Data monitoring gives a user insight to where and what data is being stored<br/> Cross reference does not allow for trouble shooting</li><br/>
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
    m10_ex5_submit
@stop

@section('additional_script')
    <script>
    var answer = 3;
        $(document).ready(function() {
            $('.radio').val('9999');
        });

        $(".m10_ex5_submit").click(
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