<?php

/**
 * Print out an action link from the given arguments.
 * 
 * @param int $show
 * @param string $a
 * @param int $quantity
 */
function alink($show,$a = null,$quantity = null) {
	global $uid, $gid;
	$out = "?uid=$uid&gid=$gid&show=$show";
	if ($a) {
		$out .= "&a=$a";
	}
	if ($quantity != null) {
		$out .= "&quantity=$quantity";
	}
	return $out;
}



?>