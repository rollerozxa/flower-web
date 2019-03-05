<?php

/**
 * Format raw resource values.
 *
 * @param int $rawamount Raw value.
 * @return string Formatted resource value.
 */
function resourceformat($rawamount) {
	return number_format($rawamount,2);
}

/**
 * Get full growth rate for the currently logged in user.
 *
 * @return string Basic growth rate.
 */
function getflowergrowthrate() {
	global $userdata;

	$multiplier = 1;
	if ($userdata['fertilizer'] > 0) {
		$multiplier = $multiplier * 3;
	}
	if ($userdata['superfertilizer'] > 0) {
		$multiplier = $multiplier + 1 * 5;
	}
	if ($userdata['giga'] > 0) {
		$multiplier = $multiplier * 4;
	}
	if ($userdata['water'] > 2) {
		$multiplier = $multiplier * 2;
	}

	return resourceformat($userdata['basicgrowthrate'] * 0.36 * $multiplier);
}

/**
 * Format flower height.
 *
 * @param int $height Raw flower height.
 * @return string Formatted flower height.
 */
function formatheight($height) {
	return number_format($height,8,'.',' ');
}

?>