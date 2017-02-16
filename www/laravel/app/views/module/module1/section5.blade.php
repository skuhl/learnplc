@extends('module.template')

@section('title','Hexadecimal Number System')

@section('section-menu')
@include('module.module1.menu')
@stop

@section('lesson')
<div class="lesson-title"> Hexadecimal Number System </div>
<div class="lesson-statement">
	<div class="subsection">
		<h4> Hexadecimal Number System (Base 16) </h4>
		<ul>
			<li> Uses 16 symbols: 0-9 and A-F. </li>
			<li> Each hex digit represents a group of 4 bits. </li>
			<li> Allows for convenient handling of long binary numbers. </li>
			<li> A subscript of 16 can be applied to identify the number is in hexadecimal. <i>Ex:</i> <b>11</b><sub>16</sub></li>
		</ul>
	</div>

	<div class="subsection">
		<h4> Hex to Decimal Conversion </h4>
		<p>
			Multiply each hex digit by its positional weight and sum the values together to obtain 
			the decimal value.
		</p>
		<table border="1" align="center" class="table table-less-padding table-borderless bg-warning" style="max-width:500px">
            <thead>
                <tr>
                    <th></th>
                    <th colspan="10"> Hex: &nbsp; 16E<sub>16</sub> </th>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 1 </td>
                    <td></td>
                    <td> 6 </td>
                    <td></td>
                    <td> E </td>
                    <td></td>
                    <td></td>
                    <td align="left">  </td>
                </tr>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 1x16<sup>2</sup> </td>
                    <td></td>
                    <td> 6x16<sup>1</sup> </td>
                    <td></td>
                    <td> 14x16<sup>0</sup> </td>
                    <td></td>
                    <td></td>
                    <td align="left">  </td>
                </tr>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 256 </td>
                    <td>+</td>
                    <td> 96 </td>
                    <td>+</td>
                    <td> 14 </td>
                    <td> = </td>
                    <td> 366<sub>10</sub> </td>
                    <td align="left">  </td>
                </tr>
            </tbody>
        </table>
	</div>

	<div class="subsection">
		<h4> Decimal to Hex Conversion </h4>
		<ul>
			<li> 
				Convert from decimal to hex by using the repeated division method used for decimal to binary conversion,
				except the decimal number is divided by 16 instead of 2.
			</li>
			<li> 
				The remainder will range from 0-15. Digits 0-9 correspond to the same hex digits while
				digits 10-15 correspond to hex digits A-F.
			</li>
		</ul>
	</div>

	<div class="subsection">
		<h4> Hex to Binary Conversion </h4>
		<ul>
			<li> Each hex digit represents a binary number of 4 bits.
				<li> 
					Convert the decimal equivalent of each hex digit to a 4 bit binary number and
					concatenate the results to get the binary number.
				</li>
			</li>
		</ul>
	</div>

	<div class="subsection">
		<h4> Binary to Hex Conversion </h4>
		<ul>
			<li> Split the binary number into 4 bit groups starting with the LSB. </li>
			<li> Each group is then converted to its hexadecimal equivalent. </li>
			<li> <i> Note: Leading zeros may be added to the left of the MSB to fill up the last group. </i></li>
		</ul>
	</div>

	<table class="table table-less-padding table-bordered text-center" style="margin-left:10px; color:#000000; max-width:400px">
        <thead style="background:#EEEEEE">
            <tr style="text-align:center">
            	<th style="text-align:center"> Decimal </th>
            	<th style="text-align:center"> Hex </th>
                <th style="text-align:center">Binary</th>
            </tr>
        </thead>
        <tbody style="background:#FCF8E3">
            <tr> <td>0</td> <td>0</td> <td>0000</td> </tr>
            <tr> <td>1</td> <td>1</td> <td>0001</td> </tr>
            <tr> <td>2</td> <td>2</td> <td>0010</td> </tr>
            <tr> <td>3</td> <td>3</td> <td>0011</td> </tr>
            <tr> <td>4</td> <td>4</td> <td>0100</td> </tr>
            <tr> <td>5</td> <td>5</td> <td>0101</td> </tr>
            <tr> <td>6</td> <td>6</td> <td>0110</td> </tr>
            <tr> <td>7</td> <td>7</td> <td>0111</td> </tr>
            <tr> <td>8</td> <td>8</td> <td>1000</td> </tr>
            <tr> <td>9</td> <td>9</td> <td>1001</td> </tr>
            <tr> <td>10</td> <td>A</td> <td>1010</td> </tr>
            <tr> <td>11</td> <td>B</td> <td>1011</td> </tr>
            <tr> <td>12</td> <td>C</td> <td>1100</td> </tr>
            <tr> <td>13</td> <td>D</td> <td>1101</td> </tr>
            <tr> <td>14</td> <td>E</td> <td>1110</td> </tr>
            <tr> <td>15</td> <td>F</td> <td>1111</td> </tr>
        </tbody>
    </table>
