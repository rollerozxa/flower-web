<?php

///
/// 11 - Change name
///
switch ($_REQUEST['a']) {
	case 'changename':
		if (strlen($_POST['name']) <= 35) {
			$_POST['name'] = mysqli_real_escape_string($mysqli, $_POST['name']);
			SqlQuery("UPDATE `user` SET `username` = '{$_POST['name']}' WHERE `user`.`uid` = '$uid'");
		} else {
			header_msg("Nickname is too long", "ff7777");
		}
	break;
	case 'changeflag':
		if (file_exists('flags/' . $quantity . '.png')) {
			SqlQuery("UPDATE `user` SET `country` = '" . $quantity . "' WHERE `user`.`uid` = " . $userdata['uid'] . ";");
		} else {
			header_msg("Invalid flag. Wait, how?", "ff7777");
		}
	break;
}

?>