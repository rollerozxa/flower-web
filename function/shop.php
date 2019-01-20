<?php

/**
 * Make a shop message.
 * 
 * @param string $msg Message.
 * @param string $bg Background color (hex)
 */
function shop_msg($msg,$bg = "00ff00") {
	echo '<div class="box" style="background-color:#' . $bg . '">' . $msg . '</div>';
}

?>