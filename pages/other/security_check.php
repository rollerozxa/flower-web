<!doctype html>
<html>
	<head>
		<title>Server Problems</title>
		<link rel="stylesheet" type="text/css" href="/assets/error.css">
	</head>
	<body>
		<img src="/img/gray/RoseIcon.png"><img src="/img/gray/DaisyIcon.png"><img src="/img/gray/IrisIcon.png"><img src="/img/gray/OrchidIcon.png"><img src="/img/gray/SunflowerIcon.png">
		<hr>
		<h1>IP has changed</h1>
		<p>IP change detected, please enter your password:</p>
		<form method="POST">
			<input type="password" name="pass">
			<input type="submit" value="Submit">
		</form>

		<br><a href="#" onclick="showRecovery()" id="showrec">What?</a>
		<div id="whatsthis" style="display:none">
			<b>What?</b>
			<p>You've enabled the <em>elevated account security</em> option which means you get asked for a password each time your IP changes.</p>

			<b>I haven't enabled elevated account security!</b>
			<p>Your account has been compromised. Please email me as soon as possible.</p>
		</div>
		<script>
function showRecovery() {
	document.getElementById('showrec').style.display = 'none';
	document.getElementById('whatsthis').style.display = 'inline-block';
}
		</script>
	</body>
</html>