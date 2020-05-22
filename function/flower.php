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
 * Format flower height.
 *
 * @param int $height Raw flower height.
 * @return string Formatted flower height.
 */
function formatheight($height) {
	return number_format($height,8,'.',' ');
}