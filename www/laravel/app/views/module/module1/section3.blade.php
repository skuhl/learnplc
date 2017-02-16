@extends('module.template')

@section('title','Digital Number Systems')

@section('section-menu')
@include('module.module1.menu')
@stop

@section('lesson')
<div class="lesson-title"> Digital Number Systems </div>
<div class="lesson-statement">
	<div class="subsection">
		<h4> Decimal System (Base 10) </h4>
		<ul>
			<li> Uses 10 symbols: 0, 1, 2, 3, 4, 5, 6, 7, 8, 9. </li>
			<li> Each number represents a digit. </li>
			<li> Most significant digit (MSD) is the digit furthest to the left.
				Least significant digit (LSD) is the digit furthest to the right.
			</li>
            <li> A subscript of 10 can be applied to identify the number is in decimal. <i>Ex:</i> <b>11</b><sub>10</sub></li>
            <li> Positional value may be stated as a digit multiplied by a power of 10. </li>
		</ul>

        <table border="1" align="center" class="table table-less-padding table-borderless bg-warning" style="max-width:500px">
            <thead>
                <tr>
                    <th style="text-align:right"> </th>
                    <th colspan="11"> Decimal: &nbsp; 2745<sub>10</sub> </th>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 2 </td>
                    <td></td>
                    <td> 7 </td>
                    <td></td>
                    <td> 4 </td>
                    <td></td>
                    <td> 5 </td>
                    <td></td>
                    <td></td>
                    <td align="left">  </td>
                </tr>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 2x10<sup>3</sup> </td>
                    <td></td>
                    <td> 7x10<sup>2</sup> </td>
                    <td></td>
                    <td> 4x10<sup>1</sup> </td>
                    <td></td>
                    <td> 5x10<sup>0</sup> </td>
                    <td></td>
                    <td></td>
                    <td align="left">  </td>
                </tr>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 2000 </td>
                    <td>+</td>
                    <td> 700 </td>
                    <td>+</td>
                    <td> 40 </td>
                    <td>+</td>
                    <td> 5 </td>
                    <td> = </td>
                    <td> 2745<sub>10</sub> </td>
                    <td align="left"></td>
                </tr>
            </tbody>
        </table>
	</div>

	<div class="subsection">
		<h4> Binary System (Base 2) </h4>
		<ul>
			<li> Uses 2 symbols: 0, 1. </li>
			<li> Each binary digit is called a bit. </li>
			<li> Most significant bit (MSB) is the bit furthest to the left.
				Least significant bit (LSB) is the bit furthest to the right.
			</li>
            <li> A subscript of 2 can be applied to identify the number is in binary. <i>Ex:</i> <b>11</b><sub>2</sub></li>
            <li> Positional value may be stated as a digit multiplied by a power of 2. </li>
		</ul>

		<table border="1" align="center" class="table table-less-padding table-borderless bg-warning" style="max-width:500px">
            <thead>
                <tr>
                    <th></th>
                    <th colspan="10"> Binary: &nbsp; 1011<sub>2</sub> </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 1 </td>
                    <td></td>
                    <td> 0 </td>
                    <td></td>
                    <td> 1 </td>
                    <td></td>
                    <td> 1 </td>
                    <td></td>
                    <td></td>
                    <td align="left">  </td>
                </tr>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 1x2<sup>3</sup> </td>
                    <td></td>
                    <td> 0x2<sup>2</sup> </td>
                    <td></td>
                    <td> 1x2<sup>1</sup> </td>
                    <td></td>
                    <td> 1x10<sup>0</sup> </td>
                    <td></td>
                    <td></td>
                    <td align="left">  </td>
                </tr>
                <tr align="center">
                    <td align="right" class="h4"></td>
                    <td></td>
                    <td> 8 </td>
                    <td>+</td>
                    <td> 0 </td>
                    <td>+</td>
                    <td> 2 </td>
                    <td>+</td>
                    <td> 1 </td>
                    <td> = </td>
                    <td> 11<sub>10</sub> </td>
                    <td align="left">  </td>
                </tr>
            </tbody>
        </table>

	</div>

	<div class="subsection">
		<h4> Binary Counting </h4>
		<ul>
			<li> Each position in a binary number carries a specific weight that is a power of 2. </li>
			<li> Starting with the first position to the left of the binary point, it has a weight of 2<sup>0</sup>=1. </li>
			<li> As you move further to the left, the weight of each position gets doubled. </li>
			<li> As you move to the right, the weight of each position gets halved. </li>
		</ul>
    </div>
		
    <table class="table table-less-padding table-bordered text-center" style="margin-left:10px; color:#000000; max-width:400px">
        <thead style="background:#EEEEEE">
            <tr style="text-align:center">
                <th colspan="4" style="text-align:center">Binary</th>
                <th style="text-align:center"> Decimal </th>
            </tr>
            <tr>
                <th style="text-align:center">2<sup>3</sup></th>
                <th style="text-align:center">2<sup>2</sup></th>
                <th style="text-align:center">2<sup>1</sup></th>
                <th style="text-align:center">2<sup>0</sup></th>
                <th style="text-align:center"></th>
            </tr>
        </thead>
        <tbody style="background:#FCF8E3">
            <tr> <td>0</td> <td>0</td> <td>0</td> <td>0</td> <td>0</td> </tr>
            <tr> <td>0</td> <td>0</td> <td>0</td> <td>1</td> <td>1</td> </tr>
            <tr> <td>0</td> <td>0</td> <td>1</td> <td>0</td> <td>2</td> </tr>
            <tr> <td>0</td> <td>0</td> <td>1</td> <td>1</td> <td>3</td> </tr>
            <tr> <td>0</td> <td>1</td> <td>0</td> <td>0</td> <td>4</td> </tr>
            <tr> <td>0</td> <td>1</td> <td>0</td> <td>1</td> <td>5</td> </tr>
            <tr> <td>0</td> <td>1</td> <td>1</td> <td>0</td> <td>6</td> </tr>
            <tr> <td>0</td> <td>1</td> <td>1</td> <td>1</td> <td>7</td> </tr>
            <tr> <td>1</td> <td>0</td> <td>0</td> <td>0</td> <td>8</td> </tr>
            <tr> <td>1</td> <td>0</td> <td>0</td> <td>1</td> <td>9</td> </tr>
            <tr> <td>1</td> <td>0</td> <td>1</td> <td>0</td> <td>10</td> </tr>
            <tr> <td>1</td> <td>0</td> <td>1</td> <td>1</td> <td>11</td> </tr>
            <tr> <td>1</td> <td>1</td> <td>0</td> <td>0</td> <td>12</td> </tr>
            <tr> <td>1</td> <td>1</td> <td>0</td> <td>1</td> <td>13</td> </tr>
            <tr> <td>1</td> <td>1</td> <td>1</td> <td>0</td> <td>14</td> </tr>
            <tr> <td>1</td> <td>1</td> <td>1</td> <td>1</td> <td>15</td> </tr>
        </tbody>
    </table>

