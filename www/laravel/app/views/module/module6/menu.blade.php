<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module6/section1') }}">
		@if(array_key_exists(32, $sections) && $sections[32] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(32,$sections) && $sections[32] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(32,$sections) && $sections[32] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Counter Overview
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module6/section2') }}">
		@if(array_key_exists(33, $sections) && $sections[33] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(33,$sections) && $sections[33] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(33,$sections) && $sections[33] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Counter Instructions
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module6/section3') }}">
		@if(array_key_exists(34, $sections) && $sections[34] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(34,$sections) && $sections[34] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(34,$sections) && $sections[34] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
        3. Cascading Counters
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module6/section4') }}">
		@if(array_key_exists(35, $sections) && $sections[35] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(35,$sections) && $sections[35] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(35,$sections) && $sections[35] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. Combination of Timers and Counters and its Applications
	</a>
</li>
