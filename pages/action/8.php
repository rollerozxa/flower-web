<?php

///
/// 8 - Inbox
///

switch ($_REQUEST['a']) {
	case 'deletemail':
		if (is_numeric($quantity)) {
			$maildata = fetch("SELECT * FROM inbox WHERE mailID = ? LIMIT 1", [$quantity]);
			if ($maildata['recipient_id'] == $userdata['userID']) {
				query("DELETE FROM inbox WHERE mailID = ?", [$quantity]);
			} else {
				header_msg("This isn't your mail!", "ff7777");
			}
		} else {
			header_msg("...Huh?", "ff7777");
		}
	break;
}

?>