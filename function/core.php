<?php

/**
 * Update user data in case something has been modified.
 *
 * @param bool $chooseflower Is the function run from the choose flower page? (Don't add flower data)
 */
function update_userdata($chooseflower = false) {
	if ($chooseflower) {
		global $uid, $userdata;
		$userdata = fetch("SELECT * FROM user WHERE uid = ? LIMIT 1", [$uid]);
	} else {
		global $uid, $gid, $userdata;
		$userdata = fetch("SELECT * FROM user JOIN user_$gid ON user.uid = user_$gid.uid WHERE user.uid = ? LIMIT 1", [$uid]);
	}
}

/**
 * Check if user is from within the network.
 *
 * @return boolean Whether user is within the network.
 */
function islocal() {
	if ((substr($_SERVER['REMOTE_ADDR'],0,8) == "192.168.") || ($_SERVER['REMOTE_ADDR'] == "127.0.0.1")) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if $needle starts with $haystack.
 *
 * @param mixed $haystack
 * @param mixed $needle
 * @return boolean
 */
function startsWith($haystack, $needle) {
	$length = strlen($needle);
	return (substr($haystack, 0, $length) === $needle);
}

?>