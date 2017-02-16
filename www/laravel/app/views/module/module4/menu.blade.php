<!-- Module 4 menu -->
<li @if($sec->url_name == "tutorial1") class="active" @endif>
	<a href="{{ URL::to('modules/module4/tutorial1') }}">
		@if(array_key_exists(15, $sections) && $sections[15] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(15,$sections) && $sections[15] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(15,$sections) && $sections[15] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Simulator walk through
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module4/section2') }}">
		@if(array_key_exists(16, $sections) && $sections[16] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(16,$sections) && $sections[16] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(16,$sections) && $sections[16] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Basic Symbols - XIC, XIO and OTE
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module4/section3') }}">
		@if(array_key_exists(17, $sections) && $sections[17] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(17,$sections) && $sections[17] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(17,$sections) && $sections[17] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. Branching instructions
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module4/section4') }}">
		@if(array_key_exists(18, $sections) && $sections[18] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(18,$sections) && $sections[18] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(18,$sections) && $sections[18] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. PLC - Program Scan
	</a>
</li>
<li @if($sec->url_name == "section5") class="active" @endif>
	<a href="{{ URL::to('modules/module4/section5') }}">
		@if(array_key_exists(19, $sections) && $sections[19] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(19,$sections) && $sections[19] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(19,$sections) && $sections[19] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		5. Instruction addressing
	</a>
</li>
<li @if($sec->url_name == "section6") class="active" @endif>
	<a href="{{ URL::to('modules/module4/section6') }}">
		@if(array_key_exists(20, $sections) && $sections[20] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(20,$sections) && $sections[20] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(20,$sections) && $sections[20] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		6. PLC programming language overview
	</a>
</li>
<li @if($sec->url_name == "section7") class="active" @endif>
	<a href="{{ URL::to('modules/module4/section7') }}">
		@if(array_key_exists(21, $sections) && $sections[21] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(21,$sections) && $sections[21] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(21,$sections) && $sections[21] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		7. Additional exercise
	</a>
</li>