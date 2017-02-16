@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Binary to Decimal Game')

@section('section-menu')
@include('module.module1.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<div class="lesson-title">Binary to Decimal Game</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
			Physical systems use quantities which must be manipulated arithmetically.
			Quantities may be represented numerically in either analog or digital form.
		</p>
	</div>

	<div class="subsection">
		<h4> Analog Representation </h4>
		<ul>
			<li> Varies over a continuous range of values. <i>i.e. real numbers.</i> </li>
			<li> 
				<i>Ex:</i> Sound through a microphone causes continuous voltage change.
				An automobile speedometer measures and displays the varying speed.
				Mercury in a thermometer varies over a range of values with respect to temperature.
			</li> 
		</ul>
	</div>

	<div class="subsection">
		<h4> Digital Representation </h4>
		<ul>
			<li> Varies in discrete steps. <i>i.e. countable numbers.</i> </li>
			<li> 
				<i>Ex:</i> Passing time is shown as a change in the display on a digital clock at one minute intervals. 
				A change in temperature is shown on a digital display only when the temperature changes by at least one degree.
			</li>
		</ul>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Exercise 1</div>
<div class="lesson-statement">
	<p>
		Take a look at the images to the right and decide whether each image depicts an analog or digital representation of the data.
	</p>
	<p>
		Remember, a digital representation will be presented in discrete steps or intervals, while
		an analog representation could be presented by any range of real numbers.
	</p>
</div>
@stop

@section('exercise')
    <p style="position: absolute; top:350px; left:500px; font-size: 300%">LOADING ...</p>
    <canvas id="BtoC_Game" width="800" height="600"></canvas>
    <script src="/public/assets/m1_game_1/libraries/quintus-all.js"></script>
    <script src="/public/assets/m1_game_1/javascript/components.js"></script>
    <script src="/public/assets/m1_game_1/javascript/problem.js"></script>
    <script src="/public/assets/m1_game_1/javascript/entities.js"></script>
    <script src="/public/assets/m1_game_1/javascript/scenes.js"></script>
    <script src="/public/assets/m1_game_1/javascript/ui.js"></script>
    <script src="/public/assets/m1_game_1/javascript/game.js"></script>
    <script src="/public/assets/m1_game_1/javascript/spawner.js"></script>
    <script src="/public/assets/m1_game_1/javascript/abilities.js"></script>
    <script src="/public/assets/m1_game_1/javascript/input.js"></script>
@stop

@section('additional_script')
<script type="text/JAVASCRIPT">
	$(document).ready(function() {
		$('.radio').val('9999');
	});

	$('.btn-radio').click(function() {
		$(this).parent().siblings().children().removeClass('active');
    	$(this).addClass('active');
    	$(this).parent().parent().siblings('.radio').val($(this).attr('value'));
	});
</script>
@stop
