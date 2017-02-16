<style>
	#m7_ex3_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','Sequencer Programs')

@section('section-menu')
@include('module.module7.menu')
@stop

@section('lesson')
<div class="lesson-title">Sequencer Programs</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
            &nbsp &nbsp &nbsp Sequencers require a false-to-true transition in order to operate.
            This allows for two different types of sequencer programs:
            event-driven and time-driven. Determining what type of sequencer program to use is a matter of how the program needs to run.<br><br>

            &nbsp &nbsp &nbsp An event-driven sequencer program moves from step to step via a certain event happening.
            For example, every time a limit switch is enabled, move to the next step of the program.<br><br>

            &nbsp &nbsp &nbsp A time-driven sequencer program is controlled on the basis of a timer,
            much like a mechanical drum sequencer.
            A timer instruction is used to enable the progression of the program steps by using the done bit of
            the timer to create a false-to-true transition on the sequencer instruction rung.<br><br>

		</p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 3</div>
<div class="lesson-statement">
	<p>
		Identify the type of the sequencer programs at the right side, and make sure you understand how they work.
	</p>
</div>
@stop

@section('exercise')
<div>
    <div id="mod7_sec3_q1">
        <p>1. A mechanical stepping switch</p>
        <img src="/public/assets/img/module7/stepper_switches.jpg" width="600" height="250">
        <br><br><br>
    </div>
    <div id="mod7_sec3_q2">
        <p>2. A mechanical drum sequencer</p>
        <img src="/public/assets/img/module7/mechanical_sequencer.png" width="400">
        {{--<img src="/public/assets/img/module7/mod7_sec2_2.jpg" height="500">--}}
        <br><br><br>
    </div>
    <div id="mod7_sec3_q3">
        <p>3. The program we used in last section</p>
        <img src="/public/assets/img/module7/mod7_sec3_q3.png" width="280">
        <br><br><br>
    </div>
    <div id="mod7_sec3_q4">
        <p>4. Another PLC program</p>
        <img src="/public/assets/img/module7/mod7_sec3_q4.png" height="310">
        <br><br><br>
    </div>
</div>
@stop

@section('submit-class')
m7_ex3_submit
@stop

@section('additional_script')
<script>
    $(document).ready(function() {
        $('.radio').val('9999');
    });

    $("#trouble_btn").click(
            function(){
                var question_dialog = $("<div></div>");
                question_dialog.dialog({
                    height: 450,
                    width: 600,
                    close: function( event, ui ) {
                        $(this).dialog("destroy").remove();
                    }
                });

                //for hint block
                var hint_block = $("<div></div>");
                var hint_title = $("<h4>Hints:</h4>");
                hint_block.append(hint_title);

                var hint_body = $("<p>write <b>1</b> to the LT1 in output table turns on Light #1, " +
                "similar for Light #2" +
                "<br><br>The value that's being written to the output address is the value of current " +
                "value pointed by address in <b>FILE</b> *bitwise AND* the value of <b>MASK</b></p>");
                hint_block.append(hint_body);

                question_dialog.append(hint_block);

                //for solution button
                var show_solution = $("<button>Answer</button>").button().click(
                        function(){
                            var answer_dialog = $("<div></div>");
                        }
                ).appendTo(question_dialog);
            }
    );


    $('.btn-radio').click(function() {
        $(this).parent().siblings().children().removeClass('active');
        $(this).addClass('active');
        $(this).parent().siblings('input').val($(this).attr('value'));
    });
</script>
@stop