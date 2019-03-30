<?php

///
/// 11 - Change name
///

switch ($_REQUEST['a']) {
	case 'changename':
		if (strlen($_POST['name']) <= 35) {
			query("UPDATE user SET username = ? WHERE uid = ?", [$_POST['name'], $uid]);
		} else {
			header_msg("Nickname is too long", "ff7777");
		}
	break;
	case 'changeflag':
		if (file_exists('flags/' . $quantity . '.png')) {
			query("UPDATE user SET country = ? WHERE uid = ?", [$quantity, $userdata['uid']]);
		} else {
			header_msg("Invalid flag. Wait, how?", "ff7777");
		}
	break;
}

?>