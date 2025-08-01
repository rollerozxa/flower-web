<?php

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

/**
 * Is $number more or equal to $min and less or equel to $max?
 *
 * If any of the parameters aren't a integer, it returns null.
 *
 * @param int $number
 * @param int $min
 * @param int $max
 * @return bool
 */
function number_between($number, $min, $max) {
	if (!is_numeric($number) || !is_numeric($min) || !is_numeric($max)) return null;
	return ($number >= $min && $number <= $max);
}