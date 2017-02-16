@extends('module.template', array('submitStatus' => $submitstatus))

@section('title','Numerical Representations')

@section('section-menu')
@include('module.module1.menu', array('completedSections' => $sections))
@stop

@section('lesson')
<div class="lesson-title">Numerical Representations</div>
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
<form id="exercise">
	<span id="lesson1">
		<div class="row">

			<?php
			$answers = array(1,0,0,0,1,1);
			for($i = 0; $i < 6; $i++) {
				$answers[$i] = Crypt::encrypt($answers[$i].uniqid());
			}

			$num = range(0, 5);
			shuffle($num);
			for($x=0; $x<6; $x++) { ?>
			<div class="col-lg-6">
				<div class="thumbnail" style='width: 400; height: 300px'>
					<!-- <img class="" alt="300x200" src="public/assets/img/300x200.png"> -->

					<style>
						img.center {
							display: block;
							margin-left: auto;
							margin-right: auto;
						}
					</style>

					<!-- <div style='width: 300px; height: 300px; text-align: center'> -->
					{{ HTML::image('public/assets/img/module1/section1/'.$num[$x].'.png', 'img', array('class' => 'center', 'style' => 'max-width: 300px; max-height: 200px')) }}
					<!-- </div> -->
					<div class="caption">
						<input type="hidden" name="crypt[{{$num[$x]}}]" value="{{$answers[$num[$x]]}}">
						<input class="radio" type="hidden" name="question[{{$num[$x]}}]" value="99999">
						<div class="btn-group btn-group-justified">
						  <div class="btn-group">
						    <button type="button" class="btn btn-primary btn-radio" value="0">Analog</button>
						  </div>
						  <div class="btn-group">
						    <button type="button" class="btn btn-primary btn-radio" value="1">Digital</button>
						  </div>
						</div>
						
						<div <?php echo "id=\"question".$num[$x]."\"" ;?>  style="height: 16px; font-size: 14px;">
							<div class="pull-right" style="color: rgb(255, 255, 255); margin-top: 2px;">
								<span class="label label-success">
									Correct! <span class="glyphicon glyphicon-info-sign"></span>
								</span>
								<span class="label label-danger">
									incorrect  <span class="glyphicon glyphicon-info-sign"></span>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php }
			?>
		</div>
	</span>
</form>
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
