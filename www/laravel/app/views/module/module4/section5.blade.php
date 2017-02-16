@extends('module.m4_template')

@section('title','Module-4-5')

@section('section-menu')
@include('module.module4.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<div class="lesson-title" style="width: 72%;"> Instruction addressing</div>
<div class="lesson-statement">
<p>
    In this section, you will learn PLC instruction addressing. In our simulation environment,
    this can be done by simple drag&drop I/O onto your ladder logic. However, it is important to know how real world PLC handles the instruction addressing.
    As an exercise, you will build a XOR gate using PLC ladder logic.
</p>

<h4> 1. Instruction addressing </h4>
<ul>
    <li>
        PLC stores the information about the status of all inputs and outputs and keeps track of this information
        using a specific addressing scheme. Depending on the generation of AB PLC the addressing scheme is different.
        PLC-5 and SLC 500 types of controllers use so called rack/slot-based scheme and ControlLogix family use
        tag-based addressing.
        Figure 2 shows the rack/slot-based scheme of addressing used in AB PLC-5 and SLC 500.<br>
        <img src="/public/assets/img/module4/module_4_3_img_2.png" width="400"
             style="display: block; margin-left: auto; margin-right: auto"><br>
        <h5 style="text-align:center">Figure 2: The rack/slot-based scheme of addressing used in AB PLC-5 and SLC
            500</h5><br><br>
        The file type, file #, element #, subelement #, and bit # are the representatives of memory addressing.
        Module type, slot #, extension for terminals 15 and up, and terminal # are real-world addressing elements
        <b>Module type</b> – identifies if an input or an output is addressed<br>
        <b>Slot #</b> - is a physical location of the I/O module within the rack<br>
        <b>Terminal #</b> - is a physical terminal number where the input or the output device is connected on the I/O
        module.<br><br>
    </li>
    <li>
        For example, I:2/7 addresses the input module in slot # 2 and physical terminal being # 7;
        O:5.1 addresses the output module in slot # 5 and the output wired to the terminal # 1.<br><br>

        Tags are the method for assigning and referencing memory locations in Allen Bradley ControlLogix5000
        controllers.
        The physical addresses such as N7:0 or F8:7 which use symbols to describe them are no longer needed.
        These have been replaced with tags which are a pure text based addressing scheme.<br><br>

        There are two tag classifications: base tags and alias for a tag.
        The base tag is a tag name that represents the process function and is assigned a data type appropriate for that
        function.<br><br>

        As an example: A mixing vessel on the north side of the plant might have a base tag name;
        North_Vessel_Mixer and if this tag is being used to turn on/off the mixer motor it would assign the data type
        Boolean (0 or 1).<br><br>

        An Alias For tag is another name for a base tag. I/O points are assigned to base tags using an Alias For to the
        I/O module point.<br><br>

        If the mixer motor controller is wired to an output module in slot 2, terminal 14, the I/O point would be
        assigned using an Alias For tag.
        Therefore, the base tag: North_Vessel_Mixer would be assigned an Alias For tag of: Local:2:O.Data.14<br><br>

        The form of a physical address in the AB ControlLogix processor is:<br><br>

        <p style="text-align: center"><b>Location:Slot:Type.Member.Bit</b></p><br><br>

        The Location specifies the network location for the data. Location is used if the I/O module is in the same rack as
        the processor module.
        An adapter name is used to identify a remote communication adapter such as a DeviceNET remote I/O block.<br><br>

        The Slot is the slot number the I/O module is plugged into.
        The slot is numbered with slot 0 being the first slot on the left side of the rack and continues counting up by
        1 going to the right.<br><br>

        The Type specifies one of four types of data: I for inputs, O for outputs, C for configuration, and S for
        status.<br><br>

        The Member specifies the type of data that the module can store.
        Digital (discrete) I/O modules use a DATA member. Analog I/O modules use a Channel Member (CH#)<br><br>

        The Bit number specifies a bit number for an internal instruction or a screw terminal for I/O modules.<br><br>

        Only two delimiters are used; Colons (:) and periods (dots)(.). If an address is a control-type tag,
        a (C) is placed at the end of the address to indicate that the tag is a controller scoped tag.<br><br>

        Example: If a base tag is assigned to a Stop Push Button to Process 2,
        that is wired to the input module in Slot 1, screw Terminal 2, and if this input module is in the same rack as
        the controller,
        the base tag might be:<br>

        <p style="text-align: center"><b>Process2_StopPB</b></p><br>

        And then it would be assigned an Alias For of:

        <p style="text-align: center"><b>Local:1:I.Data.2</b></p><br>
    </li>
</ul>

</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 4</div>
<div class="lesson-statement">
    <p>
        Build a XOR gate using the PLC ladder logic. The final result should be: <b>light #2</b> controlled by <b> switch #1 - XOR - switch #2</b>
    </p>
    <img src="/public/assets/img/module4/exercise_diagram/exercise_4_diagram.png" width="250" style="display: block; margin-left: auto; margin-right: auto">

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

    $(".submit").click(
        function () {
            m4_ex4_XOR();
        });


    $('.btn-radio').click(function () {
        $(this).parent().siblings().children().removeClass('active');
        $(this).addClass('active');
        $(this).parent().siblings('input').val($(this).attr('value'));
    });
</script>
@stop
