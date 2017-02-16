<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module8/section1') }}">
		@if(array_key_exists(40, $sections) && $sections[40] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(40,$sections) && $sections[40] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(40,$sections) && $sections[40] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Master Control Relay (MCR)
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module8/section2') }}">
		@if(array_key_exists(41, $sections) && $sections[41] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(41,$sections) && $sections[41] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(41,$sections) && $sections[41] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Jump Instruction (JMP)
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module8/section3') }}">
		@if(array_key_exists(42, $sections) && $sections[42] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(42,$sections) && $sections[42] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(42,$sections) && $sections[42] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. Subroutine Functions
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module8/section4') }}">
		@if(array_key_exists(43, $sections) && $sections[43] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(43,$sections) && $sections[43] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(43,$sections) && $sections[43] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. (IIN) and (IOT)
    </a>
</li>
<li @if($sec->url_name == "section5") class="active" @endif>
    <a href="{{ URL::to('modules/module8/section5') }}">
        @if(array_key_exists(115, $sections) && $sections[115] == 1)
            <span class="glyphicon glyphicon-ok"></span>
        @elseif(array_key_exists(115,$sections) && $sections[115] == 0)
            <span class="glyphicon glyphicon-remove"></span>
        @elseif(array_key_exists(115,$sections) && $sections[115] == 2)
            <span class="glyphicon glyphicon-edit"></span>
        @else
            <span class="glyphicon glyphicon-unchecked"></span>
        @endif
        5. Other Program Control Instructions
    </a>
</li>