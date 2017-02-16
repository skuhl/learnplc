<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module11/section1') }}">
		@if(array_key_exists(100, $sections) && $sections[100] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(100,$sections) && $sections[100] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(100,$sections) && $sections[100] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Introduction to SCADA
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module11/section2') }}">
		@if(array_key_exists(101, $sections) && $sections[101] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(101,$sections) && $sections[101] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(101,$sections) && $sections[101] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. What are HMIs?
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module11/section3') }}">
		@if(array_key_exists(102, $sections) && $sections[102] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(102,$sections) && $sections[102] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(102,$sections) && $sections[102] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. What is SCADA?
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module11/section4') }}">
		@if(array_key_exists(103, $sections) && $sections[103] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(103,$sections) && $sections[103] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(103,$sections) && $sections[103] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. Data Communications
	</a>
</li>
<li @if($sec->url_name == "section5") class="active" @endif>
	<a href="{{ URL::to('modules/module11/section5') }}">
		@if(array_key_exists(104, $sections) && $sections[104] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(104,$sections) && $sections[104] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(104,$sections) && $sections[104] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		5. Networking Schemes
	</a>
</li>