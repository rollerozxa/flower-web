<?php

///
/// 7 - PGM Packages
///

switch ($_REQUEST['a']) {
	case 'buypgmpack':
		// TODO: do this
		header_msg('Bought '.$quantity.' PGM packs for '.($quantity * 2).' PGM!');
	break;
	case 'custompgm':
		// TODO: do this
		header_msg('Bought a custom PGM package giving you '.PakIDtoName($_POST['custompgm']).' for 15 PGM!');
	break;
}