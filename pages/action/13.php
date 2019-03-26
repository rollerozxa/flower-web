<?php

///
/// 13 - Settings
///
switch ($_REQUEST['a']) {
	case 'yelbak':
		if ($_POST['yelbak'] == 1 || $_POST['yelbak'] == 0) {
			SqlQuery("UPDATE `user` SET `yellow_background` = {$_POST['yelbak']} WHERE `uid` = '$uid'");
		} else {
			header_msg("Invalid value for option 'Yellowish Background'.", "ff7777");
		}
	break;
	case 'menustyle':
		if ($_POST['menustyle'] == 2 || $_POST['menustyle'] == 1 || $_POST['menustyle'] == 0) {
			SqlQuery("UPDATE `user` SET `menustyle` = {$_POST['menustyle']} WHERE `uid` = '$uid'");
		} else {
			header_msg("Invalid value for option 'Menu bar style'.", "ff7777");
		}
	break;
	case 'zoom':
		if ($_POST['zoom'] == 1 || $_POST['zoom'] == 0) {
			SqlQuery("UPDATE `user` SET `zoom` = {$_POST['zoom']} WHERE `uid` = '$uid'");
		} else {
			header_msg("Invalid value for option 'Zoom'.", "ff7777");
		}
	break;
}