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
	global $userdata, $userflowerdata;
	
	$multiplier = 1;
	if ($userflowerdata['fertilizer'] > 0) {
		$multiplier = $multiplier * 3;
	}
	if ($userflowerdata['superfertilizer'] > 0) {
		$multiplier = $multiplier + 1 * 5;
	}
	if ($userflowerdata['giga'] > 0) {
		$multiplier = $multiplier * 4;
	}
	if ($userflowerdata['water'] > 2) {
		$multiplier = $multiplier * 2;
	}
	
	return resourceformat($userflowerdata['basicgrowthrate'] * 0.36 * $multiplier);
}

/**
 * 
 * 
 * @return int
 */
function formatheight($height) {
	return number_format($height,8,'.',' ');
}


/**
 * Makes a list of items or things to purchase.
 * 
 * @param int $show Page to be on when the link has been clicked.
 * @param string $a Action of list.
 * @param array $quantities List of amounts to be in the list.
 * @param int $costperone Cost of one item in the list.
 * @param string $text Text to be for every list item.<br>
 * 					   %q - Quantity for the current list item.<br>
 * 					   %c - Cost for the current list item.
 * @param bool $format Format all values.
 */
function itemlist($show,$a,$quantities,$costperone,$text,$format = true) {
	$out = '';
	foreach ($quantities as $quantity) {
		if ($format) {
			$output = str_replace('%q', number_format($quantity), $text);
			$output = str_replace('%c', number_format($costperone * $quantity), $output);
		} else {
			$output = str_replace('%q', $quantity, $text);
			$output = str_replace('%c', ($costperone * $quantity), $output);
		}
		$out .= '<li><a href="' . alink($show,$a,$quantity) . '">' . $output . '</a></li>';
	}
	return $out;
}

/**
 *
 */
function send_mail($recipient_id,$inbox_message,$sender_name,$sender_id = 'dead410734') {
	global $mysqli;
	
	$recipient_id = mysqli_real_escape_string($mysqli,$recipient_id);
	$inbox_message = mysqli_real_escape_string($mysqli,$inbox_message);
	$sender_name = mysqli_real_escape_string($mysqli,$sender_name);
	$sender_id = mysqli_real_escape_string($mysqli,$sender_id);
	
	SqlQuery("INSERT INTO `inbox` (`recipient_id`, `sender_id`, `sender_name`, `message`) VALUES ('$recipient_id', '$sender_id', '$sender_name', '$inbox_message');");
}

/**
 * Throw a fatal error.
 */
function fs_error($msg) {
	include('pages/other/error.php');
	die();
}

?>
