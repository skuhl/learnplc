<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>LearnPLC Password Reset</h2>

		<div>
			To reset your password, follow the link: {{ URL::to('account/reset', array($token)) }}.<br/>
			This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.
		</div>
	</body>
</html>
