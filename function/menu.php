<?php

$menuitems = array(
	array('name' => 'Items', 'page' => 1),
	array('name' => 'Chatterbox', 'page' => 2),
	array('name' => 'Friends', 'page' => 3),
	array('name' => 'Stars Exchange ($50)', 'page' => 4),
	array('name' => 'Seeds draw ($100.00)', 'page' => 5),
	array('name' => 'Stars draw (*10.00)', 'page' => 6),
	array('name' => 'PGM Packages', 'page' => 7),
	array('name' => 'Inbox', 'page' => 8),
	array('name' => 'Scores', 'page' => 9),
	array('name' => 'Global Compost Heap', 'page' => 10),
	array('name' => 'Change name', 'page' => 11),
	array('name' => 'Flower School', 'page' => 999),
	array('name' => 'Settings', 'page' => 13)
);

function menubar($menustyle = 'buttons') {
	global $menuitems;
	$counter = 1;
	foreach ($menuitems as $menuitem) {
		if ($menustyle == 'buttons') {
			echo '<button onclick="open_win(' . $menuitem['page'] . ')">' . $menuitem['name'] . '</button>';
		} else if ($menustyle == 'links') {
			if ($counter != 1) echo ' | ';
			echo '<a href="' . pagelink($menuitem['page']) . '">' . $menuitem['name'] . '</a>';
			$counter++;
		}
	}
}

?>
