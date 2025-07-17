<?php
$start = microtime(true);

include('config.php');
include('function/function.php');
include('pages/title.php');

if (!isset($_GET['uid'])) fs_error('Invalid UID.');
if (!isset($_GET['gid'])) fs_error("Invalid GID.");

$uid	= (isset($_GET['uid']) ? $_GET['uid'] : 0);
$gid	= (isset($_GET['gid']) ? $_GET['gid'] : 'Daisy');
$show	= (isset($_GET['show']) ? $_GET['show'] : 1);
$ver	= (isset($_GET['ver']) ? $_GET['ver'] : 0);
$menu	= (isset($_GET['justshortcuts']) ? true : null);

// Special pages
if ($show == 18) fs_error("Buying stars aren't supported.<br>Sorry, but I don't want your money!");
if ($show == 999) header('Location: flowerschool.php');

// Check $gid.
if (!in_array($gid, $flowers)) fs_error('Unknown flower.');

// Blacklisted UIDs
if ($uid == '0000000000000000') fs_error('Blacklisted UID.<br>Reason: Android SDK Emulator');
if ($uid == '')					fs_error('Blacklisted UID.<br>Reason: Blank UID.');

$cuser = new user(false, $uid);
$cuser->updateUserInfo();
$cuser->updateUserFlower($gid);

if (!$cuser->getData('username')) {
	// User doesn't exist.
	fs_error("User doesn't exist.");
}

if (isset($_GET['bandebug'])) {
	include('pages/other/banned.php');
	die();
}

$timedifference = microtime(true) - $cuser->getData('lastview');

// Give seed income.
$seedearnamount = $timedifference * ($cuser->getData('seedincome') / 216000);
$cuser->abveData('seeds', $seedearnamount);

// Grow the flower!
$heightgrowthamount = $timedifference * ($cuser->flower[$gid]->getflowergrowthrate(false) / 216000);
$cuser->flower[$gid]->abveData('height', $heightgrowthamount);

// Deplete resources.
$cuser->flower[$gid]->abveData('water', 0-($timedifference / 216000));
$cuser->flower[$gid]->abveData('sun', 0-($timedifference / 216000));

$cuser->setData('lastview', microtime(true));

if (isset($_REQUEST['a'])) include('pages/a.php');

