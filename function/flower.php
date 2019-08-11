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
 * @param bool $formatted Should the growth rate be formatted?
 * @return mixed Basic growth rate.
 */
function getflowergrowthrate($formatted = true) {
	global $userdata;

	$multiplier = 1;
	if ($userdata['water'] >= 0 && $userdata['sun'] >= 0) {
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
	} else {
		if ($userdata['sun'] <= 0) {
			return 0;
		} else {
			if ($userdata['nevershrink'] == 1) {
				return 0;
			} else {
				return -1.36;
			}
		}
	}

	if ($formatted)
		return resourceformat($userdata['basicgrowthrate'] * 0.36 * $multiplier);
	else
		return $userdata['basicgrowthrate'] * 0.36 * $multiplier;
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