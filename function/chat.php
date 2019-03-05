<?php

/**
 * Do the chat command system.
 * 
 * @return string Text of command.<br>
 *				  If the original chat message isn't a command, it returns null.
 */
function chat_command() {
	global $msguserdata, $record, $userdata;

	if (startsWith($record['message'], '/')) {
		$commandname = str_replace('/', '', $record['message']);
		if (file_exists('function/chatcommands/Cmd' . lcfirst($commandname) . '.php')) {
			ob_start();
			include 'function/chatcommands/Cmd' . lcfirst($commandname) . '.php';
			$commandmessage = ob_get_contents();
			ob_end_clean();
			return '<br>' . $commandmessage;
		} else {
			// Invalid command, just ignore it.
			return null;
		}
	}
}

?>