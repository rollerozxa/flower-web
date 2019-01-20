<?php

// Load every function file in the function folder.
foreach (glob("function/*.php") as $filename) {
    // Yay for hardcoded stuff!
	if (($filename != 'function/mysql_lib.php') && ($filename != 'function/function.php'))
		include($filename);
}

?>