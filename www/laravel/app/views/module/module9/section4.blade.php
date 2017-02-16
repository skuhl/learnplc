<style>
	#m9_ex4_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','Division Instruction ')

@section('section-menu')
@include('module.module9.menu')
@stop

@section('lesson')
<div class="lesson-title">Division Instruction </div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
            &nbsp &nbsp &nbsp The <b>division instruction (DIV)</b> performs the division arithmetic operation to <b>Source A and Source B</b>.
            The result is then stored in the memory locations that is associated with <b>Dest</b>.<br><br>

            &nbsp &nbsp &nbsp Much like a calculator or doing arithmetic by hand, the <b>DIV instruction</b> is sensitive to what value is in <b>Source A and Source B</b>.
            This instruction divides the value of <b>Source A</b> by the value of <b>Source B</b>.<br><br>

            &nbsp &nbsp &nbsp For example, if you want to divide eight by two, you would assign <b>Source A</b> the value of eight and <b>Source B</b> the value of 2.
            <br><br>
		</p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 4</div>
<div class="lesson-statement">
	<p>
		This is a test of instructions. <br>
		Answer the true or false question to continue!
	</p>
</div>
@stop

@section('exercise')
    <div id="plc_sim_container">

        <button id="UNDO" type="button" title="Undo the last changes">UNDO</button>
        <button id="Open_table" type="button" title="Open the data table">DATA TABLE</button>

        <div id="simulator_window">
            <div id="ThreeJS" style="width:640px; height:360px"></div>
            <div id="ports_list">
                <h3>Inputs</h3>

                <div id="input_tag">
                    {{--<div id="ins_bt1" class="port_inst" data-name="bt1">--}}
                    {{--<img src="/public/assets/icon/simulator/icon_button.png" alt="some_text" width="32" height="32" class="icon_list">--}}

                    {{--<p style="margin-left: 5px;" class="inst_type">Button #1:</p>--}}

                    {{--<p style="margin-left: 5px;" class="inst_name">BT1</p>--}}
                    {{--</div>--}}
                    {{--<div id="ins_bt2" class="port_inst" data-name="bt2">--}}
                    {{--<img src="/public/assets/icon/simulator/icon_button_blue.png" alt="some_text" width="32" height="32" class="icon_list">--}}

                    {{--<p style="margin-left: 5px;" class="inst_type">Button #2:</p>--}}

                    {{--<p style="margin-left: 5px;" class="inst_name">BT2</p>--}}
                    {{--</div>--}}
                    {{--<div id="ins_bt3" class="port_inst" data-name="bt3">--}}
                    {{--<img src="/public/assets/icon/simulator/icon_button_green.png" alt="some_text" width="32" height="32" class="icon_list">--}}

                    {{--<p style="margin-left: 5px;" class="inst_type">Button #3:</p>--}}

                    {{--<p style="margin-left: 5px;" class="inst_name">BT3</p>--}}
                    {{--</div>--}}
                    {{--<div id="ins_bt4" class="port_inst" data-name="bt4">--}}
                    {{--<img src="/public/assets/icon/simulator/icon_button_yellow.png" alt="some_text" width="32" height="32" class="icon_list">--}}

                    {{--<p style="margin-left: 5px;" class="inst_type">Button #4:</p>--}}

                    {{--<p style="margin-left: 5px;" class="inst_name">BT4</p>--}}
                    {{--</div>--}}
                </div>
                <h3>Outputs</h3>

                <div id="output_tag">
                    {{--<div id="ins_lt1" class="port_inst" data-name="lt1">--}}
                    {{--<img src="/public/assets/icon/simulator/icon_conveyor_1.png" alt="some_text" width="32" height="32" class="icon_list">--}}

                    {{--<p style="margin-left: 5px;" class="inst_type">Conveyor #1:</p>--}}

                    {{--<p style="margin-left: 5px;" class="inst_name">CV1</p>--}}
                    {{--</div>--}}
                    {{--<div id="ins_lt2" class="port_inst" data-name="lt2">--}}
                    {{--<img src="/public/assets/icon/simulator/icon_conveyor_2.png" alt="some_text" width="32" height="32" class="icon_list">--}}

                    {{--<p style="margin-left: 5px;" class="inst_type">Conveyor #2:</p>--}}

                    {{--<p style="margin-left: 5px;" class="inst_name">CV2</p>--}}
                    {{--</div>--}}
                    {{--<div id="ins_lt2" class="port_inst" data-name="lt2">--}}
                    {{--<img src="/public/assets/icon/simulator/icon_motion.png" alt="some_text" width="32" height="32" class="icon_list">--}}

                    {{--<p style="margin-left: 5px;" class="inst_type">Sensor #2:</p>--}}

                    {{--<p style="margin-left: 5px;" class="inst_name">MS1</p>--}}
                    {{--</div>--}}
                    {{--<div id="ins_lt2" class="port_inst" data-name="lt2">--}}
                    {{--<img src="/public/assets/icon/simulator/icon_motion.png" alt="some_text" width="32" height="32" class="icon_list">--}}

                    {{--<p style="margin-left: 5px;" class="inst_type">Sensor #2:</p>--}}

                    {{--<p style="margin-left: 5px;" class="inst_name">MS2</p>--}}
                    {{--</div>--}}
                </div>
            </div>
            <button id="simulate" type="button" title="Simulate the ladder logic">SIMULATE</button>
            <button id="stop_sim" type="button">STOP</button>
            <button id="open_data_sim" type="button" title="Open the data table">DATA TABLE</button>
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
            <h3>Math</h3>
            <ul class="icons ui-widget ui-helper-clearfix">
                <li class="tool-container">
                    <div class="toolcom" data-element-type="15">
                        <img src="/public/assets/icon/simulator/math_add.png" alt="some_text" width="32" height="32">
                    </div>
                </li>

                <li class="tool-container">
                    <div class="toolcom" data-element-type="16">
                        <img src="/public/assets/icon/simulator/math_sub.png" alt="some_text" width="32" height="32">
                    </div>
                </li>

                <li class="tool-container">
                    <div class="toolcom" data-element-type="17">
                        <img src="/public/assets/icon/simulator/math_mul.png" alt="some_text" width="32" height="32">
                    </div>
                </li>

                <li class="tool-container">
                    <div class="toolcom" data-element-type="18">
                        <img src="/public/assets/icon/simulator/math_div.png" alt="some_text" width="32" height="32">
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
        <script type="text/javascript" src="/public/assets/js/simulator/scenario/conveyor_room.js"></script>

    </div>
@stop

@section('submit-class')
m9_ex4_submit
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