<?php

function get_page_title($show = 0) {
	global $menu;
	if ($menu) return 'Menu';
	switch ($show) {
		// This value is hardcoded into the app.
		case 1:		return 'Items';
		case 2:		return 'Chatterbox';
		case 3:		return 'Friends';
		case 4:		return 'Star Exchange';
		case 5:		return 'Seeds draw';
		case 6:		return 'Stars draw';
		case 7:		return 'PGM Packages';
		case 8:		return 'Inbox';
		case 9:		return 'Scores';
		case 10:	return 'Global Compost Heap';
		case 11:	return 'Change name';
		case 12:	return 'Profile';
		case 13:	return 'Settings';
		// This value is hardcoded into the app.
		case 14:	return 'Change name';
		case 15:	return 'Send Message';

		// Special pages (Administration, easter eggs)
		case 420:	return 'Admin tools';
		case -1:	return 'Edit message';

		default:	return '';
	}
}

?>