?>
<!doctype html>
<html>
	<head>
		<title>Flower menu</title>
		<script>function open_page(show) { window.open('<?=pagebase() ?>&show=' + show, '_top'); }</script>
		<script src="assets/core.js"></script>
		<link rel="stylesheet" type="text/css" href="assets/style.css">
		<?php if ($cuser->getData('yellow_background')) { ?>
		<style>body{background-color:#F8ECC2}</style>
		<?php } ?>
		<?php if ($cuser->getData('nostalgia')) { ?>
		<link rel="stylesheet" type="text/css" href="assets/nostalgia.css">
		<?php } ?>
		<!-- ****** faviconit.com favicons ****** -->
		<link rel="shortcut icon" href="/assets/icons/favicon.ico">
		<link rel="icon" sizes="16x16 32x32 64x64" href="/assets/icons/favicon.ico">
		<link rel="icon" type="image/png" sizes="196x196" href="/assets/icons/favicon-192.png">
		<link rel="icon" type="image/png" sizes="160x160" href="/assets/icons/favicon-160.png">
		<link rel="icon" type="image/png" sizes="96x96" href="/assets/icons/favicon-96.png">
		<link rel="icon" type="image/png" sizes="64x64" href="/assets/icons/favicon-64.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16.png">
		<link rel="apple-touch-icon" href="/assets/icons/favicon-57.png">
		<link rel="apple-touch-icon" sizes="114x114" href="/assets/icons/favicon-114.png">
		<link rel="apple-touch-icon" sizes="72x72" href="/assets/icons/favicon-72.png">
		<link rel="apple-touch-icon" sizes="144x144" href="/assets/icons/favicon-144.png">
		<link rel="apple-touch-icon" sizes="60x60" href="/assets/icons/favicon-60.png">
		<link rel="apple-touch-icon" sizes="120x120" href="/assets/icons/favicon-120.png">
		<link rel="apple-touch-icon" sizes="76x76" href="/assets/icons/favicon-76.png">
		<link rel="apple-touch-icon" sizes="152x152" href="/assets/icons/favicon-152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/favicon-180.png">
		<meta name="msapplication-TileColor" content="#FFFFFF">
		<meta name="msapplication-TileImage" content="/assets/icons/favicon-144.png">
		<meta name="msapplication-config" content="/browserconfig.txt">
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
			<table class="fsbox">
				<tr>
					<td colspan=2>
						<?=flag($cuser->getData('country')) ?>
						<a onclick='document.getElementById("flowerimg").src="img/SocIcon.png";'>
							<img id="flowerimg" src="img/<?=($cuser->getData('powerlevel') == 0 ? 'gray/' : '')?><?=$gid ?>Icon.png" width=24>
						</a>
						<a class="user" href="<?=pagelink(12) ?>&id=<?=$cuser->getData('userID') ?>" style="color:#<?= powcolor($cuser->getData('powerlevel')) ?>">
							<?=$cuser->getData('username') ?>
						</a>
						<span style="display:inline-block;margin-top:0.21em;">
						<?=formatheight($cuser->flower[$gid]->getData('height')) ?> (cm)
						</span>
					</td>
				</tr>
				<tr>
					<td class="fs_seeds">Seeds: <?=($debug ? '&infin;' : '$' . number_format($cuser->getData('seeds'),2)) ?></td>
					<td class="fs_stars">Stars: <?=($debug ? '&infin;' : '*' . number_format($cuser->getData('stars'),2)) ?></td>
				</tr>
				<?php if ($cuser->getData('PGM')) { ?>
				<tr><td class="fs_pgm" colspan=2>PGM: <?=$cuser->getData('PGM') ?></td></tr>
				<?php } ?>
				<tr>
					<td class="fs_water">Water: <?=number_format($cuser->flower[$gid]->getData('water'),2) ?> hours</td>
					<td class="fs_sun">Sun: <?=number_format($cuser->flower[$gid]->getData('sun'),2) ?> hours</td>
				</tr>
				<tr>
					<td class="fs_giga">Giga: <?=number_format($cuser->flower[$gid]->getData('giga'),2) ?> hours</td>
					<td class="fs_warp">Warp: <?=number_format($cuser->flower[$gid]->getData('warp'),2) ?> hours</td>
				</tr>
				<tr>
					<td colspan=2>Growth rate: <?=$cuser->flower[$gid]->getflowergrowthrate() ?> cm/hour </td>
				</tr>
			</table>
		</div>
		<?php if ($ver < 600 && $ver != 0) { ?>
		<div class="box outer" style="background-color:#eee033">
			Still using a legacy flower app? <a href="/">Check out the new version of the app.</a>
			It is much smaller, works on more devices and it has many improvements and bug fixes.
		</div>
		<?php } ?>
		<?php
		if (file_exists('pages/' . $show . '.php')) {
			if ($show != 1337 || $cuser->getData('powerlevel') == 4) {
				if (!$menu) {
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

if ($cuser->getData('powerlevel') > 1) {
	$menuitems[] = ['name' => 'Admin tools', 'page' => 420];
}
		?>
		<div class="box outer menubar" style="text-align:center;">
			<?php menubar($cuser->getData('menustyle')); ?>
		</div>
		<?=($cuser->getData('zoom') ? zoom_menu() : '') ?>
		<div class="box outer" style="text-align:center">
		<?php
		if ($cuser->getData('powerlevel') == 4) {
			if (isset($_GET['debug'])) {
				echo '<table class="debugtable"><tr><td>GET requests:<pre>'. print_r($_GET, true);
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
