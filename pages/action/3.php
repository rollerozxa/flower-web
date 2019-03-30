<?php

///
/// 3 - Friends
///

switch ($_REQUEST['a']) {
	case 'addfriend':
		if (($_POST['friendcode'] >= 100000000) && ($_POST['friendcode'] <= 999999999)) {
			if ($_POST['friendcode'] != $userdata['friendcode']) {
				if (result("SELECT COUNT(*) FROM user WHERE friendcode = ?", [$_POST['friendcode']]) == 1) {
					$friendeddata = fetch("SELECT * FROM user WHERE friendcode = ?", [$_POST['friendcode']]);
					if (result("SELECT COUNT(*) FROM friend_connections WHERE (friender_userid = ? OR friended_userid = ?) AND friended_userid = ?", [$userdata['userID'], $userdata['userID'], $friendeddata['userID']]) == 0) {
						query("INSERT INTO friend_connections (friender_userid, friended_userid) VALUES (?,?)", [$userdata['userID'], $friendeddata['userID']]);
						header_msg("You've added {$friendeddata['username']} as your friend!");
					} else {
						header_msg("You're already friends with {$friendeddata['username']}!", "ff7777");
					}
				} else {
					header_msg("A user with the friend code doesn't exist.", "ff7777");
				}
			} else {
				header_msg("You can't friend yourself.", "ff7777");
			}
		} else {
			header_msg("Friend code value is out of reach.", "ff7777");
		}
	break;
	case 'removefriend':
		if (result("SELECT COUNT(*) FROM friend_connections WHERE connection_id = ? AND (friender_userid = ? OR friended_userid = ?)", [$quantity, $userdata['userID'], $userdata['userID']]) == 1) {
			query("DELETE FROM friend_connections WHERE connection_id = ?", [$quantity]);
			header_msg("You've removed a friend.");
		} else {
			header_msg("...Huh?", "ff7777");
		}
	break;
}

?>