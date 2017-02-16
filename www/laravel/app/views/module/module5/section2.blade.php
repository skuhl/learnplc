<style>
	#m5_ex2_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','Timer Basics')

@section('section-menu')
@include('module.module5.menu')
@stop

@section('lesson')
<div class="lesson-title">Timer Basics</div>
<div class="lesson-statement">
	<div class="subsection">
        <h4> <b>1. Timer instructions</b></h4>
		<p>
            &nbsp &nbsp &nbsp There are multiple timer instructions that are available to the programmer in ladder logic.
            Each instruction has both unique and common properties that provide complete control over a system.
            We will first look at these different instructions as they appear in ladder logic,
            explore the bits associated with the timers that provide control
            and then look at the application of each timer, including how the bits behave.<br><br>

            <b>The timer instructions are:</b><br>
            <br><img src="/public/assets/img/module5/section1/timers_ton.png" width="150"><br>
            <b>•	 &nbsp TON (Timer On Delay)</b> – Begins timing when instruction becomes true<br>
            <br><img src="/public/assets/img/module5/section1/timers_tof.png" width="150"><br>
            <b>•	&nbsp  TOF (Timer On False)</b> – Begins timing when instruction becomes false.<br>
            <br><img src="/public/assets/img/module5/section1/timers_rto.png" width="150"><br>
            <b>•	&nbsp  RTO (Retentive Timer On) </b> – Begins timing when the instruction is true. Also retains the accumulated value when instruction becomes false or the power is lost.<br>
            <br><img src="/public/assets/img/module5/section1/timers_res.png" width="45"><br>
            <b>•	&nbsp  RES (Reset) </b> – Resets the timer’s accumulated value to zero.<br>
        </p>
        <br>

        <h4> <b>2. Timer bits</b></h4>
        <p>
            <b>•	&nbsp Enable (EN)</b> bit – This bit is true when the timer instruction is true.
            This is commonly used when another section of the ladder logic has to be true while the timer is true.<br><br>

            <b>•	&nbsp Timer-timing (TT)</b> bit – This bit is true as long as the accumulated value of the timer is changing (when the timer is timing).
            This provides a mean to control an instruction while the timer is timing.<br><br>

            <b>•	&nbsp Done (DN)</b> bit – The done bit changes when the accumulated value is equal to that of the accumulated value (when the timer is done timing).
            This bit allows the programmer to activate either an output or another section of the ladder logic program when the timer is complete.<br><br>

            &nbsp &nbsp &nbsp While each timer has multiple bits that provide control to the rest of the ladder logic,
            each timer instruction also has parameters associated with it.
            The parameters are used in order to manipulate the timer and its operation. These include:<br>

            <b>•	&nbsp Time Base</b> – Determines whether the timer counts in seconds (time base of 1), milliseconds (time base of .1), and so on.<br><br>
            <b>•	&nbsp Preset Value</b> – The predetermined length that the user wants the timing instruction to be enabled for.<br><br>
            <b>•	&nbsp Accumulated Value</b> – How much time the timer has been timing. This value is set to 0 via a reset instruction.<br><br>

        </p>

        <h4> <b>3. Use timers in simulator</b></h4>
        <p>
            To use the bits of a timer. The name format is: <br>
            <b style="color:red; font-size:85%">timer type (TON/ TOF/ RTO) + number (1/ 2/ 3 ...) + bit-type (E for (EN) bit, T for (TT) bit, D for DN bit).</b><br>
            For example:<br><br>
            To use the <b style="color:red">DN</b> bit of <b style="color:red">TON #1</b>, the name is <b style="color:red">TON1D</b>;
            To use the <b style="color:red">TT</b> bit of
            <b style="color:red">RTO #3</b>, the name is <b style="color:red">RTO3T</b>.
        </p>
        <p>
            To register a bit, you can double click on an element, and type the name in the correct format.
            Alternatively, you can drag and drop the <b>DN/ EN element</b> after the timer elements onto any input elements, like <b>XIC</b>.<br>
        </p>
	</div>

</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise</div>
<div class="lesson-statement">
	<p>
        &nbsp &nbsp &nbsp Ted wants <b>Switch 1</b> to turn on <b>Light 1</b> for 5 seconds after he pushes the switch. <br>
        Place the components in the correct configuration to accomplish this task.<br><br>

        &nbsp &nbsp &nbsp <b>Components Given:</b><br>
        <b>•	&nbsp 1 x Timer On Delay</b> <br>
        <b>•	&nbsp 2 x N.O. Contacts</b><br>
        <b>•	&nbsp 1 x Output Enable</b><br>

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
m5_ex2_submit
@stop

@section('additional_script')
<script>
    $(document).ready(function() {
        $('.radio').val('9999');
    });

//    $(".m5_ex2_submit").click(
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

                var hint_body = $("<p>&nbsp &nbsp &nbsp Use the <b>'TON'</b> instruction's Done Bit to control the light." +
                " Remember that you can drag the (DN) bit onto the element you want lnk to.</p>");
                hint_block.append(hint_body);

                question_dialog.append(hint_block);

                //for solution button
                var show_solution = $("<button>Answer</button>").button().click(
                        function(){
                            var answer_dialog = $("<div></div>").dialog();
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