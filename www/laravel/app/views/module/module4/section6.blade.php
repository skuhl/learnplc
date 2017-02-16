@extends('module.m4_template')

@section('title','Module-4-6')

@section('section-menu')
@include('module.module4.menu')
@stop

@section('lesson')
<div class="lesson-title" style="width: 72%;"> languages Overview </div>
<div class="lesson-statement">
<p>
    Now, you know how the PLC runs your program and are able to do some simple ladder logic programming. At the end, let's review PLC programming languages.
    As an exercise, build a NAND gate.
</p>

<h4> 1. PLC Programming Languages Overview </h4>
<ul>
    <li> There are various ways to program the PLC and the term PLC programming languages
        assumes the way by which the user programs the specific task into the PLC.
        The Figure 3 provides an overview of the standardized model (IEC 61131) of PLC programming languages.<br>
        <img src="/public/assets/img/module4/module_4_3_img_1.png" width="600"
             style="display: block; margin-left: auto; margin-right: auto"><br>
        <h5 style="text-align:center">Figure 1: Languages of Programmable Logic Controllers (The standard IEC
            61131)</h5><br><br>
    </li>
    <li>
        <b>Ladder Diagram (LD)</b> is the most common form of PLC language and is a graphical depiction of the process
        with rungs of various logic elements. The other languages do exist which were developed in conjunction with
        Relay Ladder Logic.<br><br>
    </li>
    <li>
        <b>Function Block Diagrams (FBD)</b> are built from small ladder logic subroutines and used through the code as
        user defined ladder logic instructions.
        The advantages of this graphical depiction of process flow is the reduction of repetitive ladder logic code.<br><br>
    </li>
    <li>
        <b>Sequential Function Chart (SFC)</b> programming is similar to programming by the computer flow chart.
        In SFC the program advances step by step through various blocks.
        Transition conditions determine when the program advances from one block to another.
        Both the action blocks and the transition conditions are created using ladder diagrams.<br><br>
    </li>
    <li>
        <b>Structured Text (ST)</b> is a high-level, text-based language that uses simple instructions
        common to medium level programming languages: If , While, Then<br><br>
    </li>
    <li>
        <b>Instruction List (IL)</b> is a low-level, text-based language that uses mnemonic instructions.
        It is an older language which is hard to maintain, hard to read for inexperienced programmers
        and hard to handle in larger projects. On the other hand, it is fast and requires minimal memory usage<br><br>
    </li>
</ul>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 5</div>
<div class="lesson-statement">
    <p>
        Build a NAND gate using the PLC ladder logic. The final result should be: <b>light #2</b> controlled by <b> switch #1 - NAND - switch #2</b>
    </p>
    <img src="/public/assets/img/module4/exercise_diagram/exercise_5_diagram.png" width="250" style="display: block; margin-left: auto; margin-right: auto">

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
<button class="m4_ex_submit" type="button">Submit Anwser</button>
@stop


@section('additional_script')
<script type="text/JAVASCRIPT">
    $(document).ready(function() {
        $('.radio').val('9999');
    });

    $(".submit").click(
        function(){
            m4_ex5_NAND();
        });



    $('.btn-radio').click(function() {
        $(this).parent().siblings().children().removeClass('active');
        $(this).addClass('active');
        $(this).parent().siblings('input').val($(this).attr('value'));
    });
</script>
@stop
