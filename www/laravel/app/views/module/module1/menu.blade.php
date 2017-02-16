<!-- Module 1 menu -->
<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module1/section1') }}">
		@if(array_key_exists(1, $sections) && $sections[1] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(1,$sections) && $sections[1] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(1,$sections) && $sections[1] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Numerical Representations
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module1/section2') }}">
		@if(array_key_exists(2, $sections) && $sections[2] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(2,$sections) && $sections[2] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(2,$sections) && $sections[2] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Digital and Analog Systems
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module1/section3') }}">
		@if(array_key_exists(3, $sections) && $sections[3] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(3,$sections) && $sections[3] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(3,$sections) && $sections[3] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. Digital Number Systems
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module1/section4') }}">
		@if(array_key_exists(4, $sections) && $sections[4] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(4,$sections) && $sections[4] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(4,$sections) && $sections[4] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>	
		@endif
		4. Binary to Decimal Conversion
	</a>
</li>
<li @if($sec->url_name == "section5") class="active" @endif>
	<a href="{{ URL::to('modules/module1/section5') }}">
		@if(array_key_exists(5, $sections) && $sections[5] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(5,$sections) && $sections[5] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(5,$sections) && $sections[5] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		5. Hexadecimal Number System
	</a>
</li>
<li @if($sec->url_name == "section6") class="active" @endif>
	<a href="{{ URL::to('modules/module1/section6') }}">
		@if(array_key_exists(6, $sections) && $sections[6] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(6,$sections) && $sections[6] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(6,$sections) && $sections[6] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		6. Binary Coded Decimal
	</a>
</li>
<li @if($sec->url_name == "section7") class="active" @endif>
    <a href="{{ URL::to('modules/module1/section7') }}">
        @if(array_key_exists(118, $sections) && $sections[118] == 1)
            <span class="glyphicon glyphicon-ok"></span>
        @elseif(array_key_exists(118,$sections) && $sections[118] == 0)
            <span class="glyphicon glyphicon-remove"></span>
        @elseif(array_key_exists(118,$sections) && $sections[118] == 2)
            <span class="glyphicon glyphicon-edit"></span>
        @else
            <span class="glyphicon glyphicon-unchecked"></span>
        @endif
        7. Decimal to Binary Game
    </a>
</li>