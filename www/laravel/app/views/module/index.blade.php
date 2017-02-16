@extends('layout.master')

@section('title')
PLC Module Index
@stop

@section('additionalCSS')
{{ HTML::style('/public/assets/css/module-index.css') }}
@stop

@section('content')

<!-- Introduces user to module select page -->
<div class="div-color-dark">
	<div class="container welcome-announcement">
		@if($last)
			<h3>Pick up where you left off</h3>
			<a class="btn btn-primary" href="{{ URL::to('modules/'.$last->section->module->url_name.'/'.$last->section->url_name)}}">
					Continue!
			</a>
			<h3>Or choose a module below</h3>
		@else
			<h3>Choose a module below!</h3>
		@endif
	</div>
</div> <!-- /div-color-dark -->


<div class="div-color-yellow">
	<div class="container">

		<br/>
		<div class='row'>
			@include('module.module_selector_template',array('enabled' => $enabled, 'section' => 'enabled'))
		</div>
		
		@if($optional == 1)
		<p style="border-bottom: 1px solid black">
		Optional
		<span data-toggle="tooltip" data-placement="right" title="These modules are not required by your instructor, but are available to work through if you wish" class="glyphicon glyphicon-question-sign" id="optional-tooltip"></span>	
		</p>
		<div class='row'>
			@include('module.module_selector_template', array('enabled' => $enabled, 'section' => 'optional'))
		</div>
		@endif

	</div> 
</div> 
</div>
@stop

@section('script')
<script>
$('#optional-tooltip').tooltip();
</script>
@stop