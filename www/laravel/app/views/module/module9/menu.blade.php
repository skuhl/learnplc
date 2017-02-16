<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module9/section1') }}">
		@if(array_key_exists(44, $sections) && $sections[44] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(44,$sections) && $sections[44] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(44,$sections) && $sections[44] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Addition Instruction
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module9/section2') }}">
		@if(array_key_exists(45, $sections) && $sections[45] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(45,$sections) && $sections[45] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(45,$sections) && $sections[45] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Subtraction Instruction
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module9/section3') }}">
		@if(array_key_exists(46, $sections) && $sections[46] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(46,$sections) && $sections[46] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(46,$sections) && $sections[46] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. Multiplication Instruction
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module9/section4') }}">
		@if(array_key_exists(47, $sections) && $sections[47] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(47,$sections) && $sections[47] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(47,$sections) && $sections[47] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. Division Instruction
	</a>
</li>
<li @if($sec->url_name == "section5") class="active" @endif>
    <a href="{{ URL::to('modules/module9/section5') }}">
        @if(array_key_exists(111, $sections) && $sections[111] == 1)
            <span class="glyphicon glyphicon-ok"></span>
        @elseif(array_key_exists(111,$sections) && $sections[111] == 0)
            <span class="glyphicon glyphicon-remove"></span>
        @elseif(array_key_exists(111,$sections) && $sections[111] == 2)
            <span class="glyphicon glyphicon-edit"></span>
        @else
            <span class="glyphicon glyphicon-unchecked"></span>
        @endif
        5. Other Word-Level Math Instructions
    </a>
</li>