<style>
	#m7_ex4_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.m7_ex_template', array('submitStatus' => $submitstatus))

@section('title','Bit and Word Shift Registers')

@section('section-menu')
@include('module.module7.menu')
@stop

@section('lesson')
<div class="lesson-title">Bit and Word Shift Registers</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
            &nbsp &nbsp &nbsp Bit shift registers allows manipulation of the individual bits within a word.
            The bit or group of bits are moved serially from one bit to another.
            This is a great tool for a program to be able to track the position of parts on a production line.
            A part, represented by a binary ‘1’ can “move” through the bits of a word and that information can later be used for further operations.<br><br>

            &nbsp &nbsp &nbsp The two instructions used to shift bits are:<br><br>
            &nbsp &nbsp &nbsp <b>•	Bit Shift Left (BSL) –</b> Shifts a bit or group of bits from the least significant bit to the most (or from right to left).<br>
            &nbsp &nbsp &nbsp <b>•	Bit Shift Right (BSR) -</b> Shifts a bit or group of bits from the most significant bit to the least (or from left to right).<br><br>

            &nbsp &nbsp &nbsp As shown in figure 3, the BSL and BSR instructions have parameters associated with them. These parameters are:<br><br>

            &nbsp &nbsp &nbsp <b>•	File –</b> Determines the address of the bit array that is to be manipulated.
            The address must start with a # sign and at bit 0 of the first word or element.<br>
            &nbsp &nbsp &nbsp <b>•	Control –</b> A unique address containing the control bits for that particular instruction.<br>
            &nbsp &nbsp &nbsp <b>•	Bit Address –</b> The address of the source bit that is to be shifted into the array.<br>
            &nbsp &nbsp &nbsp <b>•	Length –</b> How many bits that are to be shifted.<br><br>

            Like many other instructions, there are also bits associated with the status of the bit shifting instructions. These are as follows:<br><br>
            &nbsp &nbsp &nbsp <b>•	Enable Bit (EN) –</b> Is set to 1 when the instruction is true.<br>
            &nbsp &nbsp &nbsp <b>•	Done Bit (DN) –</b> Is set to 1 when the instruction is completed.<br>
            &nbsp &nbsp &nbsp <b>•	Error Bit (ER) –</b> Is set to 1 when an error is detected.<br>
            &nbsp &nbsp &nbsp <b>•	Unload Bit (UL) –</b> Is controlled by the shifting of the last bit of the word that is shifted out of the array.<br><br>

        </p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 4</div>
<div class="lesson-statement">
	<p>
		Go through the example at the right side, and make sure you understand how <b>BSL / BSR</b> works.
	</p>
</div>
@stop

@section('exercise')
    <div id="m7_ex4_space">
        <div id="mod7_sec4_dash"></div>
        <div id="plc_bsl">

        </div>
        <div id="mod7_sec4_ote">
            <div id="sec4_ote_name">Button</div>
            <img src="/public/assets/icon/simulator/OTE_LDL.png" height="32" width="32">
        </div>

        <div id="mod7_sec4_data">
            <h4>Sensor value:</h4>
            <div id="sensor_val"></div>

            <img id="arrow_up_down" src="/public/assets/img/module7/up_down_arrow.png" height="95" width="50">

            <h4>Binary Table:</h4>
            <table id="mod7_sec4_binary" class="mod7_table"></table>

            <img id="arrow_left_right" src="/public/assets/img/module7/left_right_arrow.png" height="20" width="450">

            <button id="mod7_sec4_button_1">BUTTON</button>
        </div>

        <div id="bottle_exp">
            <img src="/public/assets/img/module7/bottle_exp/bottle_line_1.png" width="550">
            <h4 id="bottle_line_text">
                Now, think about how this instruction can help us select the empty bottle along the assembling line.
            </h4>
        </div>
    </div>
        {{--<div id="mod7_sec2_data">--}}
            {{--<h4>Output Table:</h4>--}}
            {{--<table id="mod7_sec2_output" class="mod7_table"></table>--}}

            {{--<h4>Mask:</h4>--}}
            {{--<table id="mod7_sec2_mask" class="mod7_table"></table>--}}

            {{--<p id="mask_hex">:</p>--}}

            {{--<h4>Binary Table:</h4>--}}
            {{--<table id="mod7_sec2_binary" class="mod7_table"></table>--}}

            {{--<img id="arrow_up_1" src="/public/assets/img/module7/green_arrow_up.png" height="50" width="50">--}}
            {{--<img id="arrow_up_2" src="/public/assets/img/module7/green_arrow_up.png" height="50" width="50">--}}
            {{--<img id="arrow_right" src="/public/assets/img/module7/green_arrow_right.png" height="30" width="30">--}}
        {{--</div>--}}

        {{--<div id="sim_space">--}}
            {{--<!--<img id="wire_img" src="images/wire_img.png" width="400">-->--}}
            {{--<button id="mod7_sec2_button_1">BT1</button>--}}
            {{--<p id="light_1_title">Light 1: <b>LT1</b></p>--}}
            {{--<img id="red_light" src="/public/assets/img/module7/light_bulb_white.png" height="100" width="100">--}}
            {{--<p id="light_2_title">Light 2: <b>LT2</b></p>--}}
            {{--<img id="yellow_light" src="/public/assets/img/module7/light_bulb_white.png" height="100" width="100">--}}


        {{--</div>--}}

    <script type="text/javascript" src="/public/assets/js/simulator/m7_ex/mod7_sec4.js"></script>
@stop

@section('submit-class')
m7_ex4_submit
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