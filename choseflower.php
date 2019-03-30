<?php
include('function/function.php');
include('config.php');

if (isset($_GET['a'])) fs_error("App didn't register chosen flower.");

$uid = (isset($_GET['uid']) ? $_GET['uid'] : 0);
$ver = (isset($_GET['ver']) ? $_GET['ver'] : 999);

update_userdata(true);

if (!isset($userdata['username'])) {
	// User doesn't exist.
	fs_error("User doesn't exist.");
}

?>
<html>
	<head>
		<style>
			body { background-color:#ccddff; text-align:center; }
			form { display:inline-block; border:4px outset white; }
			.box { border:2px solid black; display:table; margin:auto; padding:2px; margin-bottom:0.5em; }
		</style>
	</head>
	<body>
		<h2>Flower Selection</h2>
		<?php
		foreach ($flowers as $flower) {
			if ($userdata['has_' . strtolower($flower)]) {
				echo '<form><input type="hidden" name="a" value="chose'.strtolower($flower).'"/>
				<input type="image" src="img/'.$flower.'Icon.png" width=86 alt="'.$flower.'" /></form>';
			} else {
				echo '<form><input type="hidden" name="a" value="chose'.strtolower($flower).'"/>
				<input type="image" src="img/gray/'.$flower.'Icon.png" width=86 alt="'.$flower.'" /></form>';
				$hasunstartedflowers = true;
			}
		}
		if (isset($hasunstartedflowers)) {
			echo "<p><em>Gray flowers are flowers you haven't started yet. Select one to grow a new flower!</em></p>";
		}
		?>
		<hr><div class="box" style="background-color:#ffff00">** Galaxy Special: <?php echo $galaxyspecial ?> **<br><?php echo $statustext ?></div>
	</body>
</html>
