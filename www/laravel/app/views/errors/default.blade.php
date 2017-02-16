@extends('layout.master')
@section('title','PLC - {{ $code }} Error')

@section('content')
<div class="div-color-dark">
	<div class="container welcome-announcement">
		<h1><strong>{{ $code }} Error</strong></h1>
	</div>
</div>

<div class="div-color-yellow">
	<div class="container">
		<h4>Sorry, an unexpected error has occured.</h4>
	</div>
</div>
@stop