<?php include('config.php') ?>

<html>
	<head>
		<title>Server Problems</title>
		<link rel="stylesheet" type="text/css" href="assets/error.css">
	</head>
	<body>
		<img src="/img/gray/RoseIcon.png"><img src="/img/gray/DaisyIcon.png"><img src="/img/gray/IrisIcon.png"><img src="/img/gray/OrchidIcon.png"><img src="/img/gray/SunflowerIcon.png">
		<hr>
		<p>Sorry, there was an error. Below is information about the error.</p>
		<span class="error"><?=$msg ?></span>
		<p>Please try again later or contact me at <?=$contactemail ?> with the following debug information:</p>
		<?=sprintf('<span class="debug">%s</span>', base64_encode(print_r($_GET, true))) ?>
	</body>
</html>