<?php

///
/// 10 - Global Compost
///

switch ($_REQUEST['a']) {
	case 'heap':
		if ($quantity < $userdata['seeds']) {
			query("UPDATE user SET seeds = ? WHERE user.uid = ?", [($userdata['seeds'] - $quantity), $userdata['uid']]);
			query("UPDATE globalcompost SET compostsize = compostsize + ? ORDER BY compostID DESC LIMIT 1", [$quantity]);
			$compost = fetch("SELECT * FROM globalcompost ORDER BY compostID DESC LIMIT 1");
			if ($compost['compostsize'] >= $compost['compostmaxsize']) {
				query("INSERT INTO globalcompost (compostmaxsize, compostprize) VALUES (?,?)", [heapsize(rand(1,6)), rand(1,9)]);
				header_msg("You threw " . $quantity . " seeds onto the heap and filled up the heap!");
			} else {
				header_msg("Threw " . $quantity . " seeds onto the heap!");
			}
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
}

?>