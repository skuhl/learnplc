<!-- Module 2 menu -->
<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module2/section1') }}">
		@if(array_key_exists(7, $sections) && $sections[7] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(7,$sections) && $sections[7] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(7,$sections) && $sections[7] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Introduction to Logic Gates
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module2/section2') }}">
		@if(array_key_exists(8, $sections) && $sections[8] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(8,$sections) && $sections[8] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(8,$sections) && $sections[8] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Evaluating Logic Circuit Outputs
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module2/section3') }}">
		@if(array_key_exists(23, $sections) && $sections[23] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(23,$sections) && $sections[23] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(23,$sections) && $sections[23] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. Boolean Expressions.
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module2/section4') }}">
		@if(array_key_exists(26, $sections) && $sections[26] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(26,$sections) && $sections[26] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(26,$sections) && $sections[26] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. NOR and NAND Gates.
	</a>
</li>
<li @if($sec->url_name == "section5") class="active" @endif>
	<a href="{{ URL::to('modules/module2/section5') }}">
		@if(array_key_exists(27, $sections) && $sections[27] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(27,$sections) && $sections[27] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(27,$sections) && $sections[27] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		5. XOR and XNOR Gates.
	</a>
</li>