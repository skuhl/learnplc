@extends('layout.master')
@section('title','Login')

@section('content')

<!-- Summer 2014, PLC Team                                                      -->
<!-- Displays a message stating that during develoment you must be logged in to -->
<!-- view any content. Page is redirected to any time a client tries to         -->
<!-- navigate to a page besides the intro / welcome page while not logged in.   -->

<div class="div-color-dark">
	<div class="welcome-announcement container">
		<h1>Sign In</h1>
	</div>
</div>

<div class="div-color-yellow">

	<div class="container">

	@include('layout.alert')

		{{ Form::open(array('url'=>'account/login')) }}

		<div class="row">
			<div class="centered-box">
				<div class="form-group">
					{{ Form::text('email', null, array('class'=>'form-control input', 'placeholder'=>'Email Address')) }}
				</div>
				<div class="form-group">
					{{ Form::password('password', array('class'=>'form-control input', 'placeholder'=>'Password')) }}
				</div>
				<div class="form-group">
					{{ Form::submit('Log In', array('class'=>'btn btn-large btn-primary btn-block', 'onclick'=>'submit();'))}}
				</div>
				<div class="form-group">
					{{ HTML::link('/account/register', 'New? Register Here') }} <br/>
					{{ HTML::link('/account/recover', 'Forgot password?') }}
				</div>
			</div>
		</div>
	</div>

	{{ Form::close() }}
</div>

@stop