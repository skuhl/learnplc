@extends('layout.master')
@section('title', 'PLC Course View')

@section('content')
<div class='div-color-yellow'>
	<div class='container'>
		<div class="section-header">
			<h3>
				My Courses
				<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal">Create Course</button>
			</h3>
		</div>
		@if(!empty($courses))
			<div id="courses-collapse-container">
				<div class="panel-group" id="accordion">
					@foreach ($courses as $course)

					<div class ="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#course{{ $course['course']->id }}"> {{ $course['course']->name }}  <b class='caret'></b> </a>
							</h4>
							<a class="edit-button btn btn-primary btn-xs pull-right"href="{{ URL::to('courses/details/'.$course['course']->id) }}">
								<span class="glyphicon glyphicon-edit"></span> Edit
							</a>
						</div>

						<!-- panel-heading -->
						<div id="course{{ $course['course']->id }}" data-course="{{ $course['course']->id }}"class="panel-collapse collapse">
							<div class="panel-body">
								<!-- Nav tabs -->
								<ul role="tablist" class="nav nav-tabs">
								  <li class="active"><a data-toggle="tab" role="tab" href="#overview{{$course['course']->id}}">Overview</a></li>
								  @foreach($course['course']->modules as $m)
								  <li class=""><a data-toggle="tab" role="tab" href="#{{$course['course']->id.$m->id}}">{{$m->name}}</a></li>
								  @endforeach
								</ul>

								@if(count($course['users']) > 0 )
									<!-- Tab panes -->
									<div class="tab-content" style="max-height:400px;overflow-y:auto;margin:20px">
									  <div class="tab-pane active" id="overview{{$course['course']->id}}">
									  	<!-- Overview Table -->
										<table id="student-progress-table" class="table table-bordered text-center">
											<thead style="background:#EEEEEE; font-weight:bold">
												<td class="text-left">Email</td>
												<td>Progress 
													<span class="glyphicon glyphicon-question-sign" title="This displays the overall progress in the course." data-toggle="tooltip"></span>
												</td>
												<td>Correct
													<span class="glyphicon glyphicon-question-sign" title="This displays the percent correct of all completed sections." data-toggle="tooltip"></span>
												</td>
												<td>Last Update </td>
												<td>Current Module </td>
												<td>Lastest Section</td>
											</thead>
											<tbody style="background:#FFFFFF">
												@foreach($course['users'] as $u)
												<tr>
													<td class="text-left">{{$u['user']->email}}</td>
													@if($course['totalSections'] !== 0)
														<td class="active"> {{ round($u['progress'] / $course['totalSections'] * 100)."%" }} </td>
														@if($u['progress'] != 0)
															<td class="active"> {{ round($u['correct'] / $u['progress'] * 100)."%" }} </td>
														@else
															<td class="warning"> -- </td>
														@endif 
													@else
														<td class="warning"> -- </td>
														<td class="warning"> -- </td>
													@endif
													@if(isset($u['lastSection']))
														<td> {{ date("D M j", strtotime($u['user']->last_login_at)) }} at {{ date("g:ha", strtotime($u['user']->last_login_at)) }}
														<td> {{ $u['lastSection']->module->name }} </td>
														<td> {{ $u['lastSection']->name }} </td>
													@else
														<td class="warning"> -- </td>
														<td class="warning"> -- </td>
														<td class="warning"> -- </td>
													@endif
												</tr>
												@endforeach
											</tbody>
										</table>
									  </div>
									
									  <!-- Module Tables -->
									  @foreach($course['course']->modules as $m)
									    <?php $count = $m->sections->count(); ?>
										<div class="tab-pane" id="{{$course['course']->id.$m->id}}">
											<table id="student-progress-table" class="table table-bordered text-center">
											<thead style="background:#EEEEEE; font-weight:bold">
												<td class="text-left">Email</td>
												<td>Progress
													<span class="glyphicon glyphicon-question-sign" title="This displays the progress for the module." data-toggle="tooltip"></span>
												</td>
												@foreach($m->sections as $s)
													<td> {{ $s->name }} </td>
												@endforeach
											</thead>
											<tbody style="background:#FFFFFF">
												@foreach($course['users'] as $u)
												<tr>
													<td class="text-left">{{$u['user']->email}}</td>
													@if(isset($u['mprogress'][$m->id]))
														@if($u['mprogress'][$m->id] == $count)
															<td class="success"> {{ round($u['mprogress'][$m->id] / $count * 100)."%" }} </td>
														@else 
															<td class="active">  {{ round($u['mprogress'][$m->id] / $count * 100)."%" }} </td>
														@endif
													@else
														<td class="warning"> -- </td>
													@endif

													@foreach($m->sections as $s)
														@if(isset($u['sections'][$s->id]))
															@if($u['sections'][$s->id]->status == 0)
																<td class="info text-info" data-toggle="tooltip" data-container="body" title="In progress"><span class="glyphicon glyphicon-edit"></span></td>
															@else
																@if($u['sections'][$s->id]->correct)
																	<td class="success text-success" data-toggle="tooltip" data-container="body" title="Completed - Correct"><span class="glyphicon glyphicon-check"></span></td>
																@else
																	<td class="danger text-danger" data-toggle="tooltip" data-container="body" title="Completed - Incorrect"><span class="glyphicon glyphicon-remove"></span></td>
																@endif
															@endif
														@else
															<td class="warning"> -- </td>
														@endif
													@endforeach
												</tr>
												@endforeach
											</tbody>
										</table>
										</div>
									  @endforeach
									  
									</div>
								@else
									<br>
									<p><i> There are no students currently enrolled in the course. </i></p>
								@endif

							</div> <!-- panel-body -->
						</div> <!-- panel-collapse -->
					</div> <!-- panel-default -->
					@endforeach
				</div> <!-- panel-gorup -->
			</div> <!-- courses-collapse-container -->
		@else
			<p><i> 
				<br> You have not created any courses yet. 
				<br> Click on the 'Create Course' button above to create a new course. 
			</i></p>
		@endif
	</div>
