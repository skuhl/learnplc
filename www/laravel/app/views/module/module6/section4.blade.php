<style>
	#m6_ex4_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','Combination of Timers and Counters and its Applications ')

@section('section-menu')
@include('module.module6.menu')
@stop

@section('lesson')
<div class="lesson-title">Combination of Timers and Counters and its Applications </div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
            &nbsp &nbsp &nbsp Commonly, timers and counters will be used in conjunction to fully automate a process.<br><br>
            &nbsp &nbsp &nbsp Now, lets look at an example:<br>
            &nbsp &nbsp &nbsp Take the following heat treating process where a furnace can fit a maximum of ten parts per heat.
            Additionally each part must spend 5 minutes in the furnace to reach the desired temperature.
            <br><br>
            &nbsp &nbsp &nbsp This can be automated by utilizing a combination of a counter and a timer.
            The counter keeps track of the parts entering the furnace. Once the 10th part has entered,
            the counter’s preset is reached, and the done bit is toggled. This counter done bit can be used to pause the line,<br><br>

            &nbsp &nbsp &nbsp turn on the furnace, and start a 5 minute timer. When the timer’s preset is reached, the timer’s done bit is used to reset the counter.
            This in turn will toggle the counters done bit back to zero, triggering the line to start, furnace to kick off, and zero a non-retentive timer.<br>
        </p>
	</div>
    <br>

</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise</div>
<div class="lesson-statement">
	<p>
        &nbsp &nbsp &nbsp Ted wants <b>Button 1</b> to turn on <b>Light 1</b> after it has been pushed <b>exactly 3 times</b><br>.
        The <b>Light 1</b> will remain ON for <b>5 seconds</b> and then turns off automatically <br><br>
        Place the components in the correct configuration to accomplish this task.<br><br>

        &nbsp &nbsp &nbsp <b>Components Given:</b><br>
        <b>•	&nbsp 1 x TON</b> <br>
        <b>•	&nbsp 1 x CTU</b> <br>
        <b>•	&nbsp 4 x N.O. Contacts</b><br>
        <b>•	&nbsp 1 x Output Enable</b><br>
        <b>•	&nbsp 1 x RES</b><br>
	</p>
</div>
@stop

