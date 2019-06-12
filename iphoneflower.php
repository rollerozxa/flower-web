<?php

$start = microtime(true);

//error_reporting(E_ALL & ~E_WARNING);

include('function/function.php');
include('config.php');
include('pages/title.php');

if (!isset($_GET['uid'])) fs_error('Invalid UID.');
if (!isset($_GET['gid'])) fs_error("Invalid GID.");

$uid = (isset($_GET['uid']) ? $_GET['uid'] : 0);
$gid = (isset($_GET['gid']) ? $_GET['gid'] : 'Daisy');
$show = (isset($_GET['show']) ? $_GET['show'] : 1);
$ver = (isset($_GET['ver']) ? $_GET['ver'] : 999);
$menupage = (isset($_GET['justshortcuts']) ? true : null);

// Special pages
if ($show == 18) fs_error("Buying stars aren't supported.<br>Sorry, but I don't want your money!");
if ($show == 999) header('Location: flowerschool.php');

// Check $gid. This makes it safe to be used in SQL queries.
if (!in_array($gid, $flowers)) fs_error('Unknown flower.');

// Blacklisted UIDs
if ($uid == '0000000000000000') fs_error('Blacklisted UID.<br>Reason: Android SDK Emulator');

update_userdata();

if (!isset($userdata['username'])) {
	// User doesn't exist.
	fs_error("User doesn't exist.");
}

if (isset($_GET['bandebug'])) {
	include('pages/other/banned.php');
	die();
}

$timedifference = microtime(true) - $userdata['lastview'];

// Give seed income.
$seedearnamount = $timedifference * ($userdata['seedincome'] / 216000);
query("UPDATE user SET seeds = ? WHERE uid = ?", [($userdata['seeds'] + $seedearnamount), $uid]);

// Grow the flower!
$heightgrowthamount = $timedifference * (getflowergrowthrate(false) / 216000);
query("UPDATE user_$gid SET height = ? WHERE uid = ?", [$userdata['height'] + $heightgrowthamount, $uid]);

// Deplete resources.
query("UPDATE user_$gid SET water = water - ?, sun = sun - ? WHERE uid = ?", [($timedifference / 216000), ($timedifference / 216000), $uid]);

query("UPDATE user SET lastview = ? WHERE uid = ?", [microtime(true), $uid]);
update_userdata();

if (isset($_REQUEST['a'])) include('pages/a.php');

?>
<!doctype html>
<html>
	<head>
		<title>Flower menu</title>
		<script>function open_win(show) { window.open('<?=pagebase() ?>&show=' + show, '_top'); }</script>
		<script src="assets/core.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<?php if ($userdata['yellow_background']) { ?>
		<style>body{background-color:#F8ECC2}</style>
		<?php } ?>
		<?php if ($userdata['nostalgia']) { ?>
		<link rel="stylesheet" type="text/css" href="assets/nostalgia.css">
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
		<meta name="format-detection" content="telephone=no">
	</head>
	<body>
		<script src="assets/loaded.js"></script>
		<!--(390 min until next save)-->
		<?=($urgentmessage != "" ? '<span class="urgent">Urgent message - ' . $urgentmessage . '</span><br><br>' : '') ?>
		<?=(isset($headermsg) ? $headermsg : '') ?>
		<div class="box" style="background-color:#ffff00">** Galaxy Special: <?=$galaxyspecial ?> **<br><?=$statustext ?></div>
		<span class="title" style="font-size:36pt"><?=get_page_title($show) ?></span>
		<div class="box outer">
			<table class="fsbox" style="width:100%">
				<tr>
					<td colspan=2>
						<img src="flags/<?=$userdata['country'] ?>.png">
						<a onclick='document.getElementById("flowerimg").src="img/SocIcon.png";'>
							<img id="flowerimg" src="img/<?=($userdata['powerlevel'] == 0 ? 'gray/' : '')?><?=$gid ?>Icon.png" width=24>
						</a>
						<a class="user" href="<?=pagelink(12) ?>&id=<?=$userdata['userID'] ?>" style="color:#<?= powcolor($userdata['powerlevel']) ?>">
							<?=$userdata['username'] ?>
						</a>
						<span style="display:inline-block;margin-top:0.21em;">
						<?=formatheight($userdata['height']) ?> (cm)
						</span>
					</td>
				</tr>
				<tr>
					<td class="fs_seeds">Seeds: <?=($debug ? '&infin;' : '$' . number_format($userdata['seeds'],2)) ?></td>
					<td class="fs_stars">Stars: <?=($debug ? '&infin;' : '*' . number_format($userdata['stars'],2)) ?></td>
				</tr>
				<?php if ($userdata['PGM']) { ?>
				<tr><td class="fs_pgm" colspan=2>PGM: <?=$userdata['PGM'] ?></td></tr>
				<?php } ?>
				<tr>
					<td class="fs_water">Water: <?=number_format($userdata['water'],2) ?> hours</td>
					<td class="fs_sun">Sun: <?=number_format($userdata['sun'],2) ?> hours</td>
				</tr>
				<tr>
					<td class="fs_giga">Giga: <?=number_format($userdata['giga'],2) ?> hours</td>
					<td class="fs_warp">Warp: <?=number_format($userdata['warp'],2) ?> hours</td>
				</tr>
				<tr>
					<td colspan=2>Growth rate: <?=getflowergrowthrate() ?> cm/hour </td>
				</tr>
			</table>
		</div>
		<?php if ($ver < 600) { ?>
		<div class="box outer" style="background-color:#eee033">
			Still using a legacy flower app? <a href="/">Check out the new version of the app.</a>
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

if ($userdata['powerlevel'] > 1) {
	$menuitems[] = ['name' => 'Admin tools', 'page' => 420];
}
		?>
		<div class="box outer menubar" style="text-align:center;">
			<?php menubar($userdata['menustyle']); ?>
			<!--<button onclick="open_win(25)">PGM Bookie</button>-->
		</div>
		<?php if ($userdata['zoom']) { ?>
		<div class="box zoom">
			Zoom:
			<button onclick="zoom(1.0)">100%</button>
			<button onclick="zoom(1.5)">150%</button>
			<button onclick="zoom(2.0)">200%</button>
		</div>
		<?php } ?>
		<div class="box outer" style="text-align:center">
		<?php
		if (islocal()) {
			if (isset($_GET['debug'])) {
				echo '<table class="debugtable"><tr><td>GET requests:<pre>'; print_r($_GET);
				echo '</pre></td><td>$userdata:<pre>'; print_r($userdata);
				echo '</pre></td></tr></table>';
			} else {
				echo '<a href="'.$_SERVER['REQUEST_URI'].'&debug">Show debug info</a>';
			}
		}
		$rendertime = microtime(true) - $start;
		printf("<br>Page rendered in %1.3f seconds (%dKB of memory used)", $rendertime, memory_get_usage(false) / 1024);
		?>
		</div>
	</body>
</html>