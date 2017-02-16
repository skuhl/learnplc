<div class="module-footer">
	@if($score[1] == 0)
	<p class="unstarted-module">Not Started</p>

	@elseif($score[1] == 1.0)
	<p class="completed-module">
		<b>Completed:</b> {{round($score[0]*100)}}% Correct
	</p>

	@else
	<div class="progress">
		<div class="progress-bar" role="progressbar" aria-valuenow="{{ $score[1] * 100 }}" aria-valuemin="0" aria-valuemax="100" style="padding-left:5px; width: {{ $score[1] * 100 }}%;">
			Progress:&nbsp;{{ round($score[1] * 100) }}% 
		</div>
	</div>

	@endif
</div>