@section('exercise')
    <div id="plc_sim_container">

        <button id="UNDO" type="button" title="Undo the last changes">UNDO</button>

        <div id="simulator_window">
            <div id="ThreeJS" style="width:640px; height:360px"></div>
            <div id="ports_list">
                <h3>Inputs</h3>

                <div>
                    <div id="ins_sw1" class="port_inst" data-name="sw1">
                        <img src="/public/assets/icon/simulator/icon_swi.png" alt="some_text" width="32" height="32" class="icon_list">

                        <p style="margin-left: 5px;" class="inst_type">Switch #1:</p>

                        <p style="margin-left: 5px;" class="inst_name">SW1</p>
                    </div>
                    <div id="ins_sw2" class="port_inst" data-name="sw2">
                        <img src="/public/assets/icon/simulator/icon_swi.png" alt="some_text" width="32" height="32" class="icon_list">

                        <p style="margin-left: 5px;" class="inst_type">Switch #2:</p>

                        <p style="margin-left: 5px;" class="inst_name">SW2</p>
                    </div>
                    <div id="ins_bt1" class="port_inst" data-name="bt1">
                        <img src="/public/assets/icon/simulator/icon_button.png" alt="some_text" width="32" height="32" class="icon_list">

                        <p style="margin-left: 5px;" class="inst_type">Button #1:</p>

                        <p style="margin-left: 5px;" class="inst_name">BT1</p>
                    </div>
                </div>
                <h3>Outputs</h3>

                <div>
                    <div id="ins_lt1" class="port_inst" data-name="lt1">
                        <img src="/public/assets/icon/simulator/icon_light.png" alt="some_text" width="32" height="32" class="icon_list">

                        <p style="margin-left: 5px;" class="inst_type">Light #1:</p>

                        <p style="margin-left: 5px;" class="inst_name">LT1</p>
                    </div>
                    <div id="ins_lt2" class="port_inst" data-name="lt2">
                        <img src="/public/assets/icon/simulator/icon_light.png" alt="some_text" width="32" height="32" class="icon_list">

                        <p style="margin-left: 5px;" class="inst_type">Light #2:</p>

                        <p style="margin-left: 5px;" class="inst_name">LT2</p>
                    </div>
                </div>
            </div>
            <button id="simulate" type="button" title="Simulate the ladder logic">SIMULATE</button>
            <button id="stop_sim" type="button">STOP</button>
            <button id="fold_sim" type="button" title="Hide the simulation window to build the ladder logic">MINIMIZE</button>
            <button id="exp_sim" type="button" title="Reopen the simulation window for information">EXPAND</button>
            <div id="mark_item"></div>
        </div>

        <div id="toolaccord">
            <h3>Bit Tool</h3>
            <ul class="icons ui-widget ui-helper-clearfix">
                <li class="tool-container">
                    <div class="toolcom" data-element-type="1">
                        <img src="/public/assets/icon/simulator/XIO_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>
                <li class="tool-container">
                    <div class="toolcom" data-element-type="2">
                        <img src="/public/assets/icon/simulator/XIC_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>
                <li class="tool-container">
                    <div class="toolcom" data-element-type="3">
                        <img src="/public/assets/icon/simulator/OTE_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>
                <li class="tool-container">
                    <div class="toolcom" data-element-type="4">
                        <img src="/public/assets/icon/simulator/OTL_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>
                <li class="tool-container">
                    <div class="toolcom" data-element-type="5">
                        <img src="/public/assets/icon/simulator/OTU_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>
                <li class="tool-container">
                    <div class="toolcom" data-element-type="6">
                        <img src="/public/assets/icon/simulator/OSR_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>
                <li class="tool-container">
                    <div class="toolcom" data-element-type="7">
                        <img src="/public/assets/icon/simulator/ADD_Line.png" alt="some_text" width="32" height="32">
                    </div>
                </li>
                <li class="tool-container">
                    <div class="toolcom" data-element-type="8">
                        <img src="/public/assets/icon/simulator/Add_Bridge.png" alt="some_text" width="32" height="32">
                    </div>
                </li>


            </ul>
            <h3>Timers/Counters</h3>
            <ul class="icons ui-widget ui-helper-clearfix">
                <li class="tool-container">
                    <div class="toolcom" data-element-type="9">
                        <img src="/public/assets/icon/simulator/TON_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>

                <li class="tool-container">
                    <div class="toolcom" data-element-type="10">
                        <img src="/public/assets/icon/simulator/TOF_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>

                <li class="tool-container">
                    <div class="toolcom" data-element-type="11">
                        <img src="/public/assets/icon/simulator/RTO_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>

                <li class="tool-container">
                    <div class="toolcom" data-element-type="12">
                        <img src="/public/assets/icon/simulator/CTU_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>

                <li class="tool-container">
                    <div class="toolcom" data-element-type="13">
                        <img src="/public/assets/icon/simulator/CTD_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>

                <li class="tool-container">
                    <div class="toolcom" data-element-type="14">
                        <img src="/public/assets/icon/simulator/RES_tools.png" alt="some_text" width="32" height="32">
                    </div>
                </li>

            </ul>
            <h3>I/O</h3>
            <ul>For later module</ul>
            <h3>Compare</h3>
            <ul>For later module</ul>

        </div>

        <div id="LDLCanvas"></div>
        <script type="text/javascript" src="/public/assets/js/simulator/initiate.js"></script>
        <script type="text/javascript" src="/public/assets/js/simulator/scenario/light_switch.js"></script>

    </div>
@stop

@section('submit-class')
m6_ex4_submit
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