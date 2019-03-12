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
				echo '<button onclick="open_win(' . $menuitem['page'] . ')">' . $menuitem['name'] . '</button>';
			}
		break;
		case MENUBAR_LINKS:
			foreach ($menuitems as $menuitem) {
				if ($counter != 1) echo ' | ';
				echo '<a href="' . pagelink($menuitem['page']) . '">' . $menuitem['name'] . '</a>';
				$counter++;
			}
		break;
		case MENUBAR_SELECT:
			echo '<form><input type="hidden" name="uid" value="'.$uid.'"><input type="hidden" name="gid" value="'.$gid.'">
			<select name="show" onchange="this.form.submit()">';
			foreach ($menuitems as $menuitem) {
				echo '<option value="'.$menuitem['page'].'"'.($menuitem['page'] == $show ? ' selected' : '').'>'.$menuitem['name'].'</option>';
			}
			echo '</select></form>';
		break;
	}
}

?>