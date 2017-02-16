@extends('module.template')

@section('section-menu')
@include('module.module2.menu')
@stop

@section('lesson')
<div class="lesson-title">Evaluating Logic Circuit Outputs</div>
<div class="lesson-statement">
	<div class="subsection">
		The three basic Boolean operations (OR, AND, NOT) can describe any logic circuit.
		Below we will discuss some common methods to interpret logic circuits and evaluate their output.
	</div>

	
	<div class="subsection">
		<h4> Describing Logic Circuits Algebraically </h4>
		<p>
			If an expression contains both AND gates and OR gates the AND operation will be performed 
			first, unless there is a parenthesis around the OR expression.
		</p>
		{{ HTML::image('public/assets/img/module2/section2/img1.jpg', 'img1', array('class' => "img-thumbnail"))}} <br><br>
		{{ HTML::image('public/assets/img/module2/section2/img2.jpg', 'img2', array('class' => "img-thumbnail"))}}
		
		<br><br>
		<p>
			The output of an inverter is equivalent to the input with a bar over it. 
			Input A through an inverter is span <span style="text-decoration: overline">A</span>.
		</p>
		{{ HTML::image('public/assets/img/module2/section2/img3.jpg', 'img3', array('class' => "img-thumbnail"))}}
	</div>

	<div class="subsection">
		<h4> Evaluating Boolean Expressions </h4>
		<p>
			Once you have come up with an algebraic expression for the circuit diagram, you need to be able to
			evaluate the expression to produce an output.
		</p>
		<p>
			Evaluate the expression by substituting in the input values then performing the indicated operation.
		</p>

		Use the following rules to evalute each operation in the correct order.
		<ul>
			<li> Perform all inversions of single terms. </li>
			<li> Perform all operations within parenthesis. </li>
			<li> Perform an AND operation before an OR operation unless parenthesis indicates otherwise.</li>
			<li> 
				If an expression has a bar over it, perform the operations inside the expression 
				and then invert the result.
			</li>
		</ul>
	</div>

	<div class="subsection">
		<h4> Evaluating a Circuit Diagram </h4>
		<p>
			Output logic levels can also be determined directly from a circuit diagram without using the Boolean expression.
		</p>
		<p>
			Start from the input and proceed through each gate, writing down the corresponding output until the final output is reached.
		</p>
		{{ HTML::image('public/assets/img/module2/section2/img4.jpg', 'img4', array('class' => "img-thumbnail"))}}
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Excercise 2</div>
<div class="lesson-statement">
	<p>
		Review the truth table exercises to the right then press 'Continue' to go to the next section.
	</p>
</div>
@stop

@section('exercise')
<div class='thumbnail'>
	<div class="caption" style="color:#FFFFFF">
		<div class="subsection">
			<h4> Evaluating using a Truth Table </h4>
			<p>
				A truth table can be used for not only evaluting output for a certain input configuration, but
				for all possible input configurations.
			</p>

			<p>
				First we need to have an algebraic expression for the circuit. <br>
				Lets use the circuit diagram we used in 'Evaluating a Circuit Diagram'.
			</p>
			<p>
				To build the expression, we can use a method similar to the one used to evaluate the output. <br>
				Start from each input and proceed through each gate. However, instead of writing down each
				output, we will instead write the resulting algebraic expression. We do this until we get the final
				Boolean expression.
			</p>
			{{ HTML::image('public/assets/img/module2/section2/img5.jpg', 'img5', array('class' => "img-thumbnail"))}}
		</div>
		<div class="subsection">
			<p> 
				Once we have the Boolean expression, we can construct the truth table.
				You should have 4 input columns and 1 final output column. The number of rows, recall from section 1, will be 2<sup>4</sup> = 16.
			</p>
			<p>
				You may also have columns for intermediate expressions. These can prove useful when 
				evaluating more complex expressions.
			</p>
			<p>
				First fill in the input columns with all the different input configurations. <br>
				Then evaluate the expressions in each column until you reach the final expression.
			</p>

			<table class="table-condensed table-bordered text-center" style="margin-left:20px; color:#000000">
				<thead style="background:#EEEEEE">
					<tr>
						<th> A </th>
						<th> B </th>
						<th> C </th>
						<th> D </th>
						<th> &nbsp; </th>
						<th> <span style="text-decoration: overline">A</span>  </th>
						<th> &nbsp; </th>
						<th> <span style="text-decoration: overline">A</span> • B • C </th>
						<th> &nbsp; </th>
						<th> A + D </th>
						<th> &nbsp; </th>
						<th> <span style="text-decoration: overline"> A + D </span> </th>
						<th> &nbsp; </th>
						<th> X = (<span style="text-decoration: overline">A</span> • B • C) • (<span style="text-decoration: overline"> A + D </span>)</th>
					</tr>
				</thead>
				<tbody style="background:#FFFFFF">
					<tr>
						<td>0</td> <td>0</td> <td>0</td> <td>0</td> <td></td> <td>1</td> <td></td>
						<td>0</td> <td></td> <td>0</td> <td></td> <td>1</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>0</td> <td>0</td> <td>0</td> <td>1</td> <td></td> <td>1</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>0</td> <td>0</td> <td>1</td> <td>0</td> <td></td> <td>1</td> <td></td>
						<td>0</td> <td></td> <td>0</td> <td></td> <td>1</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>0</td> <td>0</td> <td>1</td> <td>1</td> <td></td> <td>1</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>0</td> <td>1</td> <td>0</td> <td>0</td> <td></td> <td>1</td> <td></td>
						<td>0</td> <td></td> <td>0</td> <td></td> <td>1</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>0</td> <td>1</td> <td>0</td> <td>1</td> <td></td> <td>1</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr style="background:#DFF0D8">
						<td>0</td> <td>1</td> <td>1</td> <td>0</td> <td></td> <td>1</td> <td></td>
						<td>1</td> <td></td> <td>0</td> <td></td> <td>1</td> <td></td> <td>1</td>
					</tr>
					<tr>
						<td>0</td> <td>1</td> <td>1</td> <td>1</td> <td></td> <td>1</td> <td></td>
						<td>1</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>1</td> <td>0</td> <td>0</td> <td>0</td> <td></td> <td>0</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>1</td> <td>0</td> <td>0</td> <td>1</td> <td></td> <td>0</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>1</td> <td>0</td> <td>1</td> <td>0</td> <td></td> <td>0</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>1</td> <td>0</td> <td>1</td> <td>1</td> <td></td> <td>0</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>1</td> <td>1</td> <td>0</td> <td>0</td> <td></td> <td>0</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>1</td> <td>1</td> <td>0</td> <td>1</td> <td></td> <td>0</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>1</td> <td>1</td> <td>1</td> <td>0</td> <td></td> <td>0</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
					<tr>
						<td>1</td> <td>1</td> <td>1</td> <td>1</td> <td></td> <td>0</td> <td></td>
						<td>0</td> <td></td> <td>1</td> <td></td> <td>0</td> <td></td> <td>0</td>
					</tr>
				</tbody>
			</table>

			<br><br>

			As you can see from the truth table, the circuit will only produce an output of 1 when A = 0, B = 1, C = 1, and D = 0.

		</div>

	</div>
</div>
@stop

@include('module.only_continue_fix')