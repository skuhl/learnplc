@extends('layout.master')
@section('title','Reset Password')

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

		<div class='container'>

			@include('layout.alert')

			<div class='centered-box'>
				<p>Password Reset</p>

				<form action="{{ action('AccountController@postReset') }}" method="POST">
					<input type="hidden" name="token" value="{{ $token }}">
					<div class='form-group'>
						<input type="email" class='form-control' placeholder='email' name="email">
					</div>
					<div class='form-group'>
						<input type="password" class='form-control' placeholder='new password' name="password">
					</div>
					<div class='form-group'>
						<input type="password" class='form-control' placeholder='confirm password' name="password_confirmation">
					</div>
					<input type="submit" class='btn btn-primary' value="Reset Password">
				</form>

			</div>
		</div>
	</div>
</div>

@stop