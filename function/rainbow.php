<?php

/**
 * Make rainbow text!
 *
 * @param string $text Text to make rainbow.
 * @return string Outputted rainbow text.
 */
function rainbow_text($text) {
	// Rainbow colors (Red, Orange, Yellow, Green, Blue, Violet)
	$colors = array('FF0000','FF7F00','CCCC00','00FF00','0000FF','8B00FF');
	$ret = '';
	$i = 0;

	foreach (str_split($text, 2) as $char) {
		if ($i == 6) $i = 0;
		$value = $colors[$i];
		$ret .= '<span style="color:#'.$value.';">'.$char.'</span>';
		$i++;
	}

	return $ret;
}

?>