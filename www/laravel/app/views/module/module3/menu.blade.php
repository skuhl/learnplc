<!-- Module 3 menu -->
<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module3/section1') }}">
		@if(array_key_exists(11, $sections) && $sections[11] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(11,$sections) && $sections[11] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(11,$sections) && $sections[11] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Component Diagram
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module3/section2') }}">
		@if(array_key_exists(12, $sections) && $sections[12] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(12,$sections) && $sections[12] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(12,$sections) && $sections[12] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Hardware Components
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module3/section3') }}">
		@if(array_key_exists(13, $sections) && $sections[13] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(13,$sections) && $sections[13] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(13,$sections) && $sections[13] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. Heating Tank System
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module3/section4') }}">
		@if(array_key_exists(14, $sections) && $sections[14] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(14,$sections) && $sections[14] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(14,$sections) && $sections[14] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. The PLC Cycle
	</a>
</li>