<?php

///
/// 4  - Star Exchange
///

switch ($_REQUEST['a']) {
	case 'buystars':
		if ($quantity < ($cuser->getData('seeds') / $buyvalue)) {
			$cuser->abveData('seeds', 0-($quantity * $buyvalue));
			$cuser->abveData('stars', $quantity);
			header_msg("Bought $quantity stars at a rate of $buyvalue Seeds / Star");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'sellstars':
		if ($quantity < $cuser->getData('stars')) {
			$cuser->abveData('seeds', ($quantity * $buyvalue));
			$cuser->abveData('stars', 0-$quantity);
			header_msg("Sold $quantity stars at a rate of $sellvalue Seeds / Star");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
}