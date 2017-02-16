@extends('module.template')

@section('title','Digital and Analog Systems')

@section('section-menu')
@include('module.module1.menu')
@stop

@section('lesson')
<div class="lesson-title"> Digital and Analog Systems </div>
<div class="lesson-statement">
	<div class="subsection">
		<h4> Digital System:</h4>
		<ul>
			<li> A combination of devices that manipulate values represented in digital form. </li>
		</ul>

		<h4> Analog System </h4>
		<ul>
			<li> A combination of devices that manipulate values represented in analog form. </li>
		</ul>
	</div>

	<div class="subsection">
		<p>
			This course focuses on tools and concepts that will prepare you to work with digital systems. 
		</p>
		<p>
			However, the real world is analog. To take advantage of digital systems when dealing with 
			analog input, the analog signal must be converted to a digital form. 
		</p>
		<p>
			Following are the steps taken by a digital system when dealing with analog input.
		</p>
		<ul>
			<li> Convert the physical variable to an electrical signal (analog). </li>
			<li> Convert the electrical analog signal to a digital form (ADC). </li>
			<li> Process the digital information. </li>
			<li> Convert the digital output to real-world analog form (DAC). </li>
		</ul>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Excercise 2</div>
<div class="lesson-statement">
	<p>
		Review the graphs to the right which demonstrate how analog signals can be roughly translated to a digital imitation, then continue.
	</p>
</div>
@stop

@section('exercise')
<div class='thumbnail' style="max-width: 710px;; max-height: 210px; text-align: center; margin-left: 20px">
	<p>{{ HTML::image('public/assets/img/module1/section2/graph1.png')}}</p>
</div>
<div class='thumbnail' style="max-width: 510px; max-height: 290px; text-align: center; margin-left: 20px">
	<p>{{ HTML::image('public/assets/img/module1/section2/graph2.png', '', array('width' => 500))}}</p>
</div>
@stop

@include('module.only_continue_fix')