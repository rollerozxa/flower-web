<?php
// Check for whether some input actually was given.
// Else, print a sample message.
if (isset($commandname[1])) {
	echo rainbow_text($commandname[1]);
} else {
	echo rainbow_text("Woo... Colorful! ^w^");
}
?>