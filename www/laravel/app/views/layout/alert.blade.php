<div style='text-align: center'>
	@if(Session::has('errorMessage'))
	<div class="alert alert-danger">
		{{ Session::get('errorMessage') }}
		@if(isset($errors))
			@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach			
		@endif	
	</div>
	@elseif(Session::has('successMessage'))	
	<div class='alert alert-success'>
		{{ Session::get('successMessage') }}
	</div>
	@endif		
</div>