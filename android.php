<?php
/* Android.php
 * This is for /android, a generic endpoint that other of Adam's games, as well as old versions of the flower games use.
 *
 * The following games request /android:
 * - Attack Breaker Pro
 * - Public Opinion Predictor
 *
 * In those cases, they're separated by the GET argument 'gid'.
 */

$gid = (isset($_GET['gid']) ? $_GET['gid'] : null);
$ver = (isset($_GET['v']) ? $_GET['v'] : null);

if (!$gid && !$ver) die('nOwO');

header('Content-Type: application/octet-stream');

if ($gid == 'abp') {
	// NYI
	//require('retrieveabp.php');
} else if ($gid == 'poll') {
	// Dummy request for Public Opinion Precitor
	require('retrievepop.php');
}


if ($ver == 1) {
	// A dummy request for the earliest version of the flower games for Android
	// (I tested this with Origami Daisy v1.01 or something, I think)
	require('retrieveclassicflower.php');
}