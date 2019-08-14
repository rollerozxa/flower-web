<?php
// Check for whether some input actually was given.
// Else, print a sample message.
if (isset($commandname[1])) {
	printf(
		'Hello %s and welcome to the <b style="color:blue">Origami Flower Games</b>!<br>',
	$commandname[1]);
} else {
	echo rainbow_text("OwO");
}
?>