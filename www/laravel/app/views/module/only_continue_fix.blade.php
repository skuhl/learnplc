<!-- Hacky fix for just a continue button: -->
<!-- Change the text of submit to continue -->
<!-- Manually run code for continue when submit is pressed -->
<!-- Hide the resubmit button if already submitted sections -->
@section('submit_override_script')
<script type="text/JAVASCRIPT">
	$("#submit-new button").text('Continue');
	$("#submit-correct .submit").hide();
	function postSubmit() {
		@if($next)
		window.location.replace("{{URL::to('/modules/'.$mod->url_name.'/'.$next->url_name)}}");
		@else
		window.location.replace("{{URL::to('modules')}}");
		@endif
	}
</script>
@stop