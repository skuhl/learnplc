@extends('layout.master')
@section('title', 'Register Test')

@section('content')

<style>
	.form-signup, .form-signin {
		width:400px;
		margin:0 auto;
	}
</style>

	{{ Form::open(array('url'=>'test/register', 'class'=>'form-signup')) }}
		<h2 class="form-signup-heading">Please Register</h2>

		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
		{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
		{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Confirm Password')) }}

		{{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block', 'onclick'=>'submit();'))}}
	{{ Form::close() }}


@stop