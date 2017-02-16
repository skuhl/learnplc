<style>
	#m5_ex4_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','Retentive and Cascading Timers')

@section('section-menu')
@include('module.module5.menu')
@stop

@section('lesson')
<div class="lesson-title">Retentive and Cascading Timers </div>
<div class="lesson-statement">
	<div class="subsection">
        <h4> <b>1. Retentive Timers</b></h4>
        <p>
            <br><img src="/public/assets/img/module5/section1/timers_rto.png" width="150"><br><br>

            &nbsp &nbsp &nbsp Another type of timer offered in ladder logic is the retentive timer.
            Retentive timers do not lose their accumulated values when the logic associated with timer becomes false or if power is lost to the system.<br><br>

            This is very useful if the timer is controlling a vital part of a process that cannot be disturbed under any circumstance.
            The bits associated with the retentive timer also maintain their state even when power is lost.<br><br>

            Note that, the only way to reset a retentive timer is through a reset instruction <b>(RES)</b> addressed to the timer itself.
            <br><br>

            {{--<b>The timer instructions are:</b><br>--}}
            {{--<br><img src="/public/assets/img/module5/section1/timers_ton.png" width="150"><br>--}}
            {{--<b>•	 &nbsp TON (Timer On Delay)</b> – Begins timing when instruction becomes true<br>--}}
            {{--<br><img src="/public/assets/img/module5/section1/timers_tof.png" width="150"><br>--}}
            {{--<b>•	&nbsp  TOF (Timer On Delay)</b> – Begins timing when instruction becomes true<br>--}}
            {{--<br><img src="/public/assets/img/module5/section1/timers_rto.png" width="150"><br>--}}
            {{--<b>•	&nbsp  RTO (Timer On Delay)</b> – Begins timing when instruction becomes true<br>--}}
            {{--<br><img src="/public/assets/img/module5/section1/timers_res.png" width="45"><br>--}}
            {{--<b>•	&nbsp  RES (Timer On Delay)</b> – Begins timing when instruction becomes true<br>--}}
        </p>

        <h4> <b>2. Reset Timers</b></h4>
        <p>
            &nbsp &nbsp &nbsp The <b>(RES)</b> instruction is used to reset the accumulate value of timers/counters.<br>

            <br><img src="/public/assets/img/module5/intro/m5_tutorial_ENDN.png" width="190"><br><br>

            &nbsp &nbsp &nbsp To use the <b>(RES)</b>, drag and drop any <b>(DN)/(EN)</b> component onto the <b>(RES)</b> on the ladder logic.
            Once the <b>(RES)</b> gets activated,the accum value of the addressed timers/counters will be reset to 0.<br>

        </p>
	</div>

</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise</div>
<div class="lesson-statement">
	<p>
        &nbsp &nbsp &nbsp Ted wants <b>Switch 1</b> to turn on <b>Light 1</b> when he pushes the button for 5 seconds accumulative,
        He also wants the <b>Button 1</b> to reset the Timer.<br>
        Place the components in the correct configuration to accomplish this task.<br><br>

        &nbsp &nbsp &nbsp <b>Components Given:</b><br>
        <b>•	&nbsp 1 x RTO</b> <br>
        <b>•	&nbsp 3 x N.O. Contacts</b><br>
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
m5_ex4_submit
@stop

@section('additional_script')
<script>
    $(document).ready(function() {
        $('.radio').val('9999');
    });

//    $(".m5_ex4_submit").click(
//            function(){
//                submit_post(1);
//                $("#continue").show();
////            m4_ex1_AND();
//            });

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

                var hint_body = $("<p>&nbsp &nbsp &nbsp To reset a timer we need to use the <b>'RES'</b> instruction.<br>" +
                "To link any timers to a <b>'RES</b> instruction, simply drag and drop either the <b>'(DN)' or '(EN)'</b> " +
                "of that timer/counter onto the <b>'RES'</b> instruction</p>");
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