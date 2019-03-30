<?php

/**
 * Turns a given ID into the user's username.
 * Keep in mind this function doesn't check that the ID exists, so please make sure it exists.
 *
 * @param int $id ID to check.
 * @return string the username of the ID.
 */
function IDtoUsername($id) {
	$temp = fetch("SELECT * FROM user WHERE userID = ?", [$id]);
	return $temp['username'];
}

/**
 * Convert powerlevel integer into the color of the powerlevel.
 * 
 * @param int $powerlevel
 * @return string Color in hex
 */
function powerlevelcolor($powerlevel) {
	switch ($powerlevel) {
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
 * @return int Generated friend code.
 */
function make_friendcode() {
	$friendcode_unique = false;
	while (!$friendcode_unique) {
		$friendcode = rand(100000000,999999999);
		// Check if someone already has the friend code.
		if (result("SELECT COUNT(*) FROM user WHERE friendcode = ?", [$friendcode]) != 1) {
			$friendcode_unique = true;
		}
	}
	return $friendcode;
}

?>
