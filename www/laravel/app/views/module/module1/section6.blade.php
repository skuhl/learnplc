@extends('module.template')

@section('title','Binary Coded Decimal')

@section('section-menu')
@include('module.module1.menu')
@stop

@section('lesson')
<div class="lesson-title"> Binary Coded Decimal (BCD) </div>
<div class="lesson-statement">
	<div class="subsection">
		<p> 
			Binary coded decimal is another way to represent decimals in binary form.
			BCD combines features of both decimal and binary number systems.
		</p>
	</div>

	<div class="subsection">
		<p> The primary advantage of BCD is the relative ease of converting to and from decimal form. </p>

		<h4> BCD Conversion </h4>
		<ul>
			<li> Each decimal digit is converted to its binary equivalent. </li>
			<li> Each digit always uses four bits. </li>
			<li> The value for each 4-bit BCD number can never be greater than 9. </li>
			<li> Reverse this process to convert from BCD to Decimal. </li>
		</ul>
		<table border="1" align="center" class="table table-less-padding table-borderless bg-warning" style="max-width:500px">
            <tbody>
             	<tr align="center">
                    <td align="right"></td>
                    <td align="left" colspan="10"><b>Decimal: &nbsp; 874<sub>10</sub></b></td>
                </tr>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 8 </td>
                    <td></td>
                    <td> 7 </td>
                    <td></td>
                    <td> 4 </td>
                    <td></td>
                    <td></td>
                    <td align="left">  </td>
                </tr>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> &darr; </td>
                    <td></td>
                    <td> &darr; </td>
                    <td></td>
                    <td> &darr; </td>
                    <td></td>
                    <td></td>
                    <td align="left">  </td>
                </tr>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 1000 </td>
                    <td></td>
                    <td> 0111 </td>
                    <td></td>
                    <td> 0100 </td>
                    <td> </td>
                    <td> </td>
                    <td align="left">  </td>
                </tr>
                <tr align="center">
                    <td align="right"></td>
                    <td align="left" colspan="10"><b>BCD: &nbsp; 1000 0111 0100</b> </td>
                </tr>
            </tbody>
        </table>
	</div>

	<div class="subsection">
		<p>
			BCD is not a number system. It is a decimal number with each digit encoded to
			its binary equivalent. 
		</p>
		<p>
			A BCD number is not the same as a binary number. Usually
			BCD requires more bits to represent the same number than binary.
		</p>
		<table border="1" align="center" class="table table-less-padding table-borderless bg-warning" style="max-width:500px">
			<tbody>
				<tr>
					<td></td>
					<td> 137<sub>10</sub> </td>
					<td>=</td>
					<td> 10001001<sub>2</sub> </td>
					<td> Binary (8-bits)</td>
					<td></td>
				</tr>
				<tr>
					<td></td>
					<td> 137<sub>10</sub> </td>
					<td>=</td>
					<td> 0001 0011 0111 </td>
					<td> BCD (12-bits) </td>
					<td></td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="subsection">
		<h4> Putting it all together </h4>

		<table class="table table-less-padding table-bordered text-center" style="color:#000000; max-width:500px">
	        <thead style="background:#EEEEEE">
	            <tr style="text-align:center">
	            	<th style="text-align:center"> Decimal </th>
	            	<th style="text-align:center"> Hex </th>
	                <th style="text-align:center">Binary</th>
	                <th style="text-align:center">BCD</th>
	            </tr>
	        </thead>
	        <tbody style="background:#FCF8E3">
	            <tr> <td>0</td> <td>0</td> <td>0000</td> <td>0000</td> </tr>
	            <tr> <td>1</td> <td>1</td> <td>0001</td> <td>0001</td> </tr>
	            <tr> <td>2</td> <td>2</td> <td>0010</td> <td>0010</td> </tr>
	            <tr> <td>3</td> <td>3</td> <td>0011</td> <td>0011</td> </tr>
	            <tr> <td>4</td> <td>4</td> <td>0100</td> <td>0100</td> </tr>
	            <tr> <td>5</td> <td>5</td> <td>0101</td> <td>0101</td> </tr>
	            <tr> <td>6</td> <td>6</td> <td>0110</td> <td>0110</td> </tr>
	            <tr> <td>7</td> <td>7</td> <td>0111</td> <td>0111</td> </tr>
	            <tr> <td>8</td> <td>8</td> <td>1000</td> <td>1000</td> </tr>
	            <tr> <td>9</td> <td>9</td> <td>1001</td> <td>1001</td> </tr>
	            <tr> <td>10</td> <td>A</td> <td>1010</td> <td>0001 0000</td> </tr>
	            <tr> <td>11</td> <td>B</td> <td>1011</td> <td>0001 0001</td> </tr>
	            <tr> <td>12</td> <td>C</td> <td>1100</td> <td>0001 0010</td> </tr>
	            <tr> <td>13</td> <td>D</td> <td>1101</td> <td>0001 0011</td> </tr>
	            <tr> <td>14</td> <td>E</td> <td>1110</td> <td>0001 0100</td> </tr>
	            <tr> <td>15</td> <td>F</td> <td>1111</td> <td>0001 0101</td> </tr>
	        </tbody>
	    </table>
	</div>
