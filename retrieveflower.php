<?php
header('Content-Type: application/octet-stream');
error_reporting(~E_WARNING);

include('function/core.php');
include('function/mysql.php');
include('function/user.php');
require('function/userlib.php');
include('function/extra/retrieveflower.php');
include('config.php');

// Kaitai runtime & data
require('vendor/kaitai-io/kaitai_struct_php_runtime/lib/Kaitai/Struct/Stream.php');
require('vendor/kaitai-io/kaitai_struct_php_runtime/lib/Kaitai/Struct/Struct.php');
require('function/kaitai/retrieveflower_POST.php');

// Get data sent from the app.
$postargs = RetrieveflowerPost::fromFile('php://input');

$act	= $postargs->action();
$uid	= $postargs->uid();
$gid	= $postargs->flower();
$name	= $postargs->username();
$flag	= $postargs->country();

// Check if user exists, and if not, create a new user.
if (result("SELECT COUNT(*) FROM user WHERE uid = ?", [$uid]) != 1) {
	query("INSERT INTO user (uid,friendcode,lastview) VALUES (?,?,?)", [$uid, make_friendcode(), time()]);
}

// Retrieve flower data from DB.
$cuser = new user(false, $uid);
$cuser->updateUserInfo();

if (!$cuser->hasFlower($gid) && $act != 'r'){
	query("INSERT INTO user_flower (flower,uid) VALUES (?,?)", [$gid, $uid]);
	$cuser->toggleHasFlower($gid);
}

$cuser->updateUserFlower($gid);

if ($act == 'ws') {
	if ($name != $cuser->getData('username') && $name != '_BLANK_') {
		$cuser->setData('username', $name);
	}
	if ($flag != $cuser->getData('country') && $flag != 'unknown' && $flag != '') {
		$cuser->setData('country', $flag);
	}
}

// put into a separate file because I'm sick of constantly fucking it up
require('retrieveflower_bin.php');