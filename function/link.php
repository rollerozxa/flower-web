<?php

/**
 * Print out an action link from the given arguments.
 *
 * @param int $show Page
 * @param string $a Action
 * @param int $quantity Quantity
 * @return string The link.
 */
function alink($show,$a = null,$quantity = null) {
	$out = pagelink($show);
	if ($a) $out .= "&a=$a";
	if ($quantity) $out .= "&quantity=$quantity";
	return $out;
}

define('ITEMLIST_NOFORMAT', 0);
define('ITEMLIST_NORMALFORMAT', 1);

/**
 * Makes a list of items or things to purchase.
 *
 * @param int $show Page to be on when the link has been clicked.
 * @param string $a Action of list.
 * @param array $quantities List of amounts to be in the list.
 * @param int $costperone Cost of one item in the list.
 * @param string $text Text to be for every list item.<br>
 *					   %q - Quantity for the current list item.<br>
 * 					   %c - Cost for the current list item.
 * @param custom $format Number formatting mode of list.
 * @return string Generated code for the list.
 */
function itemlist($show,$a,$quantities,$costperone,$text,$format = ITEMLIST_NORMALFORMAT) {
	$out = '';
	foreach ($quantities as $quantity) {
		switch ($format) {
			case ITEMLIST_NOFORMAT:
				$output = str_replace('%q', $quantity, $text);
				$output = str_replace('%c', ($costperone * $quantity), $output);
			break;
			case ITEMLIST_NORMALFORMAT:
				$output = str_replace('%q', number_format($quantity), $text);
				$output = str_replace('%c', number_format($costperone * $quantity), $output);
			break;
		}
		$out .= '<li><a href="' . alink($show,$a,$quantity) . '">' . $output . '</a></li>';
	}
	return $out;
}

/**
 * Return a link to a menu page.
 *
 * @param int $show Page
 * @return string The link.
 */
function pagelink($show) {
	return pagebase()."&show=$show";
}

/**
 * Return the base page requests.
 *
 * @return string The link.
 */
function pagebase() {
	global $uid, $gid;
	return "?uid=$uid&gid=$gid";
}

?>