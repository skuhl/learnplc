

@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','PLC Enclosures')

@section('section-menu')
@include('module.module10.menu')
@stop

@section('lesson')
<div class="lesson-title"> Installation: PLC Enclosures </div>
<div class="lesson-statement">
	<div class="subsection">
        {{--<h4>Install: PLC Enclosures</h4>--}}
		<p>
            &nbsp &nbsp &nbsp Programmable Logic Controllers (PLCs) must be protected from the elements of the environment in which they are placed.
            These elements include, humidity, dust, debris, shock, and any other factors that could damage the components within the PLC.
            In order to protect the PLC, it is installed within an enclosure
            which acts as the barrier between the electrical components of the PLC and the environment around it.<br><br>

            &nbsp &nbsp &nbsp Each enclosure has a different rating, which determines what the enclosure can withstand.
            The National Electrical Manufacturers Association (NEMA) defines these ratings.
            A rating such as a NEMA 12 protects against dust while a NEMA 4X enclosure offers protection
            both indoors and outdoors against falling debris and water (rain, sleet, snow).
            It is essential to choose the appropriate enclosure when designing a PLC system.<br><br>

            &nbsp &nbsp &nbsp Another very important factor to consider is that the PLC gives off heat.
            This heat can accumulate within the enclosure and cause just as much damage
            as the harmful elements within the environment if the temperature exceeds the maximum operating temperature rating.
            In order to counteract this problem, the heat must be properly transferred to the air outside through ventilation systems.
            These can simply be fans to move the air. Also spacing out the components within the enclosure can help dissipate the heat.
            PLCs are always horizontally mounted to inhibit the rise of heat from one module from affecting the surrounding components.<br><br>

            &nbsp &nbsp &nbsp The enclosure also houses a hardwired electromechanical master control relay (MCR).
            This allows for the system to be physically disconnected from the power source,
            which removes the possibility of a software failure resulting in a accidental electrocution.
            The MCR should be wired in such a way that the processor doesn’t lose power so that it can retain all of its vital information,
            but all power to the other input/output cards is lost.<br><br>
        </p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 1</div>
<div class="lesson-statement">
	<p>
		Select the answer with the correct set of PLC enclosure attributes to the right and once submitted, press 'Continue'.
	</p>
</div>
@stop

@section('exercise')
<div class = "row">
	<div class = "col-lg-9">
		<div class = "thumbnail" style = "padding: 10 px; width: 600px">
			<div id = "m10_ex1_workspace">
				<div id = "question1">
					<p>
						<ol style = "list-style-type: upper-alpha">
							<li> Programmable Logic Controllers<br/> Always horizontally mounted<br/> Software master control relay</li><br/>
							<li> Programmable Logic Containment<br/> Always horizontally mounted<br/> Software master control relay</li><br/>
							<li> Programmable Logic Controllers<br/> Always horizontally mounted<br/> Hardwired master control relay</li><br/>
							<li> Progressive Logic Controllers<br/> Always vertically mounted<br/> Hardwired master control relay</li><br/>
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
m10_ex1_submit
@stop

@section('additional_script')
<script>
var answer = 0;
    $(document).ready(function() {
        $('.radio').val('9999');
    });

    $(".m10_ex1_submit").click(
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