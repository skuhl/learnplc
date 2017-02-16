<style>
    #m8_ex5_workspace{
        font: 150% "Trebuchet MS", sans-serif;
        text-align: center
    }


</style>

@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','Selectable Timed Interrupt')

@section('section-menu')
    @include('module.module8.menu')
@stop

@section('lesson')
    <div class="lesson-title">Other Program Control Instructions</div>
    <div class="lesson-statement">
        <div class="subsection">
            <h4>Selectable Timed Interrupt</h4>
            <p>
                &nbsp &nbsp &nbsp There are times when a system needs to perform a task in certain time intervals rather than be triggered by any one specific
                event occurring. Selectable timed interrupts allow for this exact operation.
                The STI instruction gives a programmer the ability to interrupt the scan to access a subroutine or other section of
                the program in a pre-determined time interval. The parameters for the selectable timed interrupt
                are entered into the associated word depending on the PLC manufacturer.<br><br>

                &nbsp &nbsp &nbsp If there is a section, or sections, of logic that you do not want to be interrupted,
                the selectable timed interrupt disable (STD) and the selectable timed interrupt enable (STE) can be used to create zones in which
                the interrupt will not occur. The STD instruction starts the disabled zone while the STE instruction is used to end the disabled zone,
                much like the MCR instruction previously learned.<br><br>
            </p>

            <h4>Fault Routine</h4>
            <p>
                &nbsp &nbsp &nbsp A fault routine is used in a program to allow for a proper shutdown of the system if a fault were to occur.
                This is accomplished by designating a subroutine that will be called if a fault occurs.
                If a fault is detected and there is no fault routine, the processor shuts down immediately.<br><br>

                &nbsp &nbsp &nbsp Two types of faults can occur: recoverable and non-recoverable.
                When a recoverable fault occurs, the fault routine is executed as it is written.
                If the fault is non-recoverable, the processor will scan the fault routine once and then shutdown accordingly.<br><br>
            </p>

            <h4>Temporary End and Suspend Instruction</h4>
            <p>
                &nbsp &nbsp &nbsp When troubleshooting a program, it can be difficult to sort through the entire code and determine where the issue occurs.
                Luckily there is a way to debug a code section by section. This is accomplished by utilizing the temporary end (TND) instruction.
                The TND instruction is an output instruction that ends the program when it is true and is read by the processor.<br><br>

                &nbsp &nbsp &nbsp For example, if the TND instruction is located at rung 25 of a code and is true,
                the processor will scan and execute the program as it normally would for rungs 0 to 25.
                When the program reaches the temporary end instruction, the execution halts.<br><br>

                &nbsp &nbsp &nbsp Using the TND instruction you can run sections of your program progressively,
                checking to make sure everything in that particular section works until the issue is found.<br><br>

                &nbsp &nbsp &nbsp Another instruction is available to better troubleshoot a program called the suspend instruction.
                This instruction behaves much like the temporary end instruction. However, each suspend instruction is given an ID.
                This ID is then writing to a PLC file and then can be read after the program halts to identify what suspend instruction
                caused the program scan to terminate.<br><br>

            </p>
        </div>
    </div>
@stop

@section('instructions')
    <div class="lesson-title">Exercise 5</div>
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
    m8_ex5_submit
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