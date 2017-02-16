@extends('layout.master')
@section('title','PLC Course Details')

@section('content')
<div class='div-color-yellow'>
	<div class='container'>
		<div class="section-header">
			<h3>
				<!-- NEED TO ADD EDIT COURSE NAME FEATURE 
					 JAVASCRIPT EXISTS FOR TOGGLING ON A TEXT BOX, NEEDS TO BE REFINED A BIT MORE
					 ALSO NEED TO IMPLEMENT THE EDIT FUNCTION IN THE COURSE CONTROLLER
				-->

				<!--span id="edit-name"-->
				  <!--a class="btn-link" style="font-weight:bold;color:#000000">{{$course->name}}</a-->
				   <b>{{{$course->name}}}</b>
				<!--/span-->
				<!--div id="save-name">
					<input type="text" style="max-width:300px;display:inline" class="form-control" value="{{$course->name}}">
					<button class="btn btn-default" type="button">Save</button>
				</div-->
				
				<button id="del-course" data-course="{{ $course->id }}"href="{{ URL::to('courses/delete/'.$course->id) }}" class="btn btn-danger pull-right"> Delete Course </button>
			</h3>
		</div>
		<div class="row">
			<div class="col-lg-9">
				<br><br>
				@if(count($course->students) > 0)
					<table class="table table-hover table-bordered" style="background:#FFFFFF">
						<thead style="background:#EEEEEE; font-weight:bold">
							<td> # </td>
							<td> Email </td>
							<td> Last Login </td>
							<td> </td>
						</thead>
						<tbody>
							<?php $i=0; ?>
							@foreach($course->students as $user)
								<?php $i++; ?>
								<tr>
									<td> </td>
									<td> {{ $user->email }} </td>
									<td> {{ date("D M j", strtotime($user->last_login_at)) }} at {{ date("g:ha", strtotime($user->last_login_at)) }} </td>
									<td> 
										<button id="{{ $user->id }}" href="{{URL::to('courses/remove-student')}}" class="del-student btn btn-danger btn-xs pull-right"> 
											<span class="glyphicon glyphicon-remove"></span> Remove 
										</button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				@else
					<p><i> There are no students currently enrolled in the course.  </i></p>
				@endif
			</div>
			<div class="col-lg-3">
				<br><br>

				<!-- Course Token -->
				<div class=well>
				  	<h4> Course Token: </h4>
				  	<p class="text-uppercase"> {{$course->token}} </p>
				</div>

				<!-- Module Toggling -->
				<div class="well">
					<h4>Module Toggle
						<span data-toggle="tooltip" data-placement="top" title="Select which modules will be available for students enrolled in this course" class="tooltip-enable glyphicon glyphicon-question-sign"></span>
					</h4>
					<br>
					@foreach ($course->allModules as $module)
					<div class="form-group">
						<label> {{ $module->name }} </label>
						<div href="{{ URL::to('courses/toggle-module')}}" class="btn-group" data-toggle="buttons">
							<label class="toggle-mod toggle-on btn btn-default btn-sm @if($module->pivot->enabled) active @endif" id="{{ $module->id }}"><input type="radio" name="options"> On</input></label>
							<label class="toggle-mod toggle-off btn btn-default btn-sm @if(!$module->pivot->enabled) active @endif" id="{{ $module->id }}"><input type="radio" name="options"> Off</input></label>								
						</div>
					</div>					
					@endforeach

				</div> <!-- well -->
				<!-- End Module Toggling -->
			</div>
		</div>
	</div>
</div>
@stop

@section('script') 
<script type="text/javascript">
	$(document).ready(function() {
		$('.tooltip-enable').tooltip();
		$('[data-toggle="popover"]').popover({html: 'true'});
	});

	// Remove student button hover effect
	$('.del-student').css({opacity:0, visibility:'hidden'});
    $('tr').hover(function() {
    	$(this).find('.del-student').animate({opacity:1, visibility:'visible'}, 50);
    }, function() {
    	$(this).find('.del-student').animate({opacity:0, visibility:'hidden'}, 50);
    });

	// Handles the deleting of a student
	$('.del-student').click(function() {
		//e.preventDefault();
		var remove = confirm("You are about to remove a student from the course. \nDo you want to continue?");
		if(remove) {
			var user_id = $(this).attr('id');
			var course_id = $('#del-course').attr('data-course');
			var url = $(this).attr('href');
			var tr = $(this).closest('tr');
			// send off a post request to change enabled status of module for course
			$.ajax({
				type: "POST",
				url: url,
				data: { user: user_id, course: course_id}
			}).done(function(response) {
				tr.fadeOut(300, function() {
					tr.remove();
				});
			});;
		}
	});

	// Handles the deletion of the course
	$('#del-course').click( function() {
		var remove = confirm("You are about to delete the course. All students will be removed from the course. \nDo you want to continue?");
		if(remove) {
			var course_id = $(this).attr('data-course');
			var url = $(this).attr('href');
			// send off a post request to change enabled status of module for course
			$.ajax({
				type: "POST",
				url: url,
				data: {course: course_id}
			}).done( function(response) {
				window.location.replace("{{URL::to('courses')}}");
			});
		}
	});

	// Handles the toggling of a module
    $('.toggle-mod').click( function() {
    	if(!$(this).hasClass('active')) {
    		// Get data
    		var url = $(this).parent().attr('href');
			var module_id = $(this).attr('id');
			var course_id = $('#del-course').attr('data-course');
			var enable_mod;
			if($(this).hasClass('toggle-on')) { enable_mod = 1; }
			else     						  {	enable_mod = 0;	}
			// send off a post request to change enabled status of module for course
			$.ajax({
				type: "POST",
				url: url,
				data: { module: module_id, course: course_id, enabled: enable_mod }
			})
			.done( function(response) {
				
			});;
    	}
	});

    // Handles the edition of the course name
    $('#edit-name').click( function() {
    	$(this).hide();
    	$('#save-name').show();
    });

    $('#save-name').find('button').click(function() {
    	$('#save-name').hide();
    	$('#edit-name').show();
    });


</script>
@stop