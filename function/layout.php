<?php

function fieldselect($field, $checked, $choices, $submitonchange) {
	$out = sprintf('<select name="%s" %s>',$field,($submitonchange ? 'onchange="this.form.submit()"' : ''));
	foreach ($choices as $key => $val) {
		$out .= sprintf('<option value="%s" %s>%s</option>',$key,($key == $checked ? 'selected' : ''), $val);
	}
	$out .= '</select>';
	return $out;
}

?>