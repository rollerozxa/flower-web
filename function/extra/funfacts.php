<?php

/**
 * Return a random fun fact from $funfacts.
 *
 * @return string Random fun fact from $funfacts.
 */
function random_funfact() {
	global $funfacts;
	return $funfacts[array_rand($funfacts)];
}

?>