<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module7/section1') }}">
		@if(array_key_exists(36, $sections) && $sections[36] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(36,$sections) && $sections[36] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(36,$sections) && $sections[36] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Mechanical Sequencers
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module7/section2') }}">
		@if(array_key_exists(37, $sections) && $sections[37] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(37,$sections) && $sections[37] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(37,$sections) && $sections[37] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Sequencer Instructions
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module7/section3') }}">
		@if(array_key_exists(38, $sections) && $sections[38] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(38,$sections) && $sections[38] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(38,$sections) && $sections[38] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. Sequencer Programs
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module7/section4') }}">
		@if(array_key_exists(39, $sections) && $sections[39] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(39,$sections) && $sections[39] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(39,$sections) && $sections[39] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. Bit and Word Shift Registers
	</a>
</li>