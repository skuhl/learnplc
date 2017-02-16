@extends('module.m4_template')

@section('title','Module-4-3')

@section('section-menu')
@include('module.module4.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<div class="lesson-title" style="width: 72%;"> Branching instructions </div>
<div class="lesson-statement">
    <p>
        In this section, you will build a OR gate using the branching instruction.
    </p>

    <h4>1.	Branching instructions</h4>
    <ul>
        <li>
            Branching instructions are used to create a parallel path of input or output condition instructions.
            Figure 5 shows a simple branching instruction  of two input condition instructions which create two parallel paths.
            When either condition A  or condition B are true the Output C becomes energized.<br>
            <img src="/public/assets/img/module4/module_4_3_img_3.png" width="200" style="display: block; margin-left: auto; margin-right: auto"><br>
            <h5 style="text-align:center">Figure 3: Simple branching instruction</h5><br><br>
            Figure 6 shows another application of branching instruction.
            In this example, both inputs and outputs have branches. When either input A or B are true, all outputs C, D, and E will get energized.<br>
            <img src="/public/assets/img/module4/module_4_3_img_4.png" width="300" style="display: block; margin-left: auto; margin-right: auto"><br>
            <h5 style="text-align:center">Figure 4: Branching instruction are applied on the inputs and outputs</h5><br><br>

            <img src="/public/assets/img/module4/module_4_3_img_5.png" width="300" style="display: block; margin-left: auto; margin-right: auto"><br>
            <h5 style="text-align:center">Figure 5: Nested instructions</h5><br><br>

            Input and output branches can be nested, as it is shown in the upper image of Figure 5.
            Nesting is done to avoid redundancy in the ladder logic diagrams. However, not all PLC allow for nested instructions.
            In this case, the equivalent circuit shown in the bottom diagram of Figure 5 where nested branching was converted into non-nested branch
            by repeating instruction C, can be implemented.<br><br>

            In addition, vertical branching is not allowed in PLC and therefore the ladder logic diagram
            needs to be re-programmed as it is shown in Figure 5. In this example,
            instruction C was implemented in both rungs 2 and 4 to satisfy the function of the original program with vertical nesting.<br><br>

            <img src="/public/assets/img/module4/module_4_3_img_6.png" width="400" style="display: block; margin-left: auto; margin-right: auto"><br>
            <h5 style="text-align:center">Figure 6: Vertical nesting is not allowed in PLC </h5><br><br>

            One more limitation of nested instructions is due to the fact that the PLC processor scans the ladder
            logic diagram from left to right and therefore the caution needs to be taken into account while nesting the instructions.
            In the example shown in Figure 7, the rung containing instructions D and E is nested with the first and the third rungs
            that provides multiple energize conditions for an output Y.
            The continuity conditions exist under the following conditions: 1. A, B, C; 2. A, D, E; 3. F, E;
            and 4. F, D, B, C. However, the last condition cannot be satisfied because
            it pertains for the scan being executed from right to left which is not allowed.
            As a result the original logic needs to be reconfigured to avoid the restricted condition.
            The possible solution is shown in the bottom image of Figure 7.<br><br>

            <img src="/public/assets/img/module4/module_4_3_img_7.png" width="400" style="display: block; margin-left: auto; margin-right: auto"><br>
            <h5 style="text-align:center">Figure 7: Right-to-left scan is not allowed in PLC  </h5><br><br>

        </li>
    </ul>
</div>@stop

@section('instructions')
<div class="lesson-title">Excercise 2</div>
<div class="lesson-statement">
    <p>
        Build a OR gate using the PLC ladder logic. The final result should be: <b>light #1</b> controlled by <b>switch #1</b> OR <b>switch #2</b>
    </p>
    <img src="/public/assets/img/module4/exercise_diagram/exercise_2_diagram.png" width="250" style="display: block; margin-left: auto; margin-right: auto">

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

//    $(".m4_ex_submit").button().click(
//        function(){
//            m4_ex2_OR();
//        });

    $(".submit").click(
        function(){
            m4_ex2_OR();
        });


    $('.btn-radio').click(function() {
        $(this).parent().siblings().children().removeClass('active');
        $(this).addClass('active');
        $(this).parent().siblings('input').val($(this).attr('value'));
    });
</script>
@stop
