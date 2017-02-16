@extends('layout.master')
@section('title','Send Reset Password')

@section('content')

<!-- Welcome -->
<div class='div-color-dark'>
	<div class='container welcome-announcement'>
		<h3>Recover Password</h3>
	</div>
</div>
<!-- End Welcome -->

<div class='div-color-yellow'>

	<div class='container'>

		@include('layout.alert')

		<div class='centered-box'>

			<form action="{{ action('AccountController@postRecover') }}" method="POST">
				<div class='form-group'>
					<input class='form-control' type="email" name="email" placeholder='email'>
				</div>
				<div class='form-group'>
					<input class='btn btn-primary' type="submit" value="Send Reminder">
				</div>
			</form>

		</div>
	</div>
</div>

@stop