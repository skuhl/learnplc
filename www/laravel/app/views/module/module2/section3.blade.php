@extends('module.template')

@section('section-menu')
@include('module.module2.menu')
@stop

<?php $num = rand(7, 12); ?>

@section('lesson')
<div class="lesson-title">Boolean Expressions</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
			Now that you've learned about the three basic logic gates and how to evaluate logic circuits,
			lets put that knowledge to use.
		</p>
	</div>

	<div class="subsection">
		<h4>Entering operators</h4>
		You may use the following symbols to represent each logical operator or you may use the provided controls
		to enter the expression.
		<table class="table table-bordered text-center" id="student-progress-table" style="max-width:400px">
			<tbody style="background:#EDEDED">
				<tr>
					<td> OR </td> <td> <kbd>+</kbd> </td>
				</tr>
				<tr>
					<td> AND </td> <td> <kbd>*</kbd> </td>
				</tr>
				<tr>
					<td> NOT </td> <td> <kbd>!</kbd> </td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="subsection">
		<h4>Entering the NOT operator</h4>
		<p> 
			To enter an inversion (NOT), place an exclamation mark <kbd>!</kbd> in front of the variable to be inverted.
		</p>
		<p>
			If an inversion of an expression is needed, place expression inside of parentheses <kbd>(</kbd> <kbd>)</kbd> .
		</p>
		<table class="table table-bordered text-center" id="student-progress-table" style="max-width:400px">
			<tbody style="background:#EDEDED">
				<tr>
					<td> <span style="text-decoration: overline">A</span> </td>
					<td> &#8658 </td>
					<td> !A </td>
				</tr>
				<tr>
					<td> <span style="text-decoration: overline">A + B </span> </td>
					<td> &#8658 </td>
					<td> !(A + B) </td>
				</tr>
			</tbody>
		</table>

	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Excercise 3</div>
<div class="lesson-statement">
	<p>
		Evaluate the diagram in the exercise pane to the right and input the correct boolean expression.
		You may check the expression as many times as you want before submitting your final answer.

		<br><br>

		After submitting, continue to the next section.
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
					<button id="verify_button" class="verify_button btn btn-primary">Check Expression</button>
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
	<input id='answer' type="hidden" name="question[0]" value="0">
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