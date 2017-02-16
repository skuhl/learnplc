<style>
    #m9_ex5_workspace{
        font: 150% "Trebuchet MS", sans-serif;
        text-align: center
    }


</style>

@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','Other Word-Level Math Instructions ')

@section('section-menu')
    @include('module.module9.menu')
@stop

@section('lesson')
    <div class="lesson-title">Other Word-Level Math Instructions </div>
    <div class="lesson-statement">
        <div class="subsection">
            <p>
                &nbsp &nbsp &nbsp While most of the necessary arithmetic operations needed in a plant process can be performed using the <b>addition,
                multiplication, subtraction, and division instructions</b>, there are other <b>word-level instructions</b> that can be utilized.<br><br>

                &nbsp &nbsp &nbsp One of these instructions is the square root <b>(SQR)</b> function.
                The <b>SQR</b> function calculates the square root of the value determined by the memory
                location assigned to <b>Source A</b> and stores the result in the memory location assigned to the parameter Destination.<br><br>

                &nbsp &nbsp &nbsp Another word-level math instruction that is available for use is the negate <b>(NEG) instruction</b>.
                The <b>NEG instruction</b> simply changes the sign value stored in the memory location allocated to <b>Source A</b>
                and stores the result in the memory location determined by the Destination parameter.
                For example if the value 54 is assigned to <b>Source A</b>, the output would be -54.<br><br>

                &nbsp &nbsp &nbsp The clear <b>(CLR) instruction</b> simply clears all bits of the word assigned to Destination. The resultant output is zero.<br><br>

                &nbsp &nbsp &nbsp Using a convert to<b> BCD (TOD) instruction</b>, the programmer has the ability to take a 16-bit integer and convert it into binary coded decimal,
                or BCD. This feature is very useful for displays and being able to easily comprehend the data that is being read. Inversely,
                the convert from <b>BCD (FRD)</b> allows the programmer to convert back from <b>BCD</b> to integer values.<br><br>

                &nbsp &nbsp &nbsp Finally, the scale data <b>(SCL) instruction</b> allows the programmer to scale data that is either very large or very small by some scale factor.
                The actual number is either multiplied or divided by this scale factor in order to make the number more understandable.
                For example, if a data value was in the 100s and the operator only wanted to see a single digit number,
                the programmer could scale the value by dividing by 100.<br><br>
            </p>
        </div>
    </div>
@stop

@section('instructions')
    <div class="lesson-title">Exercise 1</div>
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
    m9_ex5_submit
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