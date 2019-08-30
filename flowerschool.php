<?php
require('function/layout.php');
require('config.php');

$page = (isset($_GET['page']) ? $_GET['page'] : 'start');
?><!doctype html>
<html>
	<head>
		<title>Flower School</title>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<script src="assets/core.js"></script>
	</head>
	<body>
		<script src="assets/loaded.js"></script>
		<div class="box outer" style="background-color:#eeeeee">
			<?php
			if (file_exists('helppages/'.$page.'.php')) {
				include('helppages/'.$page.'.php');
			} else {
				echo '<center><h1>404</h1>This page doesn\'t exist.</center>';
			}
			if ($page != 'start') {
				echo '<a class="bottomtext" href="flowerschool.php">&lt; Go back</a>';
			}
			?>
		</div>
		<?=zoom_menu() ?>
	</body>
</html>
