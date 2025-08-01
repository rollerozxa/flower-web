<?php

///
/// 3 - Friends
///

switch ($_REQUEST['a']) {
	case 'addfriend':
		if (($_POST['friendcode'] >= 100000000) && ($_POST['friendcode'] <= 999999999)) {
			if ($_POST['friendcode'] != $cuser->getData('friendcode')) {
				if (result("SELECT COUNT(*) FROM user WHERE friendcode = ?", [$_POST['friendcode']]) == 1) {
					$friendeddata = fetch("SELECT * FROM user WHERE friendcode = ?", [$_POST['friendcode']]);
					if (result("SELECT COUNT(*) FROM friend_connections WHERE (friender_userid = ? OR friended_userid = ?) AND friended_userid = ?", [$cuser->getData('userID'), $cuser->getData('userID'), $friendeddata['userID']]) == 0) {
						query("INSERT INTO friend_connections (friender_userid, friended_userid) VALUES (?,?)", [$cuser->getData('userID'), $friendeddata['userID']]);
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
		$frnd = result("SELECT COUNT(*) FROM friend_connections WHERE connection_id = ? AND (friender_userid = ? OR friended_userid = ?)",
						[$quantity, $cuser->getData('userID'), $cuser->getData('userID')]);
		if ($frnd == 1) {
			query("DELETE FROM friend_connections WHERE connection_id = ?", [$quantity]);
			header_msg("You've removed a friend.");
		} else {
			header_msg("...Huh?", "ff7777");
		}
	break;
	// This action is actually coming from page 15, but you get redirected to page 3-
	case 'sendmessage':
		if (!isset($_POST['recipient']) || !is_numeric($_POST['recipient'])) $error = true;
		if (!isset($_POST['message'])) $error = true;

		if (!isset($error)) {
			send_mail($_POST['recipient'], $_POST['message'], 'Private message from '.$cuser->getData('username'), $cuser->getData('userID'));
		}
	break;
}