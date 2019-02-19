<?php

$start = microtime(true);

//error_reporting(E_ALL & ~E_WARNING);

include('function/function.php');
include('config.php');
include('mysql.php');
include('pages/title.php');

if (!isset($_GET['uid'])) fs_error('Invalid UID.');
if (!isset($_GET['gid'])) fs_error("Invalid GID.");

$uid = (isset($_GET['uid']) ? $_GET['uid'] : 0);
$gid = (isset($_GET['gid']) ? $_GET['gid'] : 'Daisy');
$show = (isset($_GET['show']) ? $_GET['show'] : 1);
$ver = (isset($_GET['ver']) ? $_GET['ver'] : 999);
$menupage = (isset($_GET['justshortcuts']) ? true : null);

if ($show == 999) header('Location: flowerschool.php');

if (!in_array($gid, $flowers)) fs_error('Unknown flower.');
if ($show == 18) fs_error("Buying stars aren't supported.<br>Sorry, but I don't want your money!");

update_userdata();

if (!isset($userdata['username'])) {
	// User doesn't exist.
	fs_error("User doesn't exist.");
}

if (false) {
	include('pages/other/banned.php');
	die;
}

// Give seed income.
$seedearnamount = (time() - $userdata['lastview']) * ($userdata['seedincome'] / 3600);
SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] + $seedearnamount) . "' WHERE `user`.`uid` = '$uid';");
$heightgrowthamount = (time() - $userdata['lastview']) * ($userdata['seedincome'] / 3600);
SqlQuery("UPDATE `user` SET `lastview` = '" . time() . "' WHERE `user`.`uid` = '$uid';");
update_userdata();

if (isset($_REQUEST['a'])) include('pages/a.php');

