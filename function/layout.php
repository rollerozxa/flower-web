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

?>