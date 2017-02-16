<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module12/section1') }}">
		@if(array_key_exists(105, $sections) && $sections[105] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(105,$sections) && $sections[105] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(105,$sections) && $sections[105] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Introduction and Overview
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module12/section2') }}">
		@if(array_key_exists(106, $sections) && $sections[106] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(106,$sections) && $sections[106] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(106,$sections) && $sections[106] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Pump House
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module12/section3') }}">
		@if(array_key_exists(107, $sections) && $sections[107] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(107,$sections) && $sections[107] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(107,$sections) && $sections[107] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. Filter Tank
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module12/section4') }}">
		@if(array_key_exists(108, $sections) && $sections[108] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(108,$sections) && $sections[108] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(108,$sections) && $sections[108] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. Backwash
	</a>
</li>
<li @if($sec->url_name == "section5") class="active" @endif>
	<a href="{{ URL::to('modules/module12/section5') }}">
		@if(array_key_exists(109, $sections) && $sections[109] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(109,$sections) && $sections[109] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(109,$sections) && $sections[109] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		5. Water Tower
	</a>
</li>
<li @if($sec->url_name == "section6") class="active" @endif>
	<a href="{{ URL::to('modules/module12/section6') }}">
		@if(array_key_exists(110, $sections) && $sections[110] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(110,$sections) && $sections[110] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(110,$sections) && $sections[110] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		6. Filter Tank HMI
	</a>
</li>
<li @if($sec->url_name == "section7") class="active" @endif>
	<a href="{{ URL::to('modules/module12/section7') }}">
		@if(array_key_exists(116, $sections) && $sections[116] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(116,$sections) && $sections[116] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(116,$sections) && $sections[116] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		7. Backwash HMI
	</a>
</li>
<li @if($sec->url_name == "section8") class="active" @endif>
	<a href="{{ URL::to('modules/module12/section8') }}">
		@if(array_key_exists(117, $sections) && $sections[117] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(117,$sections) && $sections[117] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(117,$sections) && $sections[117] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		8. Backwash with Error HMI
	</a>
</li>