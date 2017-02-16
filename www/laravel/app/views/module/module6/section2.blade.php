<style>
	#m6_ex2_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','Counter Instructions')

@section('section-menu')
@include('module.module6.menu')
@stop

@section('lesson')
<div class="lesson-title">Counter Instructions</div>
<div class="lesson-statement">
	<div class="subsection">
        <h4> 1. Up-counter (CTU) </h4>
        <p>
            &nbsp &nbsp &nbsp There are a few counter instructions which are based on the counter type, counter address, counter preset value and accumulated count.
            Counters are generally retentive, meaning when the program is stopped and restarted, the counter retains its previous accumulated value.<br><br>

            &nbsp &nbsp &nbsp First let’s look at the different types of counters.
            The basics are the up and the down counter while some software may have a combinational counter that incorporates both.
            For our purpose, we will only look at the up and down counter.
            The <b>up-counter (CTU)</b> is an output instruction that increments its accumulated value by one on each false to true transition.<br>

            <br><img src="/public/assets/img/module6/timers_ctu.png" width="150"><br><br>

            &nbsp &nbsp &nbsp An up-counter can easily be incorporated in order to track an event each time it occurs and trigger a second event once the preset has been reached.
            This is achieved by an “examine if closed” bit addressed to a sensor.<br><br>

            &nbsp &nbsp &nbsp On each false to true transition the counters accumulated value will increment by one until a preset value is reached.
            Once the accumulated count equals the preset value the counter’s done bit will be energized, and that can be used to toggle a separate event.
            In order to reset up or down counters a reset instruction is used that, when toggled, will reset a counter’s accumulated count to zero.
        </p>
        <br>

        <h4> 2. Down-counter (CTD) </h4>
        <p>
            <img src="/public/assets/img/module6/timers_ctd.png" width="150"><br><br>
            &nbsp &nbsp &nbsp Likewise, a down-counter can be utilized to decrement by one each time an event occurs until a preset value is reached triggering a second event.<br><br>

            Down-counters are usually used in conjunction with an up-counter in order to form an up/down-counter.
            An easy example of this is a parking garage that can hold 200 cars maximum.<br><br>

            An up-counter can be used to track the total number of cars entering while a down-counter tracks the number of cars exiting.
            When the preset value of the up-counter is reached no further cars will be allowed to enter.
            Here the accumulated count of both counters is the same if they have the same address.
            This is important and allows the program to function properly for tracking the total number of cars in the garage.
        </p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise</div>
<div class="lesson-statement">
	<p>
        &nbsp &nbsp &nbsp Ted wants to use <b>Button 1</b> to turn on <b>Light 1</b> only when it has been pushed for <b>5 times</b>. <br>
        Place the components in the correct configuration to accomplish this task.<br><br>

        &nbsp &nbsp &nbsp <b>Components Given:</b><br>
        <b>•	&nbsp 1 x CTU</b> <br>
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
m6_ex2_submit
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

                var hint_body = $("<p>&nbsp &nbsp &nbsp Use the <b>'DN Bit'</b> of a <b>'CTU'</b> instruction to control the light." +
                "<br> Set the <b>'Preset'</b> value to the value you wish to count up to.</p>");
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