</div>

<!-- Create Course Modal -->
<div id='modal'class="modal fade" style="overflow-y:auto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"> Create Course </h4>
      </div>
      <div class="modal-body">
      	{{ Form::open(array('id' => 'create-form', 'url'=>'courses/create')) }}
      		<div class="form-group">
      			{{ Form::label('name', 'Course Name') }}
				{{ Form::text('name', null, array('class'=>'form-control input', 'placeholder'=>'')) }}
			</div>
      	{{ Form::close() }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
        <button id="create-button" type="button" class="btn btn-primary"> Create </button>
      </div>
    </div>
  </div>
</div>

@stop

@section('script')
<script>
	$(document).ready(function() {
		$(".tooltip-enable").tooltip();
		$('[data-toggle="tooltip"]').tooltip();
	});

    // Only keep 1 popover open at a time
    $('[data-toggle="popover"]').click(function() {
    	$('[data-toggle="popover"]').not(this).popover('hide');
    });

    // Close popover when client clicks elsewhere
    $('body').on('click', function (e) {
      //did not click a popover toggle or popover
      	if ($(e.target).data('toggle') !== 'popover'
      		&& $(e.target).parents('.popover.in').length === 0) { 
      		$('[data-toggle="popover"]').popover('hide');
  		}
	});

    // display edit button when panel-heading is being hovered
    $(".edit-button").hide();      
    $(".panel-heading").hover(function() {
    	$(this).find(".edit-button").fadeIn(200);
    }, function() {
    	$(this).find(".edit-button").fadeOut(200);
    });

    // reverse caret for visible collapse
    $(".panel-collapse").on('show.bs.collapse', function() {
    	$(this).siblings(".panel-heading").find("b").addClass("caret-reversed");
    });
    $(".panel-collapse").on('hide.bs.collapse', function() {
    	$(this).siblings(".panel-heading").find("b").removeClass("caret-reversed");
    });

    $('#create-button').click(function() {
    	var url = $('#create-form').attr('action');
    	var data = $('#create-form').serialize();
    	$.ajax({
    		type: "POST",
    		url: url,
    		data: data,
    		success: function(data) {
    			location.reload();
    		},
    		error: function(data) {
    			alert("There was an error creating the form. \nPlease try again.");
    		}
    	});

    });


</script>
@stop