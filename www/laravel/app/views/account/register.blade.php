@extends('layout.master')
@section('title','Register')

@section('additionalCSS')
{{ HTML::style('/public/assets/css/register-css.css') }}
@stop

@section('content')

<!-- Summer 2014, PLC Team                                                                         -->

<!-- GUI to allow for client creation of user accounts. Once released this will be available to    -->
<!-- anyone. Currently, you must have an account to create an account (ie, not open to public).    -->
<!-- Options during account creation include registering for a course as a student, or creating an -->
<!-- instructor account which is capable of creating and managing courses                          -->

<div class="div-color-dark">
	<div class="welcome-announcement container">
		<h1>Create Account</h1>
	</div>
</div>


{{ Form::open(array('url'=>'account/register')) }}

<div class="div-color-yellow">
	<div class="container">
		@if(Session::has('errorMessage'))
			<div class="alert alert-danger">
				{{ Session::get('errorMessage') }}
			</div>
		@endif
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-6">
					<p class="lead well-title">Account Information</p>
					<div class="well">
						<div class="form-group">
							{{ Form::text('email', null, array('class'=>'form-control input', 'placeholder'=>'Email Address')) }}
						</div>
						<div class="form-group">
							{{ Form::password('password', array('class'=>'form-control input', 'placeholder'=>'Password')) }}
						</div>
							{{ Form::password('password_confirmation', array('class'=>'form-control input', 'placeholder'=>'Confirm Password')) }}
					</div>
				</div>

				<div class="col-lg-6">
					<p class="lead well-title">Optional Classroom use</p>
					<div class="well">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a href="#student" data-toggle="tab">Student</a></li>
							<li><a href="#instructor" data-toggle="tab">Instructor</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade in active" id="student">
								<p>Request entry to class course</p>
								{{ Form::text('course_code', null, array('class'=>'form-control input', 'placeholder'=>'Course Code')) }}
							</div>
							<div class="tab-pane fade" id="instructor">
								<p>Interested in using LearnPLC for your classroom? More info somewhere...</p>
								<input id="instructor_checkbox" type="checkbox"> Sign me up!
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="center-block register-box">
					<div class="form-group">
						{{ Form::submit('Register', array('class'=>'btn btn-large btn-primary btn-block', 'onclick'=>'submit();'))}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{ Form::close() }}

@stop