<?php

/**
 * Convert powerlevel integer into the color of the powerlevel.
 *
 * @param int $powerlevel
 * @return string Color in hex
 */
function powcolor($powerlevel) {
	switch ($powerlevel) {
		case '0': return '888888';
		case '1': return '000000';
		case '2': return 'ab20ab';
		case '3': return 'cc0000';
		case '4': return '8c7c00';
	}
}

/**
 * Convert powerlevel integer into the name of the powerlevel.
 *
 * @param int $powerlevel
 * @return string Powerlevel name
 */
function powname($powerlevel) {
	switch ($powerlevel) {
		case '0': return 'Banned';
		case '1': return 'Normal User';
		case '2': return 'Moderator';
		case '3': return 'Administrator';
		case '4': return 'Root Administrator';
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