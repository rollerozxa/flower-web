<?php

/**
 * Write core form arguments.
 * 
 * @param int $show
 * @param string $action 
 */
function formcore($show, $action = null) {
	global $uid, $gid;
	echo '<input type="hidden" name="uid" value="'.$uid.'">
	<input type="hidden" name="gid" value="'.$gid.'">
	<input type="hidden" name="show" value="'.$show.'">';
	if ($action)
		echo '<input type="hidden" name="a" value="'.$action.'">';
}

?> 