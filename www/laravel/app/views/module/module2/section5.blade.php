@extends('module.template')

@section('section-menu')
@include('module.module2.menu')
@stop

<?php $num = rand(13, 20); ?>

@section('lesson')
<div class="lesson-title">XOR and XNOR Gates</div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
			The exclusive OR, abbreviated XOR, produces a High(1) output whenever the
			two inputs are at opposite levels.
		</p>
		<p>
			The exclusive NOR, abbreviated XNOR, produces a High(1) output whenever the
			two inputs are at the same level.
		</p>
		<p>
			In other words, the XOR and XNOR outputs are opposite. This means the 
			truth tables for the XOR and XNOR will be complements of each other.
		</p>
	</div>

	<div class="subsection">
		<h4>XOR Gate</h4>
		<p>
			The XOR gate is similar to an OR gate, except that while the OR gate produces
			a High(1) output when either or both inputs are High(1), the XOR produces a High(1)
			output when either but not both inputs are High(1), hence the <i>exclusive</i> part in the name.
		</p>
		<p>
			The Boolean expression is x = A &#8853; B. <br>
		</p>
		{{ HTML::image('public/assets/img/module2/section4/img3.jpg', 'img3', array('class' => "img-thumbnail"))}}
		<br><br>
		<p>
			The XOR gate can be built from a combination of OR, AND and NOT gates.
		</p>
		<p>
			The equivalent expression would be x = 
			<span style="text-decoration: overline">A</span>•B + A•<span style="text-decoration: overline">B</span>.
		</p>
		{{ HTML::image('public/assets/img/module2/section4/img4.jpg', 'img4', array('class' => "img-thumbnail"))}}
	</div>

	<div class="subsection">
		<h4>XNOR Gate</h4>
		<p>
			The XNOR is an inverted XOR gate. An inversion "bubble" is placed at the output
			of the XOR gate.
		</p>
		<p>
			The Boolean expression is x = <span style="text-decoration: overline"> A &#8853; B </span>.
		</p>
		{{ HTML::image('public/assets/img/module2/section4/img5.jpg', 'img5', array('class' => "img-thumbnail"))}}
		<br><br>
		<p>
			The XNOR gate can be built from a combination of OR, AND, and NOT gates.
		</p>
		<p>
			The equivalent expression would be x = 
			A•B + <span style="text-decoration: overline">A</span>•<span style="text-decoration: overline">B</span>.
		</p>
		{{ HTML::image('public/assets/img/module2/section4/img6.jpg', 'img6', array('class' => "img-thumbnail"))}}
	</div>

	<div class="subsection">
		<h4>Entering Expressions</h4>
		<p> 
			To enter the XOR operation, use the caret sign <kbd>^</kbd> to represent the XOR symbol &#8853;.
		</p>
		<p>
			The XNOR does not have an algebraic symbol. Since it is an inversion of XOR operation, 
			a bar over an XOR operation represents an XNOR operation.
		</p>
		<p>
			To enter the XNOR operation for the exercise on the left, put the XOR expression inside
			of parentheses <kbd>(</kbd> <kbd>)</kbd> and precede that with an exclamation mark <kbd>!</kbd> .
		</p>
		<table class="table table-bordered text-center" id="student-progress-table" style="max-width:400px">
			<tbody style="background:#EDEDED">
				<tr>
					<td> XOR </td>
					<td> A &#8853; B </td>
					<td> &#8658 </td>
					<td> A ^ B </td>
				</tr>
				<tr>
					<td> XNOR </td>
					<td> <span style="text-decoration: overline"> A &#8853; B </span> </td>
					<td> &#8658 </td>
					<td> !(A ^ B) </td>
				</tr>
			</tbody>
		</table>
	</div>
	
</div>
@stop

@section('instructions')
<div class="lesson-title">Excercise 5</div>
<div class="lesson-statement">
	<p>
		Evaluate the diagram in the exercise pane to the right and input the correct Boolean expression.
		You may check the expression as many times as you want before submitting your final answer.<br><br>
		After submitting, press 'Continue' to complete the section.
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
				<button id="input_xor" class="btn btn-default">XOR</button>
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