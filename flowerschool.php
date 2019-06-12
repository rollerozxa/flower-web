<?php
$page = (isset($_GET['page']) ? $_GET['page'] : 'start');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<style>
.bottomtext { margin-top: 1em; }
		</style>
		<script src="assets/core.js"></script>
	</head>
	<body>
		<script src="assets/loaded.js"></script>
		<div class="box outer" style="background-color:#eeeeee">
			<?php
			if ($page == 'start') {
				include('helppages/' . $page . '.php');
			} else {
				include('helppages/' . $page . '.php');
				echo '<a class="bottomtext" href="flowerschool.php">&lt; Go back</a>';
			}
			?>
		</div>
		<div class="box zoom">
			Zoom:
			<button onclick="zoom(1.0)">100%</button>
			<button onclick="zoom(1.5)">150%</button>
			<button onclick="zoom(2.0)">200%</button>
		</div>
		<!--<pre><?php print_r($_GET); ?></pre>
		<a href="">Reload</a>-->
	</body>
</html>
