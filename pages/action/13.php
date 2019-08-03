<?php

///
/// 13 - Settings
///

switch ($_REQUEST['a']) {
	case 'setoptions':
		if (!number_between($_POST['yelbak'],0,1)) $_POST['yelbak'] = 0;
		if (!number_between($_POST['menustyle'],0,2)) $_POST['menustyle'] = 0;
		if (!number_between($_POST['zoom'],0,1)) $_POST['zoom'] = 1;
		if (!number_between($_POST['nostalg'],0,1)) $_POST['nostalg'] = 0;

		query("UPDATE user SET yellow_background = ?, menustyle = ?, zoom = ?, nostalgia = ? WHERE uid = ?",
			[$_POST['yelbak'], $_POST['menustyle'], $_POST['zoom'], $_POST['nostalg'], $uid]);
	break;
}