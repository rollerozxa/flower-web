<?php

	///
	/// 3 - Friends
	///
switch ($_REQUEST['a']) {
	case 'addfriend':
		if (isset($_POST['friendcode']) && is_numeric($_POST['friendcode'])) {
			if (($_POST['friendcode'] >= 100000000) && ($_POST['friendcode'] <= 999999999)) {
				if ($_POST['friendcode'] != $userdata['friendcode']) {
					if (SqlQueryResult("SELECT COUNT(*) FROM `user` WHERE `friendcode` = '{$_POST['friendcode']}'") == 1) {
						$friendeddata = SqlQueryFetchRow("SELECT * FROM user WHERE friendcode = {$_POST['friendcode']}");
						if (SqlQueryResult("SELECT COUNT(*) FROM `friend_connections` WHERE (`friender_userid` = {$userdata['userID']} OR `friended_userid` = {$userdata['userID']}) AND `friended_userid` = {$friendeddata['userID']} ") == 0) {
							SqlQuery("INSERT INTO `friend_connections` (`friender_userid`, `friended_userid`) VALUES ('{$userdata['userID']}', '{$friendeddata['userID']}')");
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
		} else {
			header_msg("Friend codes can only contain numbers!", "ff7777");
		}
	break;
	case 'removefriend':
		if (is_numeric($quantity)) {
			if (SqlQueryResult("SELECT COUNT(*) FROM `friend_connections` WHERE `connection_id` = $quantity AND (`friender_userid` = {$userdata['userID']} OR `friended_userid` = {$userdata['userID']})") == 1) {
				SqlQuery("DELETE FROM `friend_connections` WHERE `connection_id` = '$quantity'");
				header_msg("You've removed a friend.");
			} else {
				header_msg("...Huh?", "ff7777");
			}
		} else {
			header_msg("...Huh?", "ff7777");
		}
	break;
}

?>