</div>
@stop

@section('instructions')
<div class="lesson-title">Excercise 5</div>
<div class="lesson-statement">
	<p>
		Study the different hexadecimal conversions on the left. Then complete the exercises and continue.
	</p>
</div>
@stop

@section('exercise')
<form id="exercise">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="thumbnail">
					<h4 style="margin-left:10px"> Decimal to Hex Conversion </h4>
					<div class="caption">
						<table border="0" align="center" class="table table-condensed table-borderless">
							<thead>
								<tr>
									<th style="text-align:right"> Steps </th>
									<th> &nbsp; </th>
									<th> Q </th>
									<th> R </th>
									<th> H </th>
									<th> &nbsp; </th>
									<th> &nbsp; </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td align="right" class="h5">8076</td>
									<td> &nbsp; </td>
									<td> &nbsp; </td>
									<td> &nbsp; </td>
									<td> &nbsp; </td>
									<td> &nbsp; </td>
									<td align="left"> Start with your decimal number. For example, lets use <b>8076</b>. </td>
								</tr>
								<tr>
									<td align="right" class="h5"> 8076 &divide 16</td>
									<td class="h5"> &nbsp; = &nbsp; </td>
									<td class="h5"> 504 </td>
									<td class="h5"> 12 </td>
									<td class="h5"> C </td>
									<td>&nbsp;</td>
									<td align="left"> Divide <b>8076</b> by <b>16</b> and record the quotient and remainder.  </td>
								</tr>
								<tr>
									<td align="right" class="h5"> 504 &divide 16 </td>
									<td class="h5"> &nbsp; = &nbsp; </td>
									<td class="h5"> 31 </td>
									<td class="h5"> 8 </td>
									<td class="h5"> 8 </td>
									<td> &nbsp; </td>
									<td align="left"> If the quotient is not <b>0</b> then divide it by <b>16</b> and record the remainder again. </td>
								</tr>
								<tr>
									<td align="right" class="h5"> 31 &divide 16</td>
									<td class="h5"> &nbsp; = &nbsp; </td>
									<td class="h5"> 1 </td>
									<td class="h5"> 15 </td>
									<td class="h5"> F </td>
									<td> &nbsp; </td>
									<td align="left"> Continue dividing the quotient by <b>16</b> and record each remainder. </td>
								</tr>
								
								<tr>
									<td align="right" class="h5"> 1 &divide 16 </td>
									<td class="h5"> &nbsp; = &nbsp; </td>
									<td class="h5"> 0 </td>
									<td class="h5"> 1 </td>
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
									<td> <span class="bit h5">F</span> </td>
									<td> <span class="bit h5">8</span> </td>
									<td> <span class="bit h5">C</span> </td>
									<td> &nbsp; </td>
								</tr>
								<tr align="left">
									<td></td>
									<td colspan="8" style="vertical-align:middle">
										<i>Notice that we converted the remainders from decimal to hexadecimal during the process. </i> <br>
										<i>You may do this during the process or at the end when you are ready to write down the hex number.</i>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
        	<div class="col-sm-9 col-md-6">
                <div class="thumbnail" style="min-height:350px">
                	<h4 style="margin-left:10px"> Hex to Binary Conversion </h4>
                	<div class="caption">
	                    <table border="1" align="center" class="table table-less-padding table-borderless">
							<tbody>
								<tr>
									<td></td>
									<td colspan="6" class="h5">
										Hex: &nbsp; 9F2<sub>16</sub>
									</td>
								</tr>
								<tr><td colspan="10"></td></tr>
								<tr><td colspan="10"></td></tr>
								<tr align="center">
									<td></td>
									<td class="h5">9</td>
									<td class="h5">F</td>
									<td class="h5">2</td>
									<td></td>
									<td></td>
								</tr>
								<tr align="center">
									<td></td>
									<td>&dArr;</td>
									<td>&dArr;</td>
									<td>&dArr;</td>
									<td></td>
									<td></td>
								</tr>
								<tr align="center">
									<td></td>
									<td class="h5">9</td>
									<td class="h5">15</td>
									<td class="h5">2</td>
									<td></td>
									<td></td>
								</tr>
								<tr align="center">
									<td></td>
									<td>&dArr;</td>
									<td>&dArr;</td>
									<td>&dArr;</td>
									<td></td>
									<td></td>
								</tr>
								<tr align="center">
									<td></td>
									<td class="h5">1001</td>
									<td class="h5">1111</td>
									<td class="h5">0010</td>
									<td></td>
									<td></td>
								</tr>
								<tr><td colspan="10"></td></tr>
								<tr><td colspan="10"></td></tr>
								<tr>
									<td></td>
									<td colspan="6" class="h5">
										Binary: &nbsp; 100111110010<sub>2</sub>
									</td>
								</tr>
							</tbody>
						</table>
						<p>
							For readability purposes you may put a space every 4 bits. <br>
							<i>Ex: 100111110010 &rarr; 1001 1111 0010<sub>2</sub></i>
						</p>
					</div>
                </div>
            </div>

            <div class="col-sm-9 col-md-6">
                <div class="thumbnail" style="min-height:350px">
                    <h4 style="margin-left:10px"> Binary to Hex Conversion </h4>
                	<div class="caption">
	                    <table border="1" align="center" class="table table-less-padding table-borderless">
							<tbody>
								<tr>
									<td></td>
									<td colspan="6" class="h5">
										Binary: &nbsp; 1110100110<sub>2</sub>
									</td>
								</tr>
								<tr><td colspan="10"></td></tr>
								<tr><td colspan="10"></td></tr>
								<tr align="center">
									<td></td>
									<td class="h5">11</td>
									<td class="h5">1010</td>
									<td class="h5">0110</td>
									<td></td>
									<td></td>
								</tr>
								<tr align="center">
									<td></td>
									<td>&dArr;</td>
									<td>&dArr;</td>
									<td>&dArr;</td>
									<td></td>
									<td></td>
								</tr>
								<tr align="center">
									<td></td>
									<td class="h5">0011</td>
									<td class="h5">1010</td>
									<td class="h5">0110</td>
									<td></td>
									<td></td>
								</tr>
								<tr align="center">
									<td></td>
									<td>&dArr;</td>
									<td>&dArr;</td>
									<td>&dArr;</td>
									<td></td>
									<td></td>
								</tr>
								<tr align="center">
									<td></td>
									<td class="h5">3</td>
									<td class="h5">A</td>
									<td class="h5">6</td>
									<td></td>
									<td></td>
								</tr>
								<tr><td colspan="10"></td></tr>
								<tr><td colspan="10"></td></tr>
								<tr>
									<td></td>
									<td colspan="6" class="h5">
										Hex: &nbsp; 3A6<sub>16</sub>
									</td>
								</tr>
							</tbody>
						</table>
						<p>
							<i>Notice that we grouped the bits into 4-bit groups from right to left.
							We also added leading 0's to the last group.</i>
						</p>
					</div>
                </div>
            </div>
        </div>

		<div class='row'>
			<div class='col-sm-12 col-md-12'>
				<div class='thumbnail' style="padding: 10px">
					<h4>Now it's your turn</h4>
					<p style="margin-left:5px">
						Complete the following hexadecimal conversion exercises. <br>
						<i>Note: Subscript numbers denote a base system.
						For example 32<sub>10</sub> means 32 in base 10 while 44<sub>16</sub> means 44 in base 16.</i>
					</p>
				</div>
			</div>
		</div>

		<?php 
			$rand = rand(17, 46);
			$nums = array($rand);
			for($i = 1; $i < 12; $i++) {
				$nums[] = $rand + $i*19;
			}
		?>
		<div style="padding: 10px" class='thumbnail'>
			<table border="0" align="center" class="table table-condensed table-borderless">
				<thead>
					<tr>
						<th colspan="3" class="h4" style="text-align:center">Decimal to Hex</th>
						<th colspan="2"></th>
						<th colspan="3" class="h4" style="text-align:center">Hex to Decimal</th>
						<th colspan="2"></th>
						<th colspan="3" class="h4" style="text-align:center">Binary to Hex</th>
						<th colspan="2"></th>
						<th colspan="3" class="h4" style="text-align:center">Hex to Binary</th>
						<th colspan="2"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td align="right"> {{$nums[0]}}<sub>10</sub> </td>
						<td align="center"> = </td>
						<td id="question0" align="left">
							{{ Form::hidden('crypt[0]', Crypt::encrypt(dechex($nums[0]).uniqid()) )}}
							<input type="text" name="question[0]" maxlength="8" style='max-width: 70px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right"> {{strtoupper(dechex($nums[1]))}}<sub>16</sub> </td>
						<td align="center"> = </td>
						<td id="question1"align="left">
							{{ Form::hidden('crypt[1]', Crypt::encrypt($nums[1].uniqid()) )}}
							<input type="text" name="question[1]" maxlength="8" style='max-width: 70px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right"> {{sprintf("%08b",$nums[2])}}<sub>2</sub> </td>
						<td align="center"> = </td>
						<td id="question2" align="left">
							{{ Form::hidden('crypt[2]', Crypt::encrypt(dechex($nums[2]).uniqid()) )}}
							<input type="text" name="question[2]" maxlength="8" style='max-width: 70px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right"> {{strtoupper(dechex($nums[3]))}}<sub>16</sub> </td>
						<td align="center"> = </td>
						<td id="question3" align="left">
							{{ Form::hidden('crypt[3]', Crypt::encrypt(sprintf("%08b",$nums[3]).uniqid()) )}}
							<input type="text" name="question[3]" maxlength="8" style='max-width: 100px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="right"> {{$nums[4]}}<sub>10</sub> </td>
						<td align="center"> = </td>
						<td id="question4" align="left">
							{{ Form::hidden('crypt[4]', Crypt::encrypt(dechex($nums[4]).uniqid()) )}}
							<input type="text" name="question[4]" maxlength="8" style='max-width: 70px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right"> {{strtoupper(dechex($nums[5]))}}<sub>16</sub> </td>
						<td align="center"> = </td>
						<td id="question5"align="left">
							{{ Form::hidden('crypt[5]', Crypt::encrypt($nums[5].uniqid()) )}}
							<input type="text" name="question[5]" maxlength="8" style='max-width: 70px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right"> {{sprintf("%08b",$nums[6])}}<sub>2</sub> </td>
						<td align="center"> = </td>
						<td id="question6" align="left">
							{{ Form::hidden('crypt[6]', Crypt::encrypt(dechex($nums[6]).uniqid()) )}}
							<input type="text" name="question[6]" maxlength="8" style='max-width: 70px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right"> {{strtoupper(dechex($nums[7]))}}<sub>16</sub> </td>
						<td align="center"> = </td>
						<td id="question7" align="left">
							{{ Form::hidden('crypt[7]', Crypt::encrypt(sprintf("%08b",$nums[7]).uniqid()) )}}
							<input type="text" name="question[7]" maxlength="8" style='max-width: 100px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="right"> {{$nums[8]}}<sub>10</sub> </td>
						<td align="center"> = </td>
						<td id="question8" align="left">
							{{ Form::hidden('crypt[8]', Crypt::encrypt(dechex($nums[8]).uniqid()) )}}
							<input type="text" name="question[8]" maxlength="8" style='max-width: 70px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right"> {{strtoupper(dechex($nums[9]))}}<sub>16</sub> </td>
						<td align="center"> = </td>
						<td id="question9"align="left">
							{{ Form::hidden('crypt[9]', Crypt::encrypt($nums[9].uniqid()) )}}
							<input type="text" name="question[9]" maxlength="8" style='max-width: 70px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right"> {{sprintf("%08b",$nums[10])}}<sub>2</sub> </td>
						<td align="center"> = </td>
						<td id="question10" align="left">
							{{ Form::hidden('crypt[10]', Crypt::encrypt(dechex($nums[10]).uniqid()) )}}
							<input type="text" name="question[10]" maxlength="8" style='max-width: 70px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td align="right"> {{strtoupper(dechex($nums[11]))}}<sub>16</sub> </td>
						<td align="center"> = </td>
						<td id="question11" align="left">
							{{ Form::hidden('crypt[11]', Crypt::encrypt(sprintf("%08b",$nums[11]).uniqid()) )}}
							<input type="text" name="question[11]" maxlength="8" style='max-width: 100px; height:25px; padding:6px' class="method2 input form-control">
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</form>
@stop
