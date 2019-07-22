<?php
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
			include('helppages/'.$page.'.php');
			if ($page != 'start') {
				echo '<a class="bottomtext" href="flowerschool.php">&lt; Go back</a>';
			}
			?>
		</div>
		<?php /* TODO: Use zoom_menu() here as well */?>
		<div class="box zoom">
			Zoom:
			<button onclick="zoom(1.0)">100%</button>
			<button onclick="zoom(1.5)">150%</button>
			<button onclick="zoom(2.0)">200%</button>
		</div>
	</body>
</html>