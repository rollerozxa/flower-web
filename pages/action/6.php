<?php

///
/// 6 - Stars Draw
///


switch ($_REQUEST['a']) {
	case 'buystartickets':
		if ($quantity * 2 <= $userdata['stars']) {
			header_msg("Bought $quantity stars draw tickets for " . ($quantity * 2) . " stars.");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
}