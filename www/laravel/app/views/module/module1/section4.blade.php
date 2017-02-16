@extends('module.template')

@section('title','Binary and Decimal Conversion')

@section('section-menu')
@include('module.module1.menu')
@stop

@section('lesson')
<div class="lesson-title"> Binary to Decimal Conversion </div>
<div class="lesson-statement">
	<div class="subsection">
		<p>
			Since different number systems may be present in a system, it is important to understand
			how to convert between them. Below are some of the methods used to convert between
			binary and decimal numbers.
		</p>
	</div>

	<h3 style="margin-left:-10px"> Binary to Decimal Conversion </h3>
	<div class="subsection">
		<p>
			A decimal equivalent can be obtained by <b>summing the weight</b> of each position that contains a bit of <b>1</b>.
		</p>
		<table border="1" align="center" class="table table-less-padding table-borderless bg-warning" style="max-width:550px">
			<tbody>
				<tr align="center">
					<td align="right"><b>Binary:</b></td>
					<td> 0 </td>
					<td> 0 </td>
					<td> 1 </td>
					<td> 0 </td>
					<td> 0 </td>
					<td> 1 </td>
					<td> 0 </td>
					<td> 1 </td>
					<td> &nbsp; </td>
					<td align="left"> <b>Decimal</b> </td>
				</tr>
				<tr align="center">
					<td align="right"><b>Power:</b></td>
					<td>2<sup>7</sup></td>
					<td>2<sup>6</sup></td>
					<td>2<sup>5</sup></td>
					<td>2<sup>4</sup></td>
					<td>2<sup>3</sup></td>
					<td>2<sup>2</sup></td>
					<td>2<sup>1</sup></td>
					<td>2<sup>0</sup></td>
					<td></td>
					<td align="left"> </td>
				</tr>
				<tr align="center">
					<td colspan="3"></td>
					<td>32</td>
					<td colspan="2">+</td>
					<td>4</td>
					<td>+</td>
					<td>1</td>
					<td>=</td>
					<td align="left">37<sub>10</sub></td>
				</tr>
			</tbody>
		</table>
	</div>

	<h3 style="margin-left:-10px"> Decimal to Binary Conversion </h3>
	<div class="subsection">
		<h4> Method 1: &nbsp; Descending Powers of Two </h4>
			<p> We start by comparing each <b>power of 2</b> to the decimal number in descending order. </p>
			<p> If the power of 2 is <b>less than or equal</b> to the decimal number, we mark the position with a <b>1</b> and subtract the value from the decimal. </p>
			<p> Otherwise we mark the position with a <b>0</b> and move on to the next power without subtracting from the decimal number. </p>
			<p> We continue this process until we get a difference of <b>0</b>. </p>
			<p> All other positions after this receive a bit of <b>0</b>. </p>
		</ul>
	</div>

	<div class="subsection">
		<h4> Method 2: Repeated Division </h4>
		<p> Divide the decimal number by <b>2</b> and record the remainder of the divison. </p>
		<p> The remainder will be either a <b>0</b> or <b>1</b>.  </p>
		<p> 
			Continue to divide the quotient from the previous division, recording each remainder obtained, until
			a quotient of <b>0</b> is obtained.
		</p>
		<p> The <b>first</b> remainder obtained will go in the <b>LSB</b> position of the binary number. 
			The <b>last</b> remainder should go in the <b>MSB</b> position of the binary number.
		</p>
	</div>
</div>                
@stop

@section('instructions')
<div class="lesson-title">Excercise 4</div>
<div class="lesson-statement">
	<p>
		Review the repeated division process in the exercise pane to the right. Complete the conversion exercise problems at the bottom.
	</p>
</div>				
@stop

