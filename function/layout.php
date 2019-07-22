<?php

/**
 * Create a dropdown field, used for forms.
 *
 * @param string $field  Name of the dropdown.
 * @param mixed $checked Value of the key of the selected item.
 * @param array $choices List of items in the dropdown.
 * @param bool $submitonchange Should the form be submitted when changed?
 * @return string HTML code of the dropdown field.
 */
function fieldselect($field, $checked, $choices, $submitonchange) {
	$out = sprintf('<select name="%s" %s>',$field,($submitonchange ? 'onchange="this.form.submit()"' : ''));
	foreach ($choices as $key => $val) {
		$out .= sprintf('<option value="%s" %s>%s</option>',$key,($key == $checked ? 'selected' : ''), $val);
	}
	$out .= '</select>';
	return $out;
}

/**
 * Return the HTML code for the zoom menu.
 *
 * Keep in mind this function doesn't check for whether the user has disabled the zoom menu.
 * (Mainly due to flowerschool not having any user identifier atm)
 *
 * @return string The Code.
 */
function zoom_menu() {
	// TODO: Possibly move $zoom_levels to config.php?
	// "Internal zoom value to be sent to zoom()" => "Nice name for the zoom level"
	$zoom_levels = [
		'1.0' => '100%',
		'1.5' => '150%',
		'2.0' => '200%'
	];

	$out = '<div class="box zoom">Zoom: ';
	foreach ($zoom_levels as $k => $v) {
		$out .= sprintf(
			'<button onlick="%s">%s</button> ',
		$k, $v);
	}
	$out .= '</div>';

	return $out;
}

?>