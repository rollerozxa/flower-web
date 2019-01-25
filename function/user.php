<?php

/**
 * Turns a given ID into the user's username.
 * Keep in mind this function doesn't check that the ID exists, so please make sure it exists.
 *
 * @param int $ID ID to check.
 * @return string the username of the ID.
 */
function IDtoUsername($ID) {
	$temp = SqlQueryFetchRow("SELECT * FROM user WHERE userID={$ID}");
	return $temp['username'];
}

/**
 * Get color of the current users powerlevel.
 * 
 * @return string Color in hex
 */
function powerlevelcolor() {
	global $userdata;
	switch ($userdata['powerlevel']) {
		case '0': return 'dedede';
		case '1': return '000000';
		case '2': return 'ab20ab';
		case '3': return 'cc0000';
		case '4': return '8c7c00';
	}
}

/**
 * Create a new unique friend code for new users.
 *
 * @return int 
 */
function make_friendcode() {
	$friendcode_unique = false;
	while (!$friendcode_unique) {
		$friendcode = rand(100000000,999999999);
		if (SqlQueryResult("SELECT COUNT(*)  FROM `user` WHERE `friendcode` = '$friendcode'") == 1) {
			// Nothing, continue.
		} else {
			$friendcode_unique = true;
		}
	}
	return $friendcode;
}

?>