@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','On-Delay/Off-Delay Timers')

@section('section-menu')
    @include('module.module5.menu')
@stop

@section('lesson')
    <div class="lesson-title">On-Delay/Off-Delay Timers</div>
    <div class="lesson-statement">
        <div class="subsection">
            <h4> <b>1. Timer On Delay</b></h4>
            <p>
                <br><img src="/public/assets/img/module5/section1/timers_ton.png" width="150"><br><br>

                &nbsp &nbsp &nbsp The timer on delay instruction begins timing when its input is true. The timer will time for the preset duration.
                While this timer is timing, both the enable bit and the timer-timing bit are true.<br><br>
                &nbsp &nbsp &nbsp Upon completion of the timing instruction (accumulated value is equal to the preset value),
                the done bit of the instruction becomes true. The enable bit remains true until the input of the timer instruction becomes false.<br><br>
                &nbsp &nbsp &nbsp As its name states, the timer on delay instruction is most commonly used when a delay is wanted from the time the instruction
                becomes true to another instruction becoming true, as in a time delay between a start button being pressed and a motor turning on.
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
            <br>

            <h4> <b>2. Timer Off Delay</b></h4>
            <p>
                <br><img src="/public/assets/img/module5/section1/timers_tof.png" width="150"><br><br>

                &nbsp &nbsp &nbsp The timer on delay instruction begins timing when its input transits from the true state to false.
                The timer will time for the preset duration. While this timer is timing, both the enable bit and the timer-timing bit are true.<br><br>

                Upon completion of the timing instruction (accumulated value is equal to the preset value), the done bit of the instruction becomes true.
                The enable bit remains true until the input of the timer instruction becomes false.<br><br>

                The timer off delay instruction is commonly used when the programmer desires a delay between two instructions becoming false.<br><br>

            </p><br>
        </div>

    </div>
@stop

@section('instructions')
    <div class="lesson-title">Exercise</div>
    <div class="lesson-statement">
        <p>
            &nbsp &nbsp &nbsp Ted wants <b>Button 1</b> to turn on <b>Light 1</b> when he pushes the button,<br>
            and  after 5 seconds, the <b>Light 1</b> turns off automatically. <br>
            Place the components in the correct configuration to accomplish this task.<br><br>

            &nbsp &nbsp &nbsp <b>Components Given:</b><br>
            <b>•	&nbsp 1 x Timer Off Delay</b> <br>
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
    m5_ex3_submit
@stop

@section('additional_script')
    <script>
        $(document).ready(function() {
            $('.radio').val('9999');
        });

//        $(".m5_ex3_submit").click(
//                function(){
//                    submit_post(1);
//                    $("#continue").show();
////            m4_ex1_AND();
//                });

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

                    var hint_body = $("<p>&nbsp &nbsp &nbsp Use the <b>'TOF'</b> instruction's <b>'Done Bit'</b> to control the light 1</p>");
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