</div>
@stop

@section('instructions')
<div class="lesson-title">Excercise 6</div>
<div class="lesson-statement">
	<p>
		Complete the BCD Conversion Exercises on the right.
		After submitting, click 'Continue' to complete this section.
	</p>
</div>
@stop

@section('exercise')
<form id="exercise">
	<div class='row'>
		<div class='col-sm-12 col-md-12'>
			<div class='thumbnail' style="padding: 10px">
				<h4>BCD Conversion</h4>
				<p>
					Complete the following BCD Conversion Exercises.
				</p>
			</div>
		</div>
	</div>

	<div class="row">
		<?php 
			$num0 = rand(1,9);
			$num1 = rand(0,9);
			$num2 = rand(0,9);
			$num3 = $num0.$num1.$num2;
			$bcd = sprintf("%04b",$num0).sprintf("%04b",$num1).sprintf("%04b",$num2);
		?>
		<div class='col-sm-8 col-md-6'>
			<div class="thumbnail">
				<div class="caption">
					<table border="0" align="center" class="table table-condensed table-borderless" style="max-width:500px">
			            <tbody>
			             	<tr align="center">
			                    <td class="h5" align="left" colspan="10"> Decimal &nbsp; {{$num3}}<sub>10</sub></td>
			                </tr>
			                <tr align="center">
			                    <td align="right" class="h4"></td>
			                    <td></td>
			                    <td> {{$num0}} </td>
			                    <td></td>
			                    <td> {{$num1}} </td>
			                    <td></td>
			                    <td> {{$num2}} </td>
			                    <td></td>
			                    <td></td>
			                    <td align="left">  </td>
			                </tr>
			                <tr align="center">
			                    <td align="right" class="h4"></td>
			                    <td></td>
			                    <td> &darr; </td>
			                    <td></td>
			                    <td> &darr; </td>
			                    <td></td>
			                    <td> &darr; </td>
			                    <td></td>
			                    <td></td>
			                    <td align="left">  </td>
			                </tr>
			                <tr align="center">
			                    <td align="right" class="h4"></td>
			                    <td></td>
			                    <td id="question0"> 
			                    	{{ Form::hidden('crypt[0]', Crypt::encrypt(sprintf("%04b",$num0).uniqid())) }}
			                    	<input type="text" name="question[0]" maxlength="4" style='max-width: 50px;height:25px; padding:6px' class="input form-control"> 
			                    </td>
			                    <td></td>
			                    <td id="question1">
			                    	{{ Form::hidden('crypt[1]', Crypt::encrypt(sprintf("%04b",$num1).uniqid())) }}
			                    	<input type="text" name="question[1]" maxlength="4" style='max-width: 50px;height:25px; padding:6px' class="input form-control"> 
			                    </td>
			                    <td></td>
			                    <td id="question2">
			                    	{{ Form::hidden('crypt[2]', Crypt::encrypt(sprintf("%04b",$num2).uniqid())) }}
			                    	<input type="text" name="question[2]" maxlength="4" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
			                	</td>
			                    <td> </td>
			                    <td> </td>
			                    <td align="left">  </td>
			                </tr>
			            </tbody>
			        </table>
			        <table class="table-condensed table-borderless">
			        	<tbody>
			        		<tr>
			        			<td class="h5"> BCD: </td>
			        			<td id="question3">
			        				{{ Form::hidden('crypt[3]', Crypt::encrypt($bcd.uniqid())) }}
			        				<input type="text" name="question[3]" maxlength="16" style='max-width: 200px;height:25px; padding:6px' class="input form-control">
			        			</td>
			        		</tr>
			        	</tbody>
			        </table>
				</div>
			</div>
		</div>

		<?php 
			$num0 = rand(1,9);
			$num1 = rand(0,9);
			$num2 = rand(0,9);
			$num3 = $num0.$num1.$num2;
			$bcd = sprintf("%04b",$num0).sprintf("%04b",$num1).sprintf("%04b",$num2);
		?>
		<div class='col-sm-8 col-md-6'>
			<div class="thumbnail">
				<div class="caption">
					<table border="0" align="center" class="table table-condensed table-borderless" style="max-width:500px">
			            <tbody>
			             	<tr align="center">
			                    <td class="h5" align="left" colspan="10"> Decimal &nbsp; {{$num3}}<sub>10</sub></td>
			                </tr>
			                <tr align="center">
			                    <td align="right" class="h4"></td>
			                    <td></td>
			                    <td> {{$num0}} </td>
			                    <td></td>
			                    <td> {{$num1}} </td>
			                    <td></td>
			                    <td> {{$num2}} </td>
			                    <td></td>
			                    <td></td>
			                    <td align="left">  </td>
			                </tr>
			                <tr align="center">
			                    <td align="right" class="h4"></td>
			                    <td></td>
			                    <td> &darr; </td>
			                    <td></td>
			                    <td> &darr; </td>
			                    <td></td>
			                    <td> &darr; </td>
			                    <td></td>
			                    <td></td>
			                    <td align="left">  </td>
			                </tr>
			                <tr align="center">
			                    <td align="right" class="h4"></td>
			                    <td></td>
			                    <td id="question4"> 
			                    	{{ Form::hidden('crypt[4]', Crypt::encrypt(sprintf("%04b",$num0).uniqid())) }}
			                    	<input type="text" name="question[4]" maxlength="4" style='max-width: 50px;height:25px; padding:6px' class="input form-control"> 
			                    </td>
			                    <td></td>
			                    <td id="question5">
			                    	{{ Form::hidden('crypt[5]', Crypt::encrypt(sprintf("%04b",$num1).uniqid())) }}
			                    	<input type="text" name="question[5]" maxlength="4" style='max-width: 50px;height:25px; padding:6px' class="input form-control"> 
			                    </td>
			                    <td></td>
			                    <td id="question6">
			                    	{{ Form::hidden('crypt[6]', Crypt::encrypt(sprintf("%04b",$num2).uniqid())) }}
			                    	<input type="text" name="question[6]" maxlength="4" style='max-width: 50px;height:25px; padding:6px' class="input form-control">
			                	</td>
			                    <td> </td>
			                    <td> </td>
			                    <td align="left">  </td>
			                </tr>
			            </tbody>
			        </table>
			        <table class="table-condensed table-borderless">
			        	<tbody>
			        		<tr>
			        			<td class="h5"> BCD: </td>
			        			<td id="question7">
			        				{{ Form::hidden('crypt[7]', Crypt::encrypt($bcd.uniqid())) }}
			        				<input type="text" name="question[7]" maxlength="16" style='max-width: 200px;height:25px; padding:6px' class="input form-control">
			        			</td>
			        		</tr>
			        	</tbody>
			        </table>
				</div>
			</div>
		</div>

	</div>

	
	<div class='row'>
		<div class='col-sm-12 col-md-12'>
			<div class='thumbnail' style="padding: 10px">
				<table class="table table-condensed table-borderless">
					<thead>
						<tr>
							<th class="h4"colspan="3" style="text-align:center">
								Decimal to BCD
							</th>
							<th colspan="2"></th>
							<th class="h4" colspan="3" style="text-align:center">
								BCD to Decimal
							</th>
						</tr>
					</thead>
		        	<tbody>
		        		@for($i=8; $i < 13; $i+=2)
		        		<?php 
							$num0 = rand(1,9);
							$num1 = rand(0,9);
							$num2 = rand(1,9);
							$num3 = rand(0,9);
						?>
		        		<tr>
		        			<td class="h5" align="right"> {{$num0.$num1}}<sub>10</sub> </td>
		        			<td> &rarr; </td>
		        			<td id="question{{$i}}">
		        				{{ Form::hidden('crypt['.$i.']', Crypt::encrypt(sprintf("%04b",$num0).sprintf("%04b",$num1).uniqid())) }}
		        				<input type="text" name="question[{{$i}}]" maxlength="10" style='max-width: 150px;height:25px; padding:6px' class="input form-control">
		        			</td>
		        			<td></td>
		        			<td></td>
		        			<td class="h5" align="right"> {{sprintf("%04b",$num2).' '.sprintf("%04b",$num3)}} </td>
		        			<td> &rarr; </td>
		        			<td id="question{{$i+1}}">
		        				{{ Form::hidden('crypt['.($i+1).']', Crypt::encrypt($num2.$num3.uniqid())) }}
		        				<input type="text" name="question[{{$i+1}}]" maxlength="10" style='max-width: 150px;height:25px; padding:6px' class="input form-control">
		        			</td>
		        		</tr>
		        		@endfor
		        	</tbody>
		        </table>
			</div>
		</div>
	</div>

</form>
@stop
