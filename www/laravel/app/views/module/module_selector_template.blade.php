@if(($section == 'enabled' and $enabled[1] == 1 ) or ($section == 'optional' and $enabled[1] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module1/section1') }}">
		<div id="mod1" class="module-selector">
			<p>Module 1</p>
			<h3>Binary and Decimal</h3>
			<p>Learn how to use, convert and recognize binary and decimal numbers</p><br/>
			<span class="glyphicon glyphicon-pencil" style="font-size: 30px;"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[1]))

		</div>
	</a>
</div>
@endif


@if(($section == 'enabled' and $enabled[2] == 1 ) or ($section == 'optional' and $enabled[2] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module2/section1') }}">
		<div id="mod2" class="module-selector">
			<p>Module 2</p>
			<h3>Logic Gates</h3>
			<p>Understand simple gates and their combinations to create complex circuits</p>
			<span class="glyphicon glyphicon-refresh" style="font-size: 30px"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[2]))


		</div>
	</a>
</div>
@endif

@if(($section == 'enabled' and $enabled[3] == 1 ) or ($section == 'optional' and $enabled[3] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module3/section1') }}">
		<div id='mod3' class="module-selector">
			<p>Module 3</p>
			<h3>Hardware</h3>
			<p>Identify the physical configuration and internal working of PLC's</p><br/>
			<span class="glyphicon glyphicon-lock" style="font-size: 30px"></span>

			@include('module.module_footer',array('score'=>$moduleprogress[3]))


		</div>
	</a>
</div>
@endif

@if(($section == 'enabled' and $enabled[4] == 1 ) or ($section == 'optional' and $enabled[4] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module4/tutorial1') }}">
		<div id="mod4" class="module-selector">
			<p>Module 4</p>
			<h3>PLC Simulator</h3>
			<p>Use a sand box PLC simulator to solve real world problems</p><br/>
			<span class="glyphicon glyphicon-hdd" style="font-size: 30px"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[4]))


		</div>
	</a>
</div>
@endif
@if(($section == 'enabled' and $enabled[5] == 1 ) or ($section == 'optional' and $enabled[5] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module5/section1') }}">
		<div id="mod5" class="module-selector">
			<p>Module 5</p>
			<h3>Timers</h3>
			<p>Add timers to your ladder logic</p><br/><br/>
			<span class="glyphicon glyphicon-time" style="font-size: 35px"></span>			
			@include('module.module_footer',array('score'=>$moduleprogress[5]))
			

		</div>
	</a>
</div>
@endif
@if(($section == 'enabled' and $enabled[8] == 1 ) or ($section == 'optional' and $enabled[8] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module6/section1') }}">
		<div id="mod6" class="module-selector">
			<p>Module 6</p>
			<h3>Counters</h3>
			<p>Add counters to your ladder logic</p><br/><br/>
			<span class="glyphicon glyphicon-dashboard" style="font-size: 30px"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[8]))


		</div>
	</a>
</div>
@endif
@if(($section == 'enabled' and $enabled[9] == 1 ) or ($section == 'optional' and $enabled[9] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module7/section1') }}">
		<div id="mod7" class="module-selector">
			<p>Module 7</p>
			<h3>Sequencers and Shift Registers</h3>
			<p>Advanced PLC instructions</p><br>
			<span class="glyphicon glyphicon-sort-by-order" style="font-size: 30px"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[9]))


		</div>
	</a>
</div>
@endif
@if(($section == 'enabled' and $enabled[10] == 1 ) or ($section == 'optional' and $enabled[10] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module8/section1') }}">
		<div id="mod8" class="module-selector">
			<p>Module 8</p>
			<h3>Program Control</h3>
			<p>Fine control on your logic program</p><br><br>
			<span class="glyphicon glyphicon-transfer" style="font-size: 30px"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[10]))


		</div>
	</a>
</div>
@endif
@if(($section == 'enabled' and $enabled[11] == 1 ) or ($section == 'optional' and $enabled[11] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module9/section1') }}">
		<div id="mod9" class="module-selector">
			<p>Module 9</p>
			<h3>Math instructions</h3>
			<p>Data manipulations and calculations over math instructions</p><br>
			<span class="glyphicon glyphicon-sound-7-1" style="font-size: 30px"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[11]))


		</div>
	</a>
</div>
@endif
@if(($section == 'enabled' and $enabled[12] == 1 ) or ($section == 'optional' and $enabled[12] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module10/section1') }}">
		<div id="mod10" class="module-selector">
			<p>Module 10</p>
			<h3>PLC Installation& Troubleshooting& Safety</h3>
			<p></p><br>
			<span class="glyphicon glyphicon-wrench" style="font-size: 30px"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[12]))


		</div>
	</a>
</div>
@endif
@if(($section == 'enabled' and $enabled[6] == 1 ) or ($section == 'optional' and $enabled[6] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module11/section1') }}">
		<div id="mod11" class="module-selector">
			<p>Module 11</p>
			<h3>SCADA</h3>
			<p>Understand what SCADA is, why it's used, and how it communicates with HMIs.</p>
			<span class="glyphicon glyphicon-floppy-disk" style="font-size: 30px"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[6]))


		</div>
	</a>
</div>
@endif
@if(($section == 'enabled' and $enabled[7] == 1 ) or ($section == 'optional' and $enabled[7] == 0))
<div class="col-lg-4 col-md-4 col-sm-5 col-xs-5" style="min-width:300px">
	<a href="{{ URL::to('modules/module12/section1') }}">
		<div id="mod12" class="module-selector">
			<p>Module 12</p>
			<h3>Water Treatment</h3>
			<p>Understand a basic water treatment system and simulate an HMI to solve real world problems</p>
			<span class="glyphicon glyphicon-tint" style="font-size: 30px"></span>
			@include('module.module_footer',array('score'=>$moduleprogress[7]))


		</div>
	</a>
</div>
@endif