<?php

$menuitems = [
	['name' => 'Items', 'page' => 1],
	['name' => 'Chatterbox', 'page' => 2],
	['name' => 'Friends', 'page' => 3],
	['name' => 'Stars Exchange ($50)', 'page' => 4],
	['name' => 'Seeds draw ($100.00)', 'page' => 5],
	['name' => 'Stars draw (*10.00)', 'page' => 6],
	['name' => 'PGM Packages', 'page' => 7],
	['name' => 'Inbox', 'page' => 8],
	['name' => 'Scores', 'page' => 9],
	['name' => 'Global Compost Heap', 'page' => 10],
	['name' => 'Change name', 'page' => 11],
	['name' => 'Flower School', 'page' => 999],
	['name' => 'Settings', 'page' => 13]
];

define('MENUBAR_BUTTONS', 0);
define('MENUBAR_LINKS', 1);
define('MENUBAR_SELECT', 2);

/**
 * Print a menu bar from $menuitems.
 *
 * @param $menustyle Style of the printed menu bar.
 */
function menubar($menustyle = MENUBAR_BUTTONS) {
	global $menuitems,$uid,$gid,$show;
	$counter = 1;
	switch ($menustyle) {
		case MENUBAR_BUTTONS:
			foreach ($menuitems as $menuitem) {
				printf('<button onclick="open_page(%s)">%s</button>', $menuitem['page'], $menuitem['name']);
			}
		break;
		case MENUBAR_LINKS:
			foreach ($menuitems as $menuitem) {
				if ($counter != 1) echo ' | ';
				printf('<a href="%s">%s</a>', pagelink($menuitem['page']), $menuitem['name']);
				$counter++;
			}
		break;
		case MENUBAR_SELECT:
			echo '<form><input type="hidden" name="uid" value="'.$uid.'"><input type="hidden" name="gid" value="'.$gid.'">
			<select name="show" onchange="this.form.submit()">';
			foreach ($menuitems as $menuitem) {
				printf('<option value="%s" %s>%s</option>', $menuitem['page'], ($menuitem['page']==$show?'selected':''), $menuitem['name']);
			}
			echo '</select></form>';
		break;
	}
}