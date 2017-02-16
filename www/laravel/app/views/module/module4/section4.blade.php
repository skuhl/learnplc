@extends('module.m4_template')

@section('title','Module-4-4')

@section('section-menu')
@include('module.module4.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<div class="lesson-title" style="width: 72%;"> Program Scan </div>
<div class="lesson-statement">

<p>
    Now, let's understand how PLC scan your program. Then you can build a NOT gate using XIO
</p>

<h4> 1. Program Scan </h4>
<ul>
    <li> The PLC is designed to execute the user created program.
        During the program execution, the processor, in real time, controls the output devices based on the current
        state of the input conditions.
        As shown in Figure 1, the processor of the PLC collects the information from the input device (push button) via
        the input module and stores the information of the current state of the push button in the input image file
        0012. Further,
        based on the program the output energize instruction 506 changes its state.
        Last, in turn, it will update the output image file and as a result will activate the output device.
        All these steps of the process are executed during a specific time, called a program scan.<br>
        <img src="/public/assets/img/module4/module_4_2_img_1.jpg" width="400"
             style="display: block; margin-left: auto; margin-right: auto"><br>
        <h5 style="text-align:center">Figure 1: Program Scan</h5><br>
        The scan is a continuous and sequential process. During each scan, the processor reads the inputs, executes the
        user program
        and updates the output devices. After the output scan is over the housekeeping takes place: internal checks of
        memory,
        speed and operation as well as any communication procedures. All the steps of the scan process happens between 1
        and 20 milliseconds,
        making sure the real time update of the output devices based on the input conditions.
        The duration of the scan time depends on the speed of the CPU, length of the user program and types of the
        instructions used,
        the amount of memory, and the actual true/false conditions of the input devices.<br><br>
    </li>
    <li>
        The much more powerful ControlLogix PLCs employ a different and more efficient
        approach for the operating scan. Inside of a ControlLogix PLC two separate 32-bit
        unsynchronized processes are working simultaneously. This asynchronous operation
        allows the PLC to conduct I/O updates independently of the logic scan. This approach
        provides more efficiency and more advance timely control over the I/O updates.<br><br>
    </li>
    <li>
        Now, let's try to implement a NOT gate using XIO.
    </li>
</ul>


</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 3</div>
<div class="lesson-statement">
    <p>
        Build a NOT gate using the PLC ladder logic. The final result should be: <b>light #1</b> controlled by <b> NOT - switch #1</b>
    </p>
    <img src="/public/assets/img/module4/exercise_diagram/exercise_3_diagram.png" width="250" style="display: block; margin-left: auto; margin-right: auto">

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
                    <img src="/public/assets/icon/simulator/icon_swi.png" alt="some_text" width="32" height="32"
                         class="icon_list">

                    <p style="margin-left: 5px;" class="inst_type">Switch #1:</p>

                    <p style="margin-left: 5px;" class="inst_name">SW1</p>
                </div>
                <div id="ins_sw2" class="port_inst" data-name="sw2">
                    <img src="/public/assets/icon/simulator/icon_swi.png" alt="some_text" width="32" height="32"
                         class="icon_list">

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
                    <img src="/public/assets/icon/simulator/icon_light.png" alt="some_text" width="32" height="32"
                         class="icon_list">

                    <p style="margin-left: 5px;" class="inst_type">Light #1:</p>

                    <p style="margin-left: 5px;" class="inst_name">LT1</p>
                </div>
                <div id="ins_lt2" class="port_inst" data-name="lt2">
                    <img src="/public/assets/icon/simulator/icon_light.png" alt="some_text" width="32" height="32"
                         class="icon_list">

                    <p style="margin-left: 5px;" class="inst_type">Light #2:</p>

                    <p style="margin-left: 5px;" class="inst_name">LT2</p>
                </div>
            </div>
        </div>
        <button id="simulate" type="button" title="Simulate the ladder logic">SIMULATE</button>
        <button id="stop_sim" type="button">STOP</button>
        <button id="fold_sim" type="button" title="Hide the simulation window to build the ladder logic">MINIMIZE
        </button>
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
<button class="m4_ex_submit" type="button">Submit Anwser</button>
@stop


@section('additional_script')
<script type="text/JAVASCRIPT">
    $(document).ready(function () {
        $('.radio').val('9999');
    });

//    $(".m4_ex_submit").button().click(
//        function () {
//            m4_ex3_NOT();
//        });

    $(".submit").click(
        function(){
            m4_ex3_NOT();
        });


    $('.btn-radio').click(function () {
        $(this).parent().siblings().children().removeClass('active');
        $(this).addClass('active');
        $(this).parent().siblings('input').val($(this).attr('value'));
    });
</script>
@stop
