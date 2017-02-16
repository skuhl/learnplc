@extends('module.m4_template')

@section('title','Module-4-1')

@section('section-menu')
@include('module.module4.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<div class="lesson-title" style="width: 72%;">Simulator Tutorial</div>
<div class="lesson-statement">
	<p>
        This is a tutorial section for those who does not familiar with PLC ladder logic programming,
        during which we will build a simple logic together step by step.
	</p>

	<h4> 1. Windows and interface </h4>
	<ul>
		<li> Firstly, let’s get to know the interface.
            At the top there are two button which let you expand either the knowledge window or the PLC window.
            Go ahead click on them and see what they do.
            <br><img src="/public/assets/img/module4/two_side_switch.jpg" height="64"><br>
            <b><i>One suggestion: always expend the PLC window before you building any logic.</i></b>
            This will give you enough space to see all the components and your ladder logic clearly.<br><br>
            Now let’s look at the PLC window. On the left, you will find the tool panel, which contains all your ladder logic components.<br>
            <img src="/public/assets/img/module4/tool_panel.jpg" height="64"><br><br>
        </li>
		<li>
            On the right, you will see the ladder logic programming area.
            On the lower right corner, you will find the simulation window that has been minimized.
            Now click on the “expand” button to see the entire simulation window.<br>
            <img src="/public/assets/img/module4/sim_window.jpg" width="400"><br><br>

            In the simulation window, you will see two button: “simulate” that simulate your ladder logic program,
            and “minimize” helps you minimize the simulation window, so you can see the entire ladder logic.
            On the right you will see your input/output list. Hover your mouse over them,
            you will see where the corresponding objects are, in the scene.<br>
            <img src="/public/assets/img/module4/click_switch.jpg" height="64"><br>
            The inputs are clickable, now let’s click on them. Nothing is going to happen,
            because we are not simulating anything so far.<br>
		</li> 
	</ul>

	<h4> 2. Program your switch controlled light </h4>
	<ul>
		<li> Now let’s start drag &drop and build up the ladder logic. First lets drag and XIC component
            <img src="/public/assets/img/module4/XIC_icon.jpg" height="32">
            (don’t know what it is? Don’t worry, you will learn that from later material) and drop it in the ladder logic line.
            This is what you should get.<br>
            <img src="/public/assets/img/module4/tutorial_LL_1.jpg" height="120"><br><br>
        </li>
		<li>
            Now, we need to assign it an input/output.<br>
            Firstly, expand the simulation window. Drag the switch #1
            <img src="/public/assets/img/module4/tutorial_LL_2.jpg" height="50">
            and drop it onto the XIC component on the ladder logic.
            <img src="/public/assets/img/module4/tutorial_LL_3.jpg" height="70">
            This step assigns the switch #1 to the XIC component.<br>
            <img src="/public/assets/img/module4/tutorial_LL_4.jpg" height="120"><br>
            This is what you should get.
        </li>
        <li>
            Now let’s drag an OTE component and drop it behind XIC component.
            <img src="/public/assets/img/module4/tutorial_LL_5.jpg" height="32">
            Now your ladder logic should look like this.<br>
            <img src="/public/assets/img/module4/tutorial_LL_6.jpg" height="120"><br>
            Next, we need drag the light #1
            <img src="/public/assets/img/module4/tutorial_LL_7.jpg" width="90">
            and drop it onto the OTE component in the ladder logic line. This assign the light #1 to the OTE component.<br>
            <img src="/public/assets/img/module4/tutorial_LL_8.jpg" height="120"><br>
            This is the final ladder logic you should see. Congratulates, you just finished your ladder logic program.
        </li>
	</ul>
    <h4> 3.	Simulate and test your program </h4>
    <ul>
        <li>
            Now, expand the simulation window and click the “simulate” button.
            <img src="/public/assets/img/module4/click_simulate.jpg" height="32">
            This will simulate the ladder logic you just built on the 3D simulation window.
            Now, when you click on the switch #1 in the 3D scene, the light #1 (red light) will be turned on.
            Click switch #1 again to turn it off. Now, you can play around with the simulator.
            We highly encourage you to test all the other components and see what they does.
            You are ready to learn more about ladder logic programming.<br>
            <img src="/public/assets/img/module4/simulate_result.jpg" width="400"><br>
            Click the "Submit Answer" button and "continue" to the next section.
        </li>
    </ul>
</div>@stop

@section('instructions')
<div class="lesson-title">instruction</div>
<div class="lesson-statement">
	<p>
		If you are done with this tutorial, please click on "Submit Answer" and "continue" to go to the next section.
	</p>
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
                <div id="ins_sd1" class="port_inst" data-name="sd1">
                    <img src="/public/assets/icon/simulator/icon_sound.png" alt="some_text" width="32" height="32" class="icon_list">

                    <p style="margin-left: 5px;" class="inst_type">Sound Sensor:</p>

                    <p style="margin-left: 5px;" class="inst_name">SD1</p>
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
        <button id="exp_sim" type="button" title="Reopen the simulation window for information">EXPEND</button>
        <div id="mark_item"></div>
    </div>

    <div id="toolaccord">
        <h3>Bit Tool</h3>
        <ul id="icons" class="ui-widget ui-helper-clearfix">
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
        <ul></ul>
        <h3>I/O</h3>
        <ul></ul>
        <h3>Compare</h3>
        <ul></ul>

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

    $(".m4_ex_submit").button().click(function(){
        $.ajax({
            url: "{{URL::to('modules/submit/'.$sec->id)}}",
            type: "post",
            success: function(data) {
                $('#continue').show();
            }
        });
    });



	$('.btn-radio').click(function() {
		$(this).parent().siblings().children().removeClass('active');
    	$(this).addClass('active');
    	$(this).parent().siblings('input').val($(this).attr('value'));
	});
</script>
@stop
