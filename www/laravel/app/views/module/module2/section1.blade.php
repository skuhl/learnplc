@extends('module.template')

@section('section-menu')
@include('module.module2.menu')
@stop

@section('lesson')
<div class="lesson-title" >Introduction to Logic Gates</div>
<div class="lesson-statement">
	<div class="subsection">
		In this module we will study the ways of describing how systems using binary logic
		levels to make decisions.
	</div>

	<div class="subsection">
		<h4> Boolean Algebra </h4>
		<p>
			Boolean algebra is an important tool in describing, analyzing, designing, and
			implementing digital circuits.
		</p>
		<ul>
			<li> Boolean algebra allows only two values: 0 and 1. </li>
			<li> Logic 0 can mean: false, off, low, no, open switch. </li>
			<li> Logic 1 can mean: true, on, high, yes, closed switch. </li>
			<li> There are three basic logic operations: OR, AND and NOT. </li>
		</ul>
	</div>

	<div class="subsection">
		<h4> Truth Tables </h4>
		<p>
			A truth table describes the relationship between the input and output of a logic circuit. 
			The table is composed of one column for each input variable and one column for the output of the logical operation.
		</p>
		<p>
			Each row contains one possible configuration of O's and 1's that the input variables could take. 
			In this way the the number of entries corresponds to the number of inputs. 
			For example a 2 input table would have 2<sup>2</sup> or 4 entries. A 3 input table would have 2<sup>3</sup> or 8 entries. 
		</p>
		<p>
			Example of a truth table and circuit diagram of an undefined operation.
			{{ HTML::image('public/assets/img/module2/section1/img1.jpg', 'img1', array('class' => "img-thumbnail", 'style' => "margin-left:10px; max-height:150px"))}}
		</p>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Excercise 1</div>
<div class="lesson-statement">
	<p>
		Study the three basic logical operations and their corresponding gates on the right. <br>
		Then continue to the next section.
	</p>
</div>
@stop

@section('exercise')
<div class='thumbnail'>
	<div class="caption" style="color: #FFFFFF">
	    <h3 style="margin-top:0"> OR, AND, and NOT Gates </h3>

		<div class="subsection">
			<h4> OR Operation </h4>
			The Boolean expression for the OR operation is X=A+B
			<ul>
				<li> This is read as â€œx equals A or B.â€� </li>
				<li> X will equal 1 when A or B equals 1. </li>
				<li> 
					The OR operation is similar to addition but where A and B are 1, the OR operation
					produces 1+1 = 1.
				</li>
				<li> Note that evaluation of the expression stops once a 1 is found. This means that, though counterintuitive, a statement with two 1 inputs will evaluate to true as well. 
			</ul>

			Truth table and circuit symbol for a two input OR gate.
			{{ HTML::image('public/assets/img/module2/section1/or_gate.jpg', 'OrGate', array('class' => "img-thumbnail", 'style' => "margin-left:25px; max-height:150px"))}}
		</div>

		<div class="subsection">
			<h4> AND Operation </h4>
			The Boolean expression for the AND operation is X=Aâ€¢B.
			<ul>
				<li> This is read as â€œx equals A and B.â€� </li>
				<li> X will equal 1 when A and B equal 1. </li>
				<li> 
					The AND operation is similar to multiplication. The AND operation produces 1 only when A and B are 1.
				</li>
			</ul>

			Truth table and circuit symbol for a two input AND gate. 
			Notice the difference between OR and AND gates.
			{{ HTML::image('public/assets/img/module2/section1/and_gate.jpg', 'ANDGate', array('class' => "img-thumbnail", 'style' => "margin-left:25px; max-height:150px"))}}
		</div>

		<div class="subsection">
			<h4> NOT Operation </h4>
			The Boolean expression for the NOT operation is X = <span style="text-decoration: overline">A</span>.
			<br>This can be read as:
			<ul>
				<li> X equals NOT A, or </li>
				<li> X equals the inverse of A, or </li>
				<li> X equals the complement of A. </li>
			</ul>

			Truth table, symbol, and sample waveform for the NOT circuit.
			{{ HTML::image('public/assets/img/module2/section1/not_gate.jpg', 'NOTGate', array('class' => "img-thumbnail", 'style' => "margin-left:25px; max-height:150px"))}}
		</div>
	</div>
</div>
@stop

@include('module.only_continue_fix')