@section('exercise')
<form id="exercise">
	<span id="lesson4">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="thumbnail">
						<h4 style="margin-left:10px"> Method 1: Descending Powers of Two </h4>
						<div class="caption">
							<p>
								For this process, it requires some knowledge of the weights of powers of 2.<br>
								We can use the following table as a reference.
							</p>
							<table border="1" align="center" class="table table-less-padding table-borderless" style="max-width: 500px;margin-left:30px">
								<tbody>
									<tr align="center">
										<td class="h4"> Power: </td>
										<td class="h4">2<sup>7</sup></td>
										<td class="h4">2<sup>6</sup></td>
										<td class="h4">2<sup>5</sup></td>
										<td class="h4">2<sup>4</sup></td>
										<td class="h4">2<sup>3</sup></td>
										<td class="h4">2<sup>2</sup></td>
										<td class="h4">2<sup>1</sup></td>
										<td class="h4">2<sup>0</sup></td>
										<td class="h4"></td>
									</tr>
									<tr align="center">
										<td class="h4"> Weight: </td>
										<td class="h4"> 128 </td>
										<td class="h4"> 64 </td>
										<td class="h4"> 32 </td>
										<td class="h4"> 16 </td>
										<td class="h4"> 8 </td>
										<td class="h4"> 4 </td>
										<td class="h4"> 2 </td>
										<td class="h4"> 1 </td>
										<td></td>
									</tr>
								</tbody>
							</table>

							<table border="0" class="table table-condensed table-borderless">
								<thead>
									<tr>
										<th style="text-align:right"> Steps </th>
										<th> &nbsp; </th>
										<th> P </th>
										<th>  </th>
										<th>  </th>
										<th> &nbsp; </th>
										<th> &nbsp; </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td align="right" class="h5"> 42 </td>
										<td> &nbsp; </td>
										<td> &nbsp; </td>
										<td> &nbsp; </td>
										<td> &nbsp; </td>
										<td> &nbsp; </td>
										<td align="left"> Start with your decimal number. For example, lets use <b>42</b>. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 42 &lt; 128 </td>
										<td> &nbsp; </td>
										<td class="h5"> 2<sup>7</sup> </td>
										<td class="h5"></td>
										<td class="h5"> 0 </td>
										<td>&nbsp;</td>
										<td align="left"> Compare each power of 2 to the decimal number, marking the position with either a <b>0</b> or <b>1</b>. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 42 &lt; 64 </td>
										<td> &nbsp; </td>
										<td class="h5"> 2<sup>6</sup> </td>
										<td class="h5"></td>
										<td class="h5"> 0 </td>
										<td> &nbsp; </td>
										<td align="left"> If the power of 2 does not fit into the decimal number, mark that position with a <b>0</b>. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 42 &ge; 32 </td>
										<td> &nbsp; </td>
										<td class="h5"> 2<sup>5</sup> </td>
										<td class="h5"></td>
										<td class="h5"> 1 </td>
										<td>&nbsp;</td>
										<td align="left"> If the power of 2 fits, subtract the value from the number and mark the position with a <b>1</b>. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 10 &lt; 16 </td>
										<td> &nbsp; </td>
										<td class="h5"> 2<sup>4</sup> </td>
										<td class="h5"></td>
										<td class="h5"> 0 </td>
										<td> &nbsp; </td>
										<td align="left"> Using the difference as the new decimal number, continue comparing it to each power of 2. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 10 &ge; 8 </td>
										<td> &nbsp; </td>
										<td class="h5"> 2<sup>3</sup> </td>
										<td class="h5"></td>
										<td class="h5"> 1 </td>
										<td>&nbsp;</td>
										<td align="left"> Take the difference and mark the position with a <b>1</b> when applicable. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 2 &lt; 4 </td>
										<td> &nbsp; </td>
										<td class="h5"> 2<sup>2</sup> </td>
										<td class="h5"></td>
										<td class="h5"> 0 </td>
										<td> &nbsp; </td>
										<td align="left"> Mark the position with a <b>0</b> and move to the next power of 2 if the power does not fit. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 2 &ge; 2 </td>
										<td> &nbsp; </td>
										<td class="h5"> 2<sup>1</sup> </td>
										<td class="h5"></td>
										<td class="h5"> 1 </td>
										<td> &nbsp; </td>
										<td align="left"> Once a difference of <b>0</b> is achieved, mark the position with a <b>1</b> and the process ends. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 0 &lt; 1 </td>
										<td> &nbsp; </td>
										<td class="h5"> 2<sup>0</sup> </td>
										<td class="h5"></td>
										<td class="h5"> 0 </td>
										<td> &nbsp; </td>
										<td align="left"> All other positions after that recieve a bit of <b>0</b>. </td>
									</tr>
								</tbody>
							</table>

							<table border="1" align="center" class="table table-condensed table-borderless">
								<tbody>
									<tr>
										<td> &nbsp; </td>
										<td class="h4" style="vertical-align:bottom">2<sup>7</sup></td>
										<td class="h4" style="vertical-align:bottom">2<sup>6</sup></td>
										<td class="h4" style="vertical-align:bottom">2<sup>5</sup></td>
										<td class="h4" style="vertical-align:bottom">2<sup>4</sup></td>
										<td class="h4" style="vertical-align:bottom">2<sup>3</sup></td>
										<td class="h4" style="vertical-align:bottom">2<sup>2</sup></td>
										<td class="h4" style="vertical-align:bottom">2<sup>1</sup></td>
										<td class="h4" style="vertical-align:bottom">2<sup>0</sup></td>
										<td> &nbsp; </td>
										<td align="left" rowspan="2" style="vertical-align:middle">
											After the process is over, arrange the powers of 2 in order. <br>
											Mark each position with the bit that was produced during the above process. <br>
										</td>
									</tr>
									<tr>
										<td> &nbsp; </td>
										<td class="h5"> <span class="bit">0</span> </td>
										<td class="h5"> <span class="bit">0</span> </td>
										<td class="h5"> <span class="bit">1</span> </td>
										<td class="h5"> <span class="bit">0</span> </td>
										<td class="h5"> <span class="bit">1</span> </td>
										<td class="h5"> <span class="bit">0</span> </td>
										<td class="h5"> <span class="bit">1</span> </td>
										<td class="h5"> <span class="bit">0</span> </td>
										<td> &nbsp; </td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="thumbnail">
						<h4 style="margin-left:10px"> Repeated Divison Process </h4>
						<div class="caption">
							<table border="0" align="center" class="table table-condensed table-borderless">
								<thead>
									<tr>
										<th style="text-align:right"> Steps </th>
										<th> &nbsp; </th>
										<th> Q </th>
										<th> R </th>
										<th> &nbsp; </th>
										<th> &nbsp; </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td align="right" class="h5">37</td>
										<td> &nbsp; </td>
										<td> &nbsp; </td>
										<td> &nbsp; </td>
										<td> &nbsp; </td>
										<td align="left"> Start with your decimal number. For example, lets use <b>37</b>. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 37 &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td class="h5"> 18 </td>
										<td class="h5"> 1 </td>
										<td>&nbsp;</td>
										<td align="left"> Divide <b>37</b> by <b>2</b> and record the quotient and remainder.  </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 18 &divide 2 </td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td class="h5"> 9 </td>
										<td class="h5"> 0 </td>
										<td> &nbsp; </td>
										<td align="left"> If the quotient is not <b>0</b> then divide it by <b>2</b> and record the remainder again. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 9 &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td class="h5"> 4 </td>
										<td class="h5"> 1 </td>
										<td> &nbsp; </td>
										<td align="left"> Continue dividing the quotient by <b>2</b> and record each remainder. </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 4 &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td class="h5"> 2 </td>
										<td class="h5"> 0 </td>
										<td> &nbsp; </td>
										<td align="left"> &#8943; </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 2 &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td class="h5"> 1 </td>
										<td class="h5"> 0 </td>
										<td> &nbsp; </td>
										<td align="left"> &#8943; </td>
									</tr>
									<tr>
										<td align="right" class="h5"> 1 &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td class="h5"> 0 </td>
										<td class="h5"> 1 </td>
										<td> &nbsp; </td>
										<td align="left">Once you reach a quotient of <b>0</b>, the process is over.</td>
									</tr>
								</tbody>
							</table>
							<table border="1" align="center" class="table table-condensed table-borderless">
								<tbody>
									<tr align="center">
										<td class="h5" style="vertical-align:bottom"> MSB </td>
										<td class="h5">  </td>
										<td class="h5">  </td>
										<td class="h5">  </td>
										<td class="h5">  </td>
										<td class="h5" style="vertical-align:bottom"> LSB </td>
										<td> &nbsp; </td>
										<td align="left" rowspan="2">
											After the process is over, simply arrange the remainders in consecutive order. <br>
											The 1st remainder should go in the least significant bit (LSB) position. <br>
											The last remainder should go in the most significant bit (MSB) position. <br>
										</td>
									</tr>
									<tr align="center">
										<td align="right"> <span class="bit h5">1</span> </td>
										<td> <span class="bit h5">0</span> </td>
										<td> <span class="bit h5">0</span> </td>
										<td> <span class="bit h5">1</span> </td>
										<td> <span class="bit h5">0</span> </td>
										<td> <span class="bit h5">1</span> </td>
										<td> &nbsp; </td>
									</tr>
									<tr align="left">
										<td></td>
										<td colspan="8" style="vertical-align:middle">
											<i>Most of the time you will see binary presented in an <b>8</b>-bit group called a <b>byte</b>.</i> <br>
											<i>If needed, you can pad <b>0</b>'s to the left of the MSB to complete the byte. For example: 100101 &#8594 00100101 </i>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

			<!-- User Interaction Conversion -->
			<div class='row'>
				<div class='col-sm-12 col-md-12'>
					<div class='thumbnail' style="padding: 10px">
						<h4>Now it's your turn</h4>
						<p>
							Complete the following two exercises using the methods learned above.
						</p>
					</div>
				</div>
			</div>

			
			<div class="row">
				<?php $num = rand(65, 128); $num1 = $num; ?>
				<div class="col-sm-8 col-md-6">
					<div class="thumbnail">
						<div class="caption">
							<p>Convert <b>{{$num}}</b> to binary using Descending Powers of Two.</p>
							<table border="0" align="center" class="table table-condensed table-borderless" style="max-width:250px">
								<thead>
									<tr>
										<th style="text-align:right"> Steps </th>
										<th> &nbsp; </th>
										<th> P </th>
										<th> &nbsp; </th>
										<th> &nbsp; </th>
										<th> &nbsp; </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										@if($num < 128)
											<td align="right" class="h5">{{$num}} &lt; 128</td>
										@else
											<td align="right" class="h5">{{$num}} &ge; 128</td>
										@endif
										<td> &nbsp; </td>
										<td> 2<sup>7</sup> </td>
										<td> &nbsp; </td>
										<td id="question17">
											@if($num < 128)
												{{ Form::hidden('crypt[17]', Crypt::encrypt('0'.uniqid()) )}}
											@else
												<?php $num = $num - 128 ?>
												{{ Form::hidden('crypt[17]', Crypt::encrypt('1'.uniqid()) )}}
											@endif
											<input name="question[17]" data-num="{{$num1}}" data-power="7" type="text" maxlength="1" style='max-width: 50px;height:25px; padding:6px' class="method1 input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr>
										<td align="right" class="h5"> </td>
										<td> &nbsp; </td>
										<td> 2<sup>6</sup> </td>
										<td> &nbsp; </td>
										<td id="question18">
											@if($num < 64)
												{{ Form::hidden('crypt[18]', Crypt::encrypt('0'.uniqid()) )}}
											@else
												<?php $num = $num - 64 ?>
												{{ Form::hidden('crypt[18]', Crypt::encrypt('1'.uniqid()) )}}
											@endif
											<input name="question[18]" data-num="" data-power="6" type="text" maxlength="1" style='max-width: 50px;height:25px; padding:6px' class="method1 input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr>
										<td align="right" class="h5"> </td>
										<td> &nbsp; </td>
										<td> 2<sup>5</sup> </td>
										<td> &nbsp; </td>
										<td id="question19">
											@if($num < 32)
												{{ Form::hidden('crypt[19]', Crypt::encrypt('0'.uniqid()) )}}
											@else
												<?php $num = $num - 32 ?>
												{{ Form::hidden('crypt[19]', Crypt::encrypt('1'.uniqid()) )}}
											@endif
											<input name="question[19]" data-num="" data-power="5" type="text" maxlength="1" style='max-width: 50px;height:25px; padding:6px' class="method1 input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr>
										<td align="right" class="h5"> </td>
										<td> &nbsp; </td>
										<td> 2<sup>4</sup> </td>
										<td> &nbsp; </td>
										<td id="question20">
											@if($num < 16)
												{{ Form::hidden('crypt[20]', Crypt::encrypt('0'.uniqid()) )}}
											@else
												<?php $num = $num - 16 ?>
												{{ Form::hidden('crypt[20]', Crypt::encrypt('1'.uniqid()) )}}
											@endif
											<input name="question[20]" data-num="" data-power="4" type="text" maxlength="1" style='max-width: 50px;height:25px; padding:6px' class="method1 input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr>
										<td align="right" class="h5"> </td>
										<td> &nbsp; </td>
										<td> 2<sup>3</sup> </td>
										<td> &nbsp; </td>
										<td id="question21">
											@if($num < 8)
												{{ Form::hidden('crypt[21]', Crypt::encrypt('0'.uniqid()) )}}
											@else
												<?php $num = $num - 8 ?>
												{{ Form::hidden('crypt[21]', Crypt::encrypt('1'.uniqid()) )}}
											@endif
											<input name="question[21]" data-num="" data-power="3" type="text" maxlength="1" style='max-width: 50px;height:25px; padding:6px' class="method1 input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr>
										<td align="right" class="h5"> </td>
										<td> &nbsp; </td>
										<td> 2<sup>2</sup> </td>
										<td> &nbsp; </td>
										<td id="question22">
											@if($num < 4)
												{{ Form::hidden('crypt[22]', Crypt::encrypt('0'.uniqid()) )}}
											@else
												<?php $num = $num - 4 ?>
												{{ Form::hidden('crypt[22]', Crypt::encrypt('1'.uniqid()) )}}
											@endif
											<input name="question[22]" data-num="" data-power="2" type="text" maxlength="1" style='max-width: 50px;height:25px; padding:6px' class="method1 input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr>
										<td align="right" class="h5"> </td>
										<td> &nbsp; </td>
										<td> 2<sup>1</sup> </td>
										<td> &nbsp; </td>
										<td id="question23">
											@if($num < 2)
												{{ Form::hidden('crypt[23]', Crypt::encrypt('0'.uniqid()) )}}
											@else
												<?php $num = $num - 2 ?>
												{{ Form::hidden('crypt[23]', Crypt::encrypt('1'.uniqid()) )}}
											@endif
											<input name="question[23]" data-num="" data-power="1" type="text" maxlength="1" style='max-width: 50px;height:25px; padding:6px' class="method1 input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr>
										<td align="right" class="h5"> </td>
										<td> &nbsp; </td>
										<td> 2<sup>0</sup> </td>
										<td> &nbsp; </td>
										<td id="question24">
											@if($num < 1)
												{{ Form::hidden('crypt[24]', Crypt::encrypt('0'.uniqid())) }}
											@else
												<?php $num = $num - 1 ?>
												{{ Form::hidden('crypt[24]', Crypt::encrypt('1'.uniqid())) }}
											@endif
											<input name="question[24]" data-num="" data-power="0" type="text" maxlength="1" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
								</tbody>
							</table>
							<p>Final Binary Answer:</p>
							<div id="question30">
								{{ Form::hidden('crypt[30]', Crypt::encrypt(sprintf("%08b",$num1).uniqid()) )}}
								{{ Form::text('question[30]', null, array('class'=>'form-control input', 'style'=>'max-width: 250px', 'maxlength' => '8')) }}
							</div>
						</div>
					</div>
				</div>

				<?php $num = rand(129, 255); $num1 = $num; ?>
				<div class="col-sm-8 col-md-6">
					<div class="thumbnail">
						<div class="caption">
							<p>Convert <b>{{$num}}</b> to binary using Repeated Division.</p>
							<table border="0" align="center" class="table table-condensed table-borderless" style="max-width:250px">
								<thead>
									<tr>
										<th style="text-align:right"> Steps </th>
										<th> &nbsp; </th>
										<th> Q </th>
										<th> R </th>
										<th> &nbsp; </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td align="right" class="h5">{{$num}} &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td id="question0">
											{{ Form::hidden('crypt[0]', Crypt::encrypt(((int)($num / 2)).uniqid()) )}}
											<input type="text" name="question[0]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="method2 input form-control">
										</td>
										<td id="question1">
											{{ Form::hidden('crypt[1]', Crypt::encrypt(($num % 2).uniqid()) )}}
											<input type="text" name="question[1]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td> &nbsp; </td>
										
									</tr>
									<tr> <?php $num = (int)($num / 2); ?>
										<td align="right" class="h5"> &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td id="question2">
											{{ Form::hidden('crypt[2]', Crypt::encrypt(((int)($num / 2)).uniqid()) )}}
											<input type="text" name="question[2]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="method2 input form-control">
										</td>
										<td id="question3">
											{{ Form::hidden('crypt[3]', Crypt::encrypt(($num % 2).uniqid()) )}}
											<input type="text" name="question[3]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr> <?php $num = (int)($num / 2); ?>
										<td align="right" class="h5"> &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td id="question4">
											{{ Form::hidden('crypt[4]', Crypt::encrypt(((int)($num / 2)).uniqid()) )}}
											<input type="text" name="question[4]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="method2 input form-control">
										</td>
										<td id="question5">
											{{ Form::hidden('crypt[5]', Crypt::encrypt(($num % 2).uniqid()) )}}
											<input type="text" name="question[5]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr> <?php $num = (int)($num / 2); ?>
										<td align="right" class="h5"> &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td id="question6">
											{{ Form::hidden('crypt[6]', Crypt::encrypt(((int)($num / 2)).uniqid()) )}}
											<input type="text" name="question[6]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="method2 input form-control">
										</td>
										<td id="question7">
											{{ Form::hidden('crypt[7]', Crypt::encrypt(($num % 2).uniqid()) )}}
											<input type="text" name="question[7]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr> <?php $num = (int)($num / 2); ?>
										<td align="right" class="h5"> &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td id="question8">
											{{ Form::hidden('crypt[8]', Crypt::encrypt(((int)($num / 2)).uniqid()) )}}
											<input type="text" name="question[8]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="method2 input form-control">
										</td>
										<td id="question9">
											{{ Form::hidden('crypt[9]', Crypt::encrypt(($num % 2).uniqid()) )}}
											<input type="text" name="question[9]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr> <?php $num = (int)($num / 2); ?>
										<td align="right" class="h5"> &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td id="question10">
											{{ Form::hidden('crypt[10]', Crypt::encrypt(((int)($num / 2)).uniqid()) )}}
											<input type="text" name="question[10]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="method2 input form-control">
										</td>
										<td id="question11">
											{{ Form::hidden('crypt[11]', Crypt::encrypt(($num % 2).uniqid()) )}}
											<input type="text" name="question[11]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr> <?php $num = (int)($num / 2); ?>
										<td align="right" class="h5"> &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td id="question12">
											{{ Form::hidden('crypt[12]', Crypt::encrypt(((int)($num / 2)).uniqid()) )}}
											<input type="text" name="question[12]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="method2 input form-control">
										</td>
										<td id="question13">
											{{ Form::hidden('crypt[13]', Crypt::encrypt(($num % 2).uniqid()) )}}
											<input type="text" name="question[13]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
									<tr> <?php $num = (int)($num / 2); ?>
										<td align="right" class="h5"> &divide 2</td>
										<td class="h5"> &nbsp; = &nbsp; </td>
										<td id="question14">
											{{ Form::hidden('crypt[14]', Crypt::encrypt(((int)($num / 2)).uniqid()) )}}
											<input type="text" name="question[14]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td id="question15">
											{{ Form::hidden('crypt[15]', Crypt::encrypt(($num % 2).uniqid()) )}}
											<input type="text" name="question[15]" maxlength="3" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
										</td>
										<td> &nbsp; </td>
									</tr>
								</tbody>
							</table>
							<p>Final Binary Answer:</p>
							<div id="question16">
								{{ Form::hidden('crypt[16]', Crypt::encrypt(sprintf("%08b",$num1).uniqid()) )}}
								{{ Form::text('question[16]', null, array('class'=>'form-control input', 'style'=>'max-width: 250px', 'maxlength' => '8')) }}
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class='row'>
				<div class='col-sm-12 col-md-12'>
					<div class='thumbnail' style="padding: 10px">
						<h4> Further Practice: Convert the following decimal numbers to binary.</h4>
						<p> Remember to enter the full byte as your answer. The answer should be 8-bits long. <br>
							You may need to add leading <b>0</b>'s to complete the byte, depending on the method used.
						</p>
					</div>
				</div>
			</div>

			<?php $num2 = rand(0,8); $num3 = rand(9,32); $num4 = rand(33,64); ?>
			<div class='row'>
				<div class='col-sm-4 col-md-4'>
					<div class='thumbnail' style='padding: 15px'>
						<p>Convert <b>{{ $num2 }}</b> to binary</p>
						<div id="question40">
							{{ Form::hidden('crypt[40]', Crypt::encrypt(sprintf("%08b",$num2).uniqid()) )}}
							{{ Form::text('question[40]', null, array('class'=>'form-control input', 'maxlength' => '8')) }}
						</div>
					</div>
				</div>
				<div class='col-sm-4 col-md-4'>
					<div class='thumbnail' style='padding: 15px'>
						<p>Convert <b>{{ $num3 }}</b> to binary</p>
						<div id="question50">
							{{ Form::hidden('crypt[50]', Crypt::encrypt(sprintf("%08b",$num3).uniqid()) )}}
							{{ Form::text('question[50]', null, array('class'=>'form-control input', 'maxlength' => '8')) }}
						</div>
					</div>
				</div>
				<div class='col-sm-4 col-md-4'>
					<div class='thumbnail' style='padding: 15px'>
						<p>Convert <b>{{ $num4 }}</b> to binary</p>
						<div id="question60">
							{{ Form::hidden('crypt[60]', Crypt::encrypt(sprintf("%08b",$num4).uniqid()) )}}
							{{ Form::text('question[60]', null, array('class'=>'form-control input', 'maxlength' => '8')) }}
						</div>
					</div>
				</div>
			</div>

		</div>
	</span>
