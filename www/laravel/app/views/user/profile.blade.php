@extends('layout.master')
@section('title','User Profile')

@section('content')

<div class='div-color-dark'>
	<div class='welcome-announcement container'>
		<h3>My Profile</h3>
	</div>
</div>

<div class='div-color-yellow'>
	<div class='container'>

		@include('layout.alert')

		<!-- Course Information -->
		<h4 class='section-header'>Course Status</h4>
		@if(!$user->isInstructor())
			@if($user->course())

			<!-- Display course informtion and option to leave -->
			<p>Currently registered to {{ $user->course()->name }}</p>
			<p>Instructor: {{ $user->course()->instructors()->first()->email }}</p>

			<button id='leave-course' class='btn btn-primary'>Leave Course</button>

			<div id='leave-course-confirm' class='alert alert-danger'>
				<p>Warning: All progress made on content added by your instructor will be deleted</p>
				<p>Progress on default modules will be preserved</p><br/>

				{{ Form::open(array('url' => 'user/leave-course', 'method' => 'post')) }}
				{{ Form::submit('Leave Course', array('class' => 'btn btn-danger')) }}
				<input type='button' value='Cancel' id='cancel-leave-course' class='btn btn-default'/>
				{{ Form::close() }}
			</div>

			@else

			<!-- Display options to join a course -->
			<p>You are not registered to any courses</p>
			<p>Enter a course registration code below to join</p>

			{{ Form::open(array('url' => 'user/register-course', 'method' => 'post')) }}

			<div class='input-group' style='max-width: 200px'>
				{{ Form::text('course_code', null, array('class' => 'form-control', 'placeholder' => 'registration code')) }}
				<span class='input-group-btn'>
					{{ Form::submit('submit', array('class' => 'btn btn-primary')) }}
				</span>
			</div>

			{{ Form::close() }}

			@endif
		@else
			<!-- Instructor: redirect to courses info page -->
			<p>You are currently logged into an Instructor type account.</p>
			<p>
				This means you cannot join courses, but instead have the ability to create your own. <br>
				Click on 'My Courses' to navigate to your courses or click on 'Edit Account' to switch your account type.
			</p>
			<div class="form-group">
				{{HTML::link('courses', 'My Courses', array('class'=>'btn btn-primary'))}}
				{{HTML::link('account/info', 'Edit Account', array('class'=>'btn btn-primary'))}}
			</div>
		
		@endif
		
		<br>
		<!-- Module Progress -->
		<h4 class='section-header'>Module Progress</h4>

		@foreach($modules['modules'] as $m)
			<?php $count = $m->sections->count(); ?>
			
			<table id="student-progress-table" class="table table-bordered text-center">
				<thead style="background:#EEEEEE; font-weight:bold">
					<tr class="text-left">
						<td colspan="99" style="background:#232C31;color:#FFFFFF;padding-left:20px">
							{{ $m->name }}
							@if($modules[$m->id]['optional'])
								<span class="label label-default pull-right"> Optional </span>
							@endif
						</td>
					</tr>
					<tr>
						<td> Progress 
							<span class="glyphicon glyphicon-question-sign" title="This displays the current progress in the module." data-toggle="tooltip"></span>
						</td>
						<td> Correct 
							<span class="glyphicon glyphicon-question-sign" title="This displays the percent correct of the completed sections." data-toggle="tooltip"></span>
						</td>
						@foreach($m->sections as $s)
							<td> {{ $s->name }} </td>
						@endforeach
					</tr>
				</thead>
				<tbody style="background:#FFFFFF">
					@if(isset($modules[$m->id]))
						@if($modules[$m->id]['progress'] != 0)
							<td class="active"> {{ round($modules[$m->id]['progress'] / $count * 100)."%" }} </td>
							<td class="active"> {{ round($modules[$m->id]['correct'] / $modules[$m->id]['progress'] * 100)."%" }} </td>
						@else
							<td class="active"> {{ round($modules[$m->id]['progress'] / $count * 100)."%" }} </td>
							<td class="warning"> -- </td>
						@endif
					@else
						<td class="warning"> -- </td>
						<td class="warning"> -- </td>
					@endif

					@foreach($m->sections as $s)
						@if(isset($modules[$m->id][$s->id]))
							@if($modules[$m->id][$s->id]->status > 0)
								@if($modules[$m->id][$s->id]->correct == 1)
									<td class="success text-success" data-toggle="tooltip" data-container="body" title="Completed - Correct"><span class="glyphicon glyphicon-check"></span></td>
								@else
									<td class="danger text-danger" data-toggle="tooltip" data-container="body" title="Completed - Incorrect"><span class="glyphicon glyphicon-remove"></span></td>
								@endif
							@else
								<td class="info text-info" data-toggle="tooltip" data-container="body" title="In progress"><span class="glyphicon glyphicon-edit"></span></td>
							@endif
						@else
							<td class="warning"> -- </td>
						@endif
					@endforeach

				</tbody>
			</table>

		@endforeach


		<!-- End Module Progress-->

		<!-- End Course Information -->

	</div>
</div>

@stop

@section('script')
<script>
	$(document).ready(function() {
		$('#leave-course-confirm').hide();
		$('[data-toggle="tooltip"]').tooltip();
	});

	$('#leave-course').click(function() {
		$(this).hide();
		$('#leave-course-confirm').show();
	});

	$('#cancel-leave-course').click(function() {
		$('#leave-course-confirm').hide();
		$('#leave-course').show();
	})
</script>
@stop