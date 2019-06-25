<?php

///
/// 4  - Star Exchange
///

switch ($_REQUEST['a']) {
	case 'buystars':
		if ($quantity < ($userdata['seeds'] / $buyvalue)) {
			query("UPDATE user SET seeds = ?, stars = ? WHERE uid = ?", [($userdata['seeds'] - ($quantity * $buyvalue)), ($userdata['stars'] + $quantity), $uid]);
			header_msg("Bought $quantity stars at a rate of $buyvalue Seeds / Star");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'sellstars':
		if ($quantity < $userdata['stars']) {
			query("UPDATE user SET seeds = ?, stars = ? WHERE uid = ?", [($userdata['seeds'] + ($quantity * $sellvalue)), ($userdata['stars'] - $quantity), $uid]);
			header_msg("Sold $quantity stars at a rate of $sellvalue Seeds / Star");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
}