<?php

/**
 * Get price of bulk items for the current day.
 *
 * @return int Price of bulk items per hour in stars.
 */
function getbulkprice() {
	if (bulksale()) {
		return 30;
	} else {
		return 40;
	}
}

/**
 * Is bulk items on sale?
 *
 * @return bool Is bulk items on sale?
 */
function bulksale() {
	if (date('d') == 31) {
		return true;
	} else {
		return false;
	}
}