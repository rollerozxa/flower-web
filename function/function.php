<?php

// Load every function file in the function folder.
foreach (glob("function/*.php") as $filename) {
	include_once($filename);
}

?>