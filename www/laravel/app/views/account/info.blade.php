@extends('layout.master')
@section('title','Account Info')

@section('content')

<!-- Welcome -->
<div class='div-color-dark'>
	<div class='container welcome-announcement'>
		<h3>Account Information</h3>
	</div>
</div>
<!-- End Welcome -->

<!-- Account Mangement -->
<div class='div-color-yellow'>
	<div class='container'>
		<h4 class='section-header'>Account Management</h4>
		<div class='row'>

			<!-- Change Password -->
			<div class='col-lg-6'>
				<div class='well'>
					<p>Change Password</p>
					{{ Form::open(array('url'=>'account/change-password')) }}
					<div class='form-group'>
						{{ Form::password('old_password', array('class'=>'form-control input', 'placeholder'=>'old password')) }}
					</div>
					<div class='form-group'>
						{{ Form::password('new_password', array('class'=>'form-control input', 'placeholder'=>'new password')) }}
					</div>
					<div class='form-group'>
						{{ Form::password('confirm_password', array('class'=>'form-control input', 'placeholder'=>'confirm password')) }}
					</div>
					{{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
					{{ Form::close() }}
				</div>
			</div> <!-- col-lg-6 -->
			<!-- End Change Password -->

			<!-- Swap Account Type -->
			<div class='col-lg-6'>
				<div class='well' id='change-account-div'>
					<p>Change Account Type</p>

					@if( $user->is_instructor )

					<p>You are currently logged into an instructor account</p>
					<a href="{{ URL::to('account/account-types') }}"><p>Learn more about account types</p></a>
					<button id='swapToStudentBtn' class='btn btn-primary'>Swap To Student</button>

					<div id='swapToStudentConfirm' class='alert alert-danger'>
						<p>Warning: You cannot switch to a student account while any courses you have created are still open</p>
						<p>Please close them via the courses page before continuing: <a href="{{ URL::to('courses') }}">My Courses</a></p>
						{{ Form::open(array('url' => 'account/swap-to-student')) }}
						{{ Form::submit('Confirm', array('class' => 'btn btn-danger')) }}
						<input type='button' id='cancelSwapToStudent' class='btn btn-default' value='Cancel'></input>
						{{ Form::close() }}
					</div>

					@else

					<p>You are currently logged into a student account</p>
					<a href="{{ URL::to('account/account-types') }}"><p>Learn more about account types</p></a>
					<button id='swapToInstructorBtn' class='btn btn-primary'>Swap To Instructor</button>

					<div id='swapToInstructorConfirm' class='alert alert-danger'>
						<p>Warning: You cannot switch to an instructor account while you are registered to a course</p>
						<p>Please leave any registered courses via the user page: <a href="{{ URL::to('user/profile') }}">User Profile</a></p>
						{{ Form::open(array('url' => 'account/swap-to-instructor')) }}
						{{ Form::submit('Confirm', array('class' => 'btn btn-danger')) }}
						<input type='button' id='cancelSwapToInstructor' class='btn btn-default' value='Cancel'></input>
						{{ Form::close() }}
					</div>
					@endif

				</div>
			</div>
			<!-- End Swap Account Type -->

		</div>  <!--  row -->

		@include('layout.alert')

	</div>
</div>
<!-- End Account Management -->

@stop

@section('script')
<script>

	$(document).ready(function() {
		$('#swapToStudentConfirm').hide();
		$('#swapToInstructorConfirm').hide();		
	});

	$('#swapToInstructorBtn').click(function() {
		// $(this).hide();
		$('#swapToInstructorConfirm').slideDown(200);
	});

	$('#cancelSwapToInstructor').click(function() {
		$('#swapToInstructorConfirm').slideUp(200);
		// $('#swapToInstructorBtn').show();
	})

	$('#swapToStudentBtn').click(function() {
		// $(this).hide();
		$('#swapToStudentConfirm').slideDown(200);
	})

	$('#cancelSwapToStudent').click(function() {
		$('#swapToStudentConfirm').slideUp(200);
		// $('#swapToStudentBtn').show();
	});

</script>
@stop