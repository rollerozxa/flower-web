<?php
include('config.php');
include('function/function.php');

if (isset($_GET['a'])) fs_error("App didn't register chosen flower.");

$uid = (isset($_GET['uid']) ? $_GET['uid'] : 0);
$ver = (isset($_GET['ver']) ? $_GET['ver'] : 999);

$cuser = new user(false, $uid);
$cuser->updateUserInfo();

if (!$cuser->getData('username')) {
	// User doesn't exist.
	fs_error("User doesn't exist.");
}

?><!doctype html>
<html>
	<head>
		<title>Choose Flower</title>
		<link rel="stylesheet" type="text/css" href="assets/choseflower.css">
	</head>
	<body>
		<h2>Flower Selection</h2>
		<?php
		foreach ($flowers as $flower) {
			if (!$cuser->hasFlower($flower)) $hasunstartedflowers = true;

			printf(
				'<form><input type="hidden" name="a" value="chose%s"><input type="image" src="img/%s%sIcon.png"></form>',
			strtolower($flower), (!$cuser->hasFlower($flower) ? 'gray/' : ''), $flower);
		}

		if (isset($hasunstartedflowers)) {
			echo "<p><em>Gray flowers are flowers you haven't started yet. Select one to grow a new flower!</em></p>";
		}
		?>
		<hr><div class="box" style="background-color:#ffff00">** Galaxy Special: <?=$galaxyspecial ?> **<br><?=$statustext ?></div>
	</body>
</html>
