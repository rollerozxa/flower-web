<?php

///
/// 11 - Change name
///

switch ($_REQUEST['a']) {
	case 'changename':
		if (strlen($_POST['name']) <= 35) {
			$cuser->setData('username', $_POST['name']);
		} else {
			header_msg("Nickname is too long", "ff7777");
		}
	break;
	case 'changeflag':
		if (file_exists('flags/' . $quantity . '.png')) {
			$cuser->setData('country', $quantity);
		} else {
			header_msg("Invalid country flag.", "ff7777");
		}
	break;
}