<?php

///
/// 4  - Star Exchange
///

switch ($_REQUEST['a']) {
	case 'buystars':
		if ($quantity < ($userdata['seeds'] / $buyvalue)) {
			SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] - ($quantity * $buyvalue)) . "' WHERE `user`.`uid` = '" . $userdata['uid'] . "';");
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] + $quantity) . "' WHERE `user`.`uid` = '" . $userdata['uid'] . "';");
			header_msg("Bought $quantity stars at a rate of $buyvalue Seeds / Star");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'sellstars':
		if ($quantity < $userdata['stars']) {
			SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] + ($quantity * $sellvalue)) . "' WHERE `user`.`uid` = '" . $userdata['uid'] . "';");
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] - $quantity) . "' WHERE `user`.`uid` = '" . $userdata['uid'] . "';");
			header_msg("Sold $quantity stars at a rate of $sellvalue Seeds / Star");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
}

?>