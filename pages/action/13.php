<?php

///
/// 13 - Settings
///

switch ($_REQUEST['a']) {
	case 'setoptions':
		if ($_POST['yelbak'] != 1 && $_POST['yelbak'] != 0) $_POST['yelbak'] = 0;
		if ($_POST['menustyle'] != 2 && $_POST['menustyle'] != 1 && $_POST['menustyle'] != 0) $_POST['menustyle'] = 0;
		if ($_POST['zoom'] != 1 && $_POST['zoom'] != 0) $_POST['zoom'] = 1;
		if ($_POST['nostalg'] != 1 && $_POST['nostalg'] != 0) $_POST['nostalg'] = 0;

		query("UPDATE user SET yellow_background = ?, menustyle = ?, zoom = ?, nostalgia = ? WHERE uid = ?",
			[$_POST['yelbak'], $_POST['menustyle'], $_POST['zoom'], $_POST['nostalg'], $uid]);
	break;
}