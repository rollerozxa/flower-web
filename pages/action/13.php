<?php

///
/// 13 - Settings
///

switch ($_REQUEST['a']) {
	case 'setoptions':
		if ($_POST['yelbak'] != 1 && $_POST['yelbak'] != 0) $_POST['yelbak'] = 0;
		if ($_POST['menustyle'] != 2 && $_POST['menustyle'] != 1 && $_POST['menustyle'] != 0) $_POST['menustyle'] = 0;
		if ($_POST['zoom'] != 1 && $_POST['zoom'] != 0) $_POST['zoom'] = 1;

		SqlQuery("UPDATE user SET
			yellow_background = {$_POST['yelbak']}, menustyle = {$_POST['menustyle']}, zoom = {$_POST['zoom']}
			WHERE uid = '$uid'");
	break;
}