</div>        
@stop

@section('instructions')
<div class="lesson-title">Excercise 3</div>
<div class="lesson-statement">
	<p>
		Review the process shown to the right between <b>decimal counting</b> vs <b>binary counting</b>.
	</p>
	<p>
		Observe the similarities between the two processes and then play around with the binary counter 
		at the bottom. Try to guess what the binary representation for each decimal number will be before you
		advance to the next number. 
	</p>
</div>
@stop

@section('exercise')
<form id="exercise">
    <span id="lesson3">
        <div class="container">

            <div class="row">
                <h3 style="margin-bottom: 30px;"> Decimal Counting &nbsp; vs &nbsp; Binary Counting </h3>
                <div class="col-sm-12 col-md-6">
                    <div class="thumbnail" style="min-height:420px">
                        <table class="table table-condensed table-borderless" border="0" align="center">
                            <thead>
                                <tr>
                                    <th class="h4" colspan="5"> Decimal Counting </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 0 </td>
                                     <td>&nbsp;</td>
                                    <td>We start with the digit <b> 0 </b> </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> &#8942; </td>
                                    <td>&nbsp;</td>
                                    <td> We count the digits in order; 1, 2, 3, 4, 5, 6, 7, 8</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 9 </td>
                                    <td>&nbsp;</td>
                                    <td>We can't count any higher than <b>9</b></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td>&nbsp;</td>
                                    <td>So we cycle back to <b>0</b> and add <b>1</b> on the left</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> &#8942; </td>
                                    <td>&nbsp;</td>
                                    <td> We count the digits again 1, 2, 3, 4, 5, 6, 7, 8 </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 9 </td>
                                    <td>&nbsp;</td>
                                    <td> Once again, we can't count any higher than <b> 9 </b> </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 2 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td>&nbsp;</td>
                                    <td>So we cycle back to <b>0</b> and add <b>1</b> on the left</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> &#8942; </td>
                                    <td>&nbsp;</td>
                                    <td> We continue the process of cycling through the digits and adding 1 to the left</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 9 </td>
                                    <td align="right" class="h5"> 9 </td>
                                    <td>&nbsp;</td>
                                    <td> Once we get to <b> 99 </b> we can't just add 1 to the left </td>
                                </tr>
                                <tr>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td>&nbsp;</td>
                                    <td> We cycle both digits back to <b> 0 </b> and add 1 to the far left </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="thumbnail" style="min-height:420px">
                        <table class="table table-condensed table-borderless" border="0" align="center">
                            <thead>
                                <tr>
                                  <th class="h4" colspan="6">Binary Counting</th>
                                </tr>
                              </thead>
                            <tbody>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td>&nbsp;</td>
                                    <td>We start with the digit <b>0</b> </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td>&nbsp;</td>
                                    <td> We can't count any higher than <b>1</b> in binary </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td>&nbsp;</td>
                                    <td>So we cycle back to <b>0</b> and add <b>1</b> on the left</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td>&nbsp;</td>
                                    <td>Once again we can't count any higher than <b> 1 </b>, but we can't just add <b> 1 </b> on the left </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td>&nbsp;</td>
                                    <td>We do what we did in the decimal system, cycle both back to <b>0</b> and add <b>1</b> to the far left</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td>&nbsp;</td>
                                    <td>We continue counting as normal</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td>&nbsp;</td>
                                    <td> &#8943; </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 1 </td>
                                    <td>&nbsp;</td>
                                    <td>Once gain, we have reached a limit on all the binary digits </td>
                                </tr>
                                <tr>
                                    <td align="right" class="h5"> 1 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td align="right" class="h5"> 0 </td>
                                    <td>&nbsp;</td>
                                    <td> We cycle all the bits to <b>0</b> and append <b>1</b> to the far left </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="thumbnail">
                        <div class="col-sm-12 col-md-6">
                            <table class="table table-condensed table-borderless" border="0" align="center">
                                <tbody>
                                    <tr align="center">
                                        <td align="right"> <b>Power:</b> </td>
                                        <td>2<sup>7</sup></td>
                                        <td>2<sup>6</sup></td>
                                        <td>2<sup>5</sup></td>
                                        <td>2<sup>4</sup></td>
                                        <td>2<sup>3</sup></td>
                                        <td>2<sup>2</sup></td>
                                        <td>2<sup>1</sup></td>
                                        <td>2<sup>0</sup></td>
                                        <td rowspan="2"> &nbsp; &nbsp; </td>
                                        <td> <b>Decimal</b> </td>
                                        <td rowspan="2"> &nbsp; &nbsp; </td>
                                        <td rowspan="2" style="vertical-align:bottom">
                                            <span class="input-group-btn-vertical">
                                                <button id="btn-up" type="button" class="btn btn-default btn-vertical upper" >
                                                    <i class="glyphicon glyphicon-arrow-up"></i>
                                                </button>
                                                <button id="btn-down" type="button" class="btn btn-default btn-vertical lower" disabled="true" >
                                                    <i class="glyphicon glyphicon-arrow-down"></i>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr align="center">
                                        <td align="right"> <b>Binary:</b> </td>
                                        <td> <span id="bit7" class="bit h5">0</span> </td>
                                        <td> <span id="bit6" class="bit h5">0</span> </td>
                                        <td> <span id="bit5" class="bit h5">0</span> </td>
                                        <td> <span id="bit4" class="bit h5">0</span> </td>
                                        <td> <span id="bit3" class="bit h5">0</span> </td>
                                        <td> <span id="bit2" class="bit h5">0</span> </td>
                                        <td> <span id="bit1" class="bit h5">0</span> </td>
                                        <td> <span id="bit0" class="bit h5">0</span> </td>
                                        <td class="h5">
                                            <div id="decimalNum" style="border:1px solid #FFFFFF">0</div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </span>

</form >
@stop

@include('module.only_continue_fix')
