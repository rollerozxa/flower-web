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

		$cuser->setData('yellow_background', $_POST['yelbak']);
		$cuser->setData('menustyle', $_POST['menustyle']);
		$cuser->setData('zoom', $_POST['zoom']);
		$cuser->setData('nostalgia', $_POST['nostalg']);
	break;
}