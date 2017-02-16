<li @if($sec->url_name == "section1") class="active" @endif>
	<a href="{{ URL::to('modules/module10/section1') }}">
		@if(array_key_exists(48, $sections) && $sections[48] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(48,$sections) && $sections[48] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(48,$sections) && $sections[48] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		1. Installation: PLC Enclosures
	</a>
</li>
<li @if($sec->url_name == "section2") class="active" @endif>
	<a href="{{ URL::to('modules/module10/section2') }}">
		@if(array_key_exists(49, $sections) && $sections[49] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(49,$sections) && $sections[49] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(49,$sections) && $sections[49] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		2. Electrical Noise & Leaky Inputs and Outputs
	</a>
</li>
<li @if($sec->url_name == "section3") class="active" @endif>
	<a href="{{ URL::to('modules/module10/section3') }}">
		@if(array_key_exists(50, $sections) && $sections[50] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(50,$sections) && $sections[50] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(50,$sections) && $sections[50] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		3. Grounding, Voltage Variations and Surges
	</a>
</li>
<li @if($sec->url_name == "section4") class="active" @endif>
	<a href="{{ URL::to('modules/module10/section4') }}">
		@if(array_key_exists(51, $sections) && $sections[51] == 1)
		<span class="glyphicon glyphicon-ok"></span>
		@elseif(array_key_exists(51,$sections) && $sections[51] == 0)
		<span class="glyphicon glyphicon-remove"></span>
		@elseif(array_key_exists(51,$sections) && $sections[51] == 2)
		<span class="glyphicon glyphicon-edit"></span>
		@else
		<span class="glyphicon glyphicon-unchecked"></span>
		@endif
		4. Program Editing and Commissioning
	</a>
</li>
<li @if($sec->url_name == "section5") class="active" @endif>
    <a href="{{ URL::to('modules/module10/section5') }}">
        @if(array_key_exists(112, $sections) && $sections[112] == 1)
            <span class="glyphicon glyphicon-ok"></span>
        @elseif(array_key_exists(112,$sections) && $sections[112] == 0)
            <span class="glyphicon glyphicon-remove"></span>
        @elseif(array_key_exists(112,$sections) && $sections[112] == 2)
            <span class="glyphicon glyphicon-edit"></span>
        @else
            <span class="glyphicon glyphicon-unchecked"></span>
        @endif
        5. Programming and Monitoring
    </a>
</li>
<li @if($sec->url_name == "section6") class="active" @endif>
    <a href="{{ URL::to('modules/module10/section6') }}">
        @if(array_key_exists(113, $sections) && $sections[113] == 1)
            <span class="glyphicon glyphicon-ok"></span>
        @elseif(array_key_exists(113,$sections) && $sections[113] == 0)
            <span class="glyphicon glyphicon-remove"></span>
        @elseif(array_key_exists(113,$sections) && $sections[113] == 2)
            <span class="glyphicon glyphicon-edit"></span>
        @else
            <span class="glyphicon glyphicon-unchecked"></span>
        @endif
        6. Preventative Maintenance
    </a>
</li>
<li @if($sec->url_name == "section7") class="active" @endif>
    <a href="{{ URL::to('modules/module10/section7') }}">
        @if(array_key_exists(114, $sections) && $sections[114] == 1)
            <span class="glyphicon glyphicon-ok"></span>
        @elseif(array_key_exists(114,$sections) && $sections[114] == 0)
            <span class="glyphicon glyphicon-remove"></span>
        @elseif(array_key_exists(114,$sections) && $sections[114] == 2)
            <span class="glyphicon glyphicon-edit"></span>
        @else
            <span class="glyphicon glyphicon-unchecked"></span>
        @endif
        7. Troubleshooting
    </a>
</li>