</form>
@stop

@section('additional_script')
<script type="text/JAVASCRIPT">
	$(document).ready(function() {
		$('input[type=text]').val('');
	});

	$('.method2').keyup(function() {
		$(this).closest('tr').next().children().first().text($(this).val() + ' ÷ 2');
	});

	$('.method1').focusout(function() {
		var num = $(this).attr('data-num');
		var pow = $(this).attr('data-power');
		if(num != '' && $(this).val() != '') {
			var next = num;
			if($(this).val() == 1) {
				next = num - Math.pow(2, pow);
				if(next < Math.pow(2, pow - 1)) {
					$(this).closest('tr').next().children().first().text(next + ' < ' + Math.pow(2, pow-1));
				}
				else {
					$(this).closest('tr').next().children().first().text(next + ' ≥ ' + Math.pow(2, pow-1));
				}
				$(this).closest('tr').next().children().eq(4).children('input[type=text]').attr('data-num', next);
			}
			if($(this).val() == 0) {
				if(next < Math.pow(2, pow - 1)) {
					$(this).closest('tr').next().children().first().text(next + ' < ' + Math.pow(2, pow-1));
				}
				else {
					$(this).closest('tr').next().children().first().text(next + ' ≥ ' + Math.pow(2, pow-1));
				}
				$(this).closest('tr').next().children().eq(4).children('input[type=text]').attr('data-num', next);
			}
		}
	});

</script>
@stop