?>
<!doctype html>
<html>
	<head>
		<title>Flower menu</title>
		<script>function open_win(show) { window.open('?uid=<?=$uid ?>&gid=<?=$gid ?>&show=' + show, '_top'); }</script>
		<script src="assets/core.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<?php if ($userdata['yellow_background']) { ?>
		<style>body{background-color:#F8ECC2}</style>
		<?php } ?>
		<!-- ****** faviconit.com favicons ****** -->
		<link rel="shortcut icon" href="/assets/icons/favicon.ico?v=2">
		<link rel="icon" sizes="16x16 32x32 64x64" href="/assets/icons/favicon.ico?v=2">
		<link rel="icon" type="image/png" sizes="196x196" href="/assets/icons/favicon-192.png?v=2">
		<link rel="icon" type="image/png" sizes="160x160" href="/assets/icons/favicon-160.png?v=2">
		<link rel="icon" type="image/png" sizes="96x96" href="/assets/icons/favicon-96.png?v=2">
		<link rel="icon" type="image/png" sizes="64x64" href="/assets/icons/favicon-64.png?v=2">
		<link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32.png?v=2">
		<link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16.png?v=2">
		<link rel="apple-touch-icon" href="/assets/icons/favicon-57.png?v=2">
		<link rel="apple-touch-icon" sizes="114x114" href="/assets/icons/favicon-114.png?v=2">
		<link rel="apple-touch-icon" sizes="72x72" href="/assets/icons/favicon-72.png?v=2">
		<link rel="apple-touch-icon" sizes="144x144" href="/assets/icons/favicon-144.png?v=2">
		<link rel="apple-touch-icon" sizes="60x60" href="/assets/icons/favicon-60.png?v=2">
		<link rel="apple-touch-icon" sizes="120x120" href="/assets/icons/favicon-120.png?v=2">
		<link rel="apple-touch-icon" sizes="76x76" href="/assets/icons/favicon-76.png?v=2">
		<link rel="apple-touch-icon" sizes="152x152" href="/assets/icons/favicon-152.png?v=2">
		<link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/favicon-180.png?v=2">
		<meta name="msapplication-TileColor" content="#FFFFFF">
		<meta name="msapplication-TileImage" content="/assets/icons/favicon-144.png?v=2">
		<meta name="msapplication-config" content="/browserconfig.txt?v=2">
		<!-- ****** faviconit.com favicons ****** -->
		<!--<meta name="viewport" content="width=320" />-->
	</head>
	<body>
		<script src="assets/loaded.js"></script>
		<!--(390 min until next save)-->
		<?=($urgentmessage != "" ? '<span class="urgent">Urgent message - ' . $urgentmessage . '</span><br><br>' : '') ?>
		<?=(isset($headermsg) ? $headermsg : '') ?>
		<div class="box" style="background-color:#ffff00">** Galaxy Special: <?php echo $galaxyspecial ?> **<br><?php echo $statustext ?></div>
		<span class="title"><font size="16"><?php echo get_page_title($show); ?></font></span>
		<div class="box outer">
			<table class="fsbox" style="width:100%">
				<tr>
					<td colspan=2>
						<img src="flags/<?=$userdata['country']?>.png">
						<a onclick='document.getElementById("flowerimg").src="img/socicon.png";'>
							<img id="flowerimg" src="img/<?php echo $gid; ?>Icon.png" width=24>
						</a>
						<strong style="color:#<?= powerlevelcolor($userdata['powerlevel']) ?>"><?php echo $userdata['username'] ?></strong>
						<span style="display:inline-block;margin-top:0.21em;">
						<?=formatheight($userdata['height']) ?> (cm)
						</span>
					</td>
				</tr>
				<tr>
					<td bgcolor=#ccffcc>Seeds: <?php echo ($debug ? '&infin;' : '$' . number_format($userdata['seeds'],2)) ?></td>
					<td bgcolor=#ccccff>Stars: <?php echo ($debug ? '&infin;' : '*' . number_format($userdata['stars'],2)) ?></td>
				</tr>
				<?php if ($userdata['PGM']) { ?>
				<tr><td bgcolor=#ff5555 colspan=2>PGM: <?php echo $userdata['PGM'] ?></td></tr>
				<?php } ?>
				<tr>
					<td bgcolor=#8888ff>Water: <?php echo number_format($userdata['water'],2) ?> hours</td>
					<td bgcolor=#ffff88>Sun: <?php echo number_format($userdata['sun'],2) ?> hours</td>
				</tr>
				<tr>
					<td bgcolor=pink>Giga: <?php echo number_format($userdata['giga'],2) ?> hours</td>
					<td bgcolor=grey>Warp: <?php echo number_format($userdata['warp'],2) ?> hours</td>
				</tr>
				<tr>
					<td colspan=2>Growth rate: <?php echo getflowergrowthrate(); ?> cm/hour </td>
				</tr>
			</table>
		</div>
		<?php if ($ver < 600) { ?>
		<div class="box outer" style="background-color:#eee033">
			Still using a legacy flower app? <a href="/?downloadnew">Check out the new version of the app.</a>
			It is much smaller, works on more devices and it has many improvements and bug fixes.
		</div>
		<?php } ?>
		<?php
		if (file_exists('pages/' . $show . '.php')) {
			if ($show != 1337 || $userdata['powerlevel'] == 4) {
				if (!$menupage) {
					echo '<div class="box outer">';
						include('pages/' . $show . '.php');
					echo '</div>';
				}
			} else {
				echo '<div class="box outer"><center><h1>403</h1>You aren\'t allowed to access this page.</center></div>';
			}
		} else {
			echo '<div class="box outer"><center><h1>404</h1>This page doesn\'t exist.</center></div>';
		}
		?>
		<div class="box outer menubar" style="text-align:center;">
			<?php menubar($userdata['menustyle']); ?>
			<!--<button onclick="open_win(25)">PGM Bookie</button>-->
		</div>
		<div class="box" style="margin:auto;background-color:black;color:white;">
			Zoom:
			<button onclick="zoom(1.0)">100%</button>
			<button onclick="zoom(1.5)">150%</button>
			<button onclick="zoom(2.0)">200%</button>
		</div>
		<div class="box outer" style="text-align:center">
		<?php
		if (islocal()) {
			if (isset($_GET['debug'])) { 
				echo '<table class="debugtable"><tr><td>GET requests:<pre>'; print_r($_GET); 
				echo '</pre></td><td>$userdata:<pre>'; print_r($userdata);
				echo '</pre></td></tr></table>';
			} else {
				echo '<a href="' . $_SERVER['REQUEST_URI'] . '&debug">Show debug info</a>';
			}
		}
		$rendertime = microtime(true) - $start;
		echo sprintf("<br>Page rendered in %1.3f seconds (%dKB of memory used)", $rendertime, memory_get_usage(false) / 1024);
		?>
		</div>
	</body>
</html>
