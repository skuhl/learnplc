<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module5/section1') }}">
		@if(array_key_exists(28, $sections) && $sections[28] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(28,$sections) && $sections[28] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(28,$sections) && $sections[28] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Use timers!
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module5/section2') }}">
		@if(array_key_exists(29, $sections) && $sections[29] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(29,$sections) && $sections[29] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(29,$sections) && $sections[29] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Timer Basics
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module5/section3') }}">
		@if(array_key_exists(30, $sections) && $sections[30] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(30,$sections) && $sections[30] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(30,$sections) && $sections[30] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. On-Delay/Off-Delay Timers
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module5/section4') }}">
		@if(array_key_exists(31, $sections) && $sections[31] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(31,$sections) && $sections[31] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(31,$sections) && $sections[31] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. Retentive and Cascading Timers
	</a>
</li>