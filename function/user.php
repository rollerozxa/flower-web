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
		case '2': return '8b008b';
		case '3': return 'cc0000';
		case '4': return '008800';
		
	}
}

?>