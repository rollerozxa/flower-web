<?php

///
/// 8 - Inbox
///

switch ($_REQUEST['a']) {
	case 'deletemail':
		if (is_numeric($quantity)) {
			$maildata = SqlQueryFetchRow("SELECT * FROM inbox WHERE mailID = $quantity;");
			if ($maildata['recipient_id'] == $userdata['userID']) {
				SqlQuery("DELETE FROM inbox WHERE mailID = $quantity");
			} else {
				header_msg("This isn't your mail!", "ff7777");
			}
		} else {
			header_msg("...Huh?", "ff7777");
		}
	break;
}

?>