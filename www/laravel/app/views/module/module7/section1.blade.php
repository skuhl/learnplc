<style>
	#m7_ex1_workspace{
		font: 150% "Trebuchet MS", sans-serif;
		text-align: center
	}


</style>

@extends('module.m5_template', array('submitStatus' => $submitstatus))

@section('title','Mechanical Sequencers')

@section('section-menu')
@include('module.module7.menu')
@stop

@section('lesson')
<div class="lesson-title">Mechanical Sequencers</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
            &nbsp &nbsp &nbsp Mechanical sequencers utilize a rotating drum that contains raised pegs in precise locations around the drum.
            When the drum rotates, these pegs contact normally open switches, which in turn energize specific components.
            By strategically placing these pegs and controlling the speed of the drum,
            an entire repetitive operation can be controlled with these so called drum switches by creating pre-programed “steps”.<br><br>

            &nbsp &nbsp &nbsp If you think about what is happening with the mechanical sequencer,
            the result of the pegs closing switches is simply adjusting the binary value of a word.
            The closed switches would represent a high value and the off switches a low value.<br><br>

		</p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise</div>
<div class="lesson-statement">
	<p>
		Check mechanical sequencers at the right side, and find out how they work. <br>
	</p>
</div>
@stop

@section('exercise')
    <div>
        <br><img src="/public/assets/img/module7/mechanical_sequencer.png" width="500"><br>

        <br><img src="/public/assets/img/module7/mechanical_sequencer_2.jpg" width="500"><br>
    </div>
@stop

@section('submit-class')
m7_ex1_submit
@stop

@section('additional_script')
<script>
    $(document).ready(function() {
        $('.radio').val('9999');
    });

    $("#trouble_btn").hide();



    $('.btn-radio').click(function() {
        $(this).parent().siblings().children().removeClass('active');
        $(this).addClass('active');
        $(this).parent().siblings('input').val($(this).attr('value'));
    });
</script>
@stop