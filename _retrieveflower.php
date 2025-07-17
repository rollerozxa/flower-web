<?php
// Incomplete rewrite of retrieveflower.php that uses PocketMine's binarystream utils to fully recreate the network response.
// It never fully ended up working.

header('Content-Type: application/octet-stream');
error_reporting(~E_WARNING);

include('config.php');
include('function/core.php');
include('function/mysql.php');
include('function/user.php');
require('function/userlib.php');
include('function/extra/retrieveflower.php');
include('function/extra/retrieveflowerer.php');

// Kaitai runtime & data
require('vendor/kaitai-io/kaitai_struct_php_runtime/lib/Kaitai/Struct/Stream.php');
require('vendor/kaitai-io/kaitai_struct_php_runtime/lib/Kaitai/Struct/Struct.php');
require('function/kaitai/retrieveflower_POST.php');

// Binaryutils
require('vendor/pocketmine/binaryutils/src/Binary.php');
require('vendor/pocketmine/binaryutils/src/BinaryDataException.php');
require('vendor/pocketmine/binaryutils/src/BinaryStream.php');
require('vendor/pocketmine/binaryutils/src/Limits.php');
use pocketmine\utils\BinaryStream;

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

if (!$cuser->getData('has_'.strtolower($gid)) && $act != 'r'){
	query("INSERT INTO user_flower (flower,uid) VALUES (?,?)", [$gid, $uid]);
	query("UPDATE user SET has_$gid = 1 WHERE uid = ?", [$uid]);
}
$gid = "Daisy";

$cuser->updateUserFlower($gid);

if ($act == 'ws') {
	if ($name != $cuser->getData('username') && $name != '_BLANK_') {
		$cuser->setData('username', $name);
	}
	if ($flag != $cuser->getData('country') && $flag != 'unknown' && $flag != '') {
		$cuser->setData('country', $flag);
	}
}

$strm = new BinaryStream();

$strm->putInt(1);		// magic
$strm->putBool(false);	// show_sundown (unused)
$strm->putInt(3);		// fertilizer_multiplier
$strm->putInt(5);		// superfertilizer_multiplier
$strm->putInt(232);		// warp_multiplier
$strm->putInt(2);		// water_multiplier
$strm->putInt(4);		// giga_multiplier

for ($i=0; $i < 2; $i++) {
	$strm->putInt(9);								// version
	putString($strm, $cuser->getData('username'));	// username
	putString($strm, 'pass');						// password (unused)
	putString($strm, $uid);							// uid
	$strm->putByte(3);								// flower_type (TODO: implement this. might need converting)
	$strm->putLong(1486901285500);					// created_stamp (TODO: might need to be dynamic?)
	// hacky stuff. TODO: make this dynamic
	if ($i == 1) {
		$strm->putLong(1509737168332);				// last_access_stamp
		$strm->putLong(10404867904066122);			// height
		$strm->putLong(272742529093529300);			// sun
		$strm->putLong(401429787195929300);			// water
	} else {
		$strm->putLong(1513921382942);				// last_access_stamp
		$strm->putLong(10196089829506122);			// height
		$strm->putLong(272742554788152450);			// sun
		$strm->putLong(401429812888752450);			// water
	}

	// items
	$strm->putInt(10);													// item_count
	$strm->putLong($cuser->flower[$gid]->getData('autowater'));			// items[0] (autowater)
	$strm->putLong($cuser->flower[$gid]->getData('fertilizer'));		// items[1] (fertilizer)
	$strm->putLong(0);													// items[2] (remove ads) (unused)
	$strm->putLong($cuser->flower[$gid]->getData('nevershrink'));		// items[3] (never shrink)
	$strm->putLong(0);													// items[4] (unused)
	$strm->putLong(178523794224754620);									// items[5] (warp)
	$strm->putLong($cuser->flower[$gid]->getData('superfertilizer'));	// items[6] (super fertilizer)
	$strm->putLong($cuser->flower[$gid]->getData('basicgrowthrate'));	// items[7] (soil upgrade)
	$strm->putLong(177279285919330200);									// items[8] (giga fertilizer)
	$strm->putLong(164593525815319);									// items[9] (billions)

	// battle leftovers
	$strm->putInt(0);
	$strm->putLong(0);
	$strm->putLong(0);
	$strm->putBool(false);

	$strm->putLong(0);
	$strm->putInt(0);
	$strm->putInt(0);
	$strm->putInt(0);
	$strm->putLong(1513939108917);					// last_save_stamp
	$strm->putLong(457177804);						// centrennium
	$strm->putLong(0);								// flowerschool_progress (unused)
	for ($j = 0; $j < 8; $j++) {
		$strm->putLong(0);							// v9 reserves
	}
}

$strm->putInt(10);									// rank
$strm->putLong(6871679755962549000);				// player_lid
$strm->putLong(5251623285967638000);				// player_pid
$strm->putBool(false);								// is_mod (TODO: make dynamic)
$strm->putLong(0);									// seeds (TODO: make dynamic)
$strm->putLong(0);									// stars (TODO: make dynamic)
putString($strm, $cuser->getData('country'));		// country_code
$strm->putLong(14);									// lessons_completed
$strm->putLong(14);									// max_lessons
putString($strm, shuffleAdvice());					// advice
$strm->putInt(0);									// reconnect_count (unused)

$strm->putInt(0);									// scores_count (TODO)

$strm->putInt(0);									// prices_count (unused)

$strm->putInt(0);									// messages_count (TODO)

putCountries($strm);

echo $strm->getBuffer();

// put into a separate file because I'm sick of constantly fucking it up
//require('retrieveflower_bin.php');
