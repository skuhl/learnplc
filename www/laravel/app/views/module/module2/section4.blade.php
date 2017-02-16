@extends('module.template')

@section('section-menu')
@include('module.module2.menu')
@stop

<?php $num = rand(21, 26); ?>

@section('lesson')
<div class="lesson-title">NOR and NAND Gates</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
			These gates combine the basic AND operation and OR operation with the NOT operation.
		</p>
		<p>
			The output for these gates may be found by simply determining the output of
			the basic operation and inverting it.
		</p>
		<p>
			Therefore, the truth tables for the NOR and NAND gates will show the complement 
			of the truth tables for the OR and AND gates.
		</p>
	</div>

	<div class="subsection">
		<h4>NOR Gate</h4>
		<p>
			The NOR gate is an inverted OR gate. An inversion "bubble" is placed at the output
			of the OR gate. 
		</p>
		<p>
			The NOR gate can be built from an OR gate followed by a NOT gate.
		</p>
		<p>
			The boolean expression is x = <span style="text-decoration: overline"> A + B </span>.
		</p>
		{{ HTML::image('public/assets/img/module2/section4/img1.jpg', 'img1', array('class' => "img-thumbnail"))}}
	</div>

	<div class="subsection">
		<h4>NAND Gate</h4>
		<p>
			The NAND gate is an inverted AND gate. An inversion "bubble" is placed at the output
			of the AND gate. 
		</p>
		<p>
			The NAND gate can be built from an AND gate followed by a NOT gate.
		</p>
		<p>
			The boolean expression is x = <span style="text-decoration: overline"> A•B </span>.
		</p>
		{{ HTML::image('public/assets/img/module2/section4/img2.jpg', 'img2', array('class' => "img-thumbnail"))}}
	</div>

	<div class="subsection">
		<h4>Entering Expressions</h4>
		<p> 
			There are no algebraic symbols for the NOR and NAND gates.
		</p>
		<p>
			Since the NOR and NAND gates are just inversions of their respective gates, they can
			be expressed algebraically by putting a bar over the AND or OR operation.
		</p>
		<p>
			To enter the equivalent expression, put the
			Boolean expression inside parentheses <kbd>(</kbd> <kbd>)</kbd> and precede that
			with an exclamation mark <kbd>!</kbd> .
		</p>
		<table class="table table-bordered text-center" id="student-progress-table" style="max-width:400px">
			<tbody style="background:#EDEDED">
				<tr>
					<td> NOR </td>
					<td> <span style="text-decoration: overline">A + B</span> </td>
					<td> &#8658 </td>
					<td> !(A + B) </td>
				</tr>
				<tr>
					<td> NAND </td>
					<td> <span style="text-decoration: overline">A • B </span> </td>
					<td> &#8658 </td>
					<td> !(A * B) </td>
				</tr>
			</tbody>
		</table>
	</div>

</div>
@stop

@section('instructions')
<div class="lesson-title">Excercise 4</div>
<div class="lesson-statement">
	<p>
		Evaluate the diagram in the exercise pane to the right and input the correct Boolean expression.
		You may check the expression as many times as you want before submitting your final answer.<br><br>
		After submitting your answer, continue to the next section.
	</p>
</div>
@stop

@section('exercise')
<div class='thumbnail' style="color:#FFFFFF">
	<div id="m2_expression_workspace" class="caption" style="color:#FFFFFF">
		<div id="dialog_space" class="subsection">
			<div class="">
				{{ HTML::image('public/assets/img/module2/section2/diagrams/c_'.$num.'.png', 'img3', array('class' => "img-thumbnail"))}}
			</div>
		</div>

		<div id="input_space">
			<div class="input-group" style="max-width:400px">
				<input type="text" class="form-control " id="expression_result" name="input_exp" value="">
				<span class="input-group-btn">
					<button  id="verify_button" class="verify_button btn btn-primary">Check Expression</button>
				</span>
			</div><br/><!-- /input-group -->

			<div id="input_panel" class="form-group">
				<button id="input_A" class="btn btn-default">A</button>
				<button id="input_B" class="btn btn-default">B</button>
				<button id="input_C" class="btn btn-default">C</button>
				<button id="input_D" class="btn btn-default">D</button>
				<button id="left_parenth" class="btn btn-default">(</button>
				<button id="right_parenth" class="btn btn-default">)</button>
				<button id="input_and" class="btn btn-default">AND</button>
				<button id="input_or" class="btn btn-default">OR</button>
				<button id="input_not" class="btn btn-default">NOT</button>
				<button id="input_backspace" class="btn btn-info"><b>DEL</b></button>
				<button id="input_clear" class="btn btn-info"><b>CLR</b></button>
			</div>
		</div>

		<h4 id="result_state">Result: </h4>
	</div>
</div>

<form id="exercise">
	<input type="hidden" name="crypt[0]"value="{{Crypt::encrypt('1'.uniqid())}}">
	<input id='answer'type="hidden" name="question[0]"value="0">
</form>
@stop

@section('additional_script')
	{{ HTML::script('/public/assets/js/lib/jquery.caret.js') }}
	{{ HTML::script('/public/assets/js/table_list.js') }}
	{{ HTML::script('/public/assets/js/m2_expression.js') }}
	<script type="text/javascript">
		var table_n = table_{{$num}}_num;
		var table_exp = table_{{$num}}_exp;

		function preSubmit() {
			$("#verify_button").click();
		}
	</script>
@stop