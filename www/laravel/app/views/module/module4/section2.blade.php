@extends('module.m4_template')

@section('title','Module-4-2')

@section('section-menu')
@include('module.module4.menu')
@stop

@section('lesson')
<div class="lesson-title" style="width: 72%;"> Basic Symbols </div>
<div class="lesson-statement">
	<p> 
		In the next few sections, you will learn some basics of PLC programming.
        There is one exercise for each of the material.
        If you don't know how to do it, Feel free to click "submit answer" and "continue" to go to the next section for more learning material.
	</p>

	<h4> 1. Examine-if-Open (XIO), Examine-if-Closed (XIC), and Output Energize Instructions </h4>
    <ul>
        <li>
            There are three main symbols that are used to represent relay control logic:
            Examine-if-Open (XIO)
            <img src="/public/assets/img/module4/XIO_icon.png" height="32">
            Examine-if-Closed (XIC)
            <img src="/public/assets/img/module4/XIC_icon.jpg" height="32">
            and Output Energize (OTE) instructions.
            <img src="/public/assets/img/module4/tutorial_LL_5.jpg" height="32">
            These instructions operate on a single bit of the PLC memory.
            The bit is specified in the address of the instruction and can be represented directly in the address in case of AB SLC 500 or
            indirectly using alias in AB Control and Compact Logic family of PLCs.<br><br>
        </li>
        <li>
            XIO instruction shown in Figure 2 is also called Examine-OFF and operates as a normally closed relay.
            The PLC processor uses this instruction to examine if the contact is open that corresponds to the associated memory bit to take the value 0.
            In case when the XIO instruction is in the OFF state, the memory bit assumes the value 1.
            The memory bit is set to  1 or 0 depending on the status of an actual input device associated with that particular instruction.
            When XIO instruction takes a TRUE state that corresponds the memory bit to be equal 0,
            then rung becomes closed which provides an actual voltage to the output devise associated with that particular rung.<br><br>
            <img src="/public/assets/img/module4/module_4_2_img_2.png" width="400" style="display: block; margin-left: auto; margin-right: auto"><br>
            <h5 style="text-align:center">Figure 2: Examine-if-Open (XIO) , Examine-if-Closed (XIC) and Output Energize (OTE) instructions.</h5><br><br>

            XIC instruction shown in Figure 2 is also called Examine-ON and operates as a normally open relay.
            The PLC processor uses this instruction to examine if the contact is closed that corresponds to the associated memory bit to take the value 1.
            In case when the XIC instruction is in the OFF state, the memory bit assumes the value 0.
            When XIC instruction takes a TRUE state that corresponds the memory bit to be equal 1,
            then rung becomes closed which provides an actual voltage to the output device associated with that particular rung.<br><br>
            OTE instruction shown in Figure 2 operates as a relay coil.
            When energized (memory bit is 1) the PLC switches ON the output and when is de-energized (memory bit is 0)
            the PLC switches OFF the output and therefore cuts the power from the output device associated with that particular rung.<br><br>
            Table 1 outlines the status of XIC, XIO, and OTE instructions based on the current memory bit value.<br><br>
            <img src="/public/assets/img/module4/module_4_2_table_1.png" width="400" style="display: block; margin-left: auto; margin-right: auto"><br>
            <h5 style="text-align:center">Table 1: Truth table for XIC, XIO, and OTE Instructions.</h5><br>
        </li>
    </ul>
</div>
@stop

@section('instructions')
<div class="lesson-title">Excercise 1</div>
<div class="lesson-statement">
	<p>
		Build a AND gate using the PLC ladder logic. The final result should be: <b>light #1</b> controlled by <b>switch #1</b> AND <b>switch #2</b>
	</p>

    <img src="/public/assets/img/module4/exercise_diagram/exercise_1_diagram.png" width="250" style="display: block; margin-left: auto; margin-right: auto">

    <h4>Hints:</h4>
    <ul>
        <li>
            PLC scans your ladder logic from left to right.
        </li>
        <li>
            As you have two inputs and one output, you will need at least two "Examine-if-XXX" components and a OTE component.
        </li>
        <li>
            If you have trouble adding components or simulating your ladder logic, please go back to tutorial-1 for more information.
        </li>
    </ul>
</div>
@stop

@section('exercise')



<!--<script type="text/javascript" src="/public/assets/js/simulator/m4_ex/m4_ex_setup.js"></script>-->
<!--<script type="text/javascript" src="/public/assets/js/simulator/m4_ex/m4_ex1.js"></script>-->
<!--<script type="text/javascript" src="/public/assets/js/simulator/m4_ex/verification_common.js"></script>-->

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
        <h3>Timers</h3>
        <ul>For later module</ul>
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

@section('submit')
<!--<button class="m4_ex_submit" type="button">Submit Anwser</button>-->
@stop


@section('additional_script')
<script type="text/JAVASCRIPT">
    $(document).ready(function() {
        $('.radio').val('9999');
    });

    $(".submit").click(
        function(){
            m4_ex1_AND();
        });



    $('.btn-radio').click(function() {
        $(this).parent().siblings().children().removeClass('active');
        $(this).addClass('active');
        $(this).parent().siblings('input').val($(this).attr('value'));
    });
</script>
@stop
