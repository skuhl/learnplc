<style>
	#m7_ex2_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.m7_ex_template', array('submitStatus' => $submitstatus))

@section('title','Sequencer Instructions')

@section('section-menu')
@include('module.module7.menu')
@stop

@section('lesson')
<div class="lesson-title">Sequencer Instructions</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
            &nbsp &nbsp &nbsp In PLC programming, sequencer instructions operate in the same way as the mechanical sequencers but without the physical space requirements.
            Operations that are repeated day in and day out benefit from sequencer instructions because they allow the programmer to control multiple
            output conditions based solely on the pre-programmed steps in a single instruction. Some of these instructions that are available for use are:<br><br>

            &nbsp &nbsp &nbsp <b>•	SQO (Sequencer Output) –</b> An output instruction used to control output devices<br>

            &nbsp &nbsp &nbsp <b>•	SQI (Sequencer Input) –</b> An input instruction that compares bits from the determined input file to that of a source file.
            If all bits are equal, the instruction is true.<br>

            &nbsp &nbsp &nbsp <b>•	SQC (Sequencer Compare) –</b> An output instruction that compares bits from an input source file to that of the data words in a sequence file.
            If all the bits are the same, the control register is set to 1.<br>

            &nbsp &nbsp &nbsp <b>•	SQL (Sequencer Load) –</b> An output instruction that controls outputs by loading in data words in a sequence file in sequential order.<br><br>

            &nbsp &nbsp &nbsp While each of these sequencer instructions performs different tasks,
            they all share the same parameters that can be tailored to suit the program's unique needs.
            The figure shows a sequencer compare instruction simply for visualization of the parameters, which are:<br>

            {{--<br><img src="/public/assets/img/module7/mod7_sec2_2.jpg" height="120"><br>--}}

            &nbsp &nbsp &nbsp <b>•	File –</b> This parameter determines which file the sequencer instruction is reading from.
            Each word in this file represents a position, which starts at position 0. It is important to note that the indexed file indicator (#) must be used.<br>

            &nbsp &nbsp &nbsp <b>•	Mask –</b> A mask is used to determine which bits of the incoming word are passed to the destination.
            The bits of the incoming word are ANDed with the bits of the mask and then the result is passed to the destination.
            In other words, a 1 bit in the mask allows the data of that single bit to be read and a 0 blocks or masks,
            the data associated with that specific bit. This mask can be written in hexadecimal, noted by an h, or in binary, noted by a B.<br>

            &nbsp &nbsp &nbsp <b>•	Source –</b> The address of the input word or file where the SQC and SQL instruction obtains data for comparison to the sequencer file.<br>

            &nbsp &nbsp &nbsp <b>•	Destination –</b> The address of the output word or file.<br>

            &nbsp &nbsp &nbsp <b>•	Control –</b> The address that contains the control information for the instruction, such as the enable bit, the done bit and the error bit.<br>

            &nbsp &nbsp &nbsp <b>•	Length –</b> Determines the number of steps in the sequencer file.<br>

            &nbsp &nbsp &nbsp <b>•	Position –</b> Determines the starting step of the sequencer file.<br><br>

            &nbsp &nbsp &nbsp In order to better understand the use of a sequencer, let’s take a look at the below.<br><br>

            <br><img src="/public/assets/img/module7/mod7_sec2_2.jpg" height="270"><br><br>

            First thing to note is that we are only controlling outputs 0 to 3. Secondly, notice that the mask is set to 000Fh.
            This will allow the first four bits of the sequencer word to reach the output.<br><br>

            &nbsp &nbsp &nbsp During the first false-to-true transition, the start position will be passed through the mask.
            The second false-to-true transition will allow step one to pass through the mask to the output.
            This step energizes outputs 3 and 0, which is shown in green as binary ‘1’.
            Step 2 will energize outputs 2 and 1, while step 3 will energize outputs 3 and 1.
            It is easy to see that the sequencer can be used to sequentially control outputs in an efficient manner.<br><br>


        </p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise</div>
<div class="lesson-statement">
	<p>
		Complete the pre-build logic at the right side, by filling out values in the <b>SQO instruction</b> and <b>mask value</b>.<br><br>

        <b>GOAL:</b><br>
        Push Button 1st time: Light 1 turned on.<br>
        Push Button 2nd time: Light 2 turned on.<br>
        Push Button 3rd time: Both Light 1 and Light 2 turned on.<br>
        Push Button 4th time: Both Light 1 and Light 2 turned off.<br><br>
        Use the Button #1 to test the results.
	</p>
</div>
@stop

@section('exercise')
    <div id="m7_ex2_space">
        <div id="mod7_sec2_dash"></div>
        <div id="plc_sqc">

        </div>
        <div id="mod7_ote">
            <div id="ote_name">BT1</div>
            <img src="/public/assets/icon/simulator/OTE_LDL.png" height="32" width="32">
        </div>
        <div id="mod7_sec2_data">
            <h4>Output Table:</h4>
            <table id="mod7_sec2_output" class="mod7_table"></table>

            <h4>Mask:</h4>
            <table id="mod7_sec2_mask" class="mod7_table"></table>

            <p id="mask_hex">:</p>

            <h4>Binary Table:</h4>
            <table id="mod7_sec2_binary" class="mod7_table"></table>

            <img id="arrow_up_1" src="/public/assets/img/module7/green_arrow_up.png" height="50" width="50">
            <img id="arrow_up_2" src="/public/assets/img/module7/green_arrow_up.png" height="50" width="50">
            <img id="arrow_right" src="/public/assets/img/module7/green_arrow_right.png" height="30" width="30">
        </div>

        <div id="sim_space">
            <!--<img id="wire_img" src="images/wire_img.png" width="400">-->
            <button id="mod7_sec2_button_1">BT1</button>
            <p id="light_1_title">Light 1: <b>LT1</b></p>
            <img id="red_light" src="/public/assets/img/module7/light_bulb_white.png" height="100" width="100">
            <p id="light_2_title">Light 2: <b>LT2</b></p>
            <img id="yellow_light" src="/public/assets/img/module7/light_bulb_white.png" height="100" width="100">


        </div>
    </div>

    <script type="text/javascript" src="/public/assets/js/simulator/m7_ex/mod7_sec2.js"></script>
@stop

@section('submit-class')
m7_ex2_submit
@stop

@section('additional_script')
<script>
    $(document).ready(function() {
        $('.radio').val('9999');
    });

//    $(".m7_ex2_submit").click(
//            function(){
//                submit_post(1);
//                $("#continue").show();
////            m4_ex1_AND();
//            });

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