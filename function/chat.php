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
		$commandname = explode(' ', str_replace('/', '', $record['message']), 2);
		print_r($commandname);
		if (file_exists('function/chatcommands/Cmd'.ucfirst($commandname[0]).'.php')) {
			ob_start();
			include 'function/chatcommands/Cmd'.ucfirst($commandname[0]).'.php';
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