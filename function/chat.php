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

/**
 * Generate the "X Ys ago" message for the chatterbox.
 *
 * @param int $time Unix timestamp of the time of the post.
 * @return string Outputted time message.
 */
function chat_time($time) {
	if ($time < 60) {
		return round($time,2) . ' seconds';
	} else if ($time < (3600)) {
		$time = $time / 60;
		if (round($time,2) == 1)
			return round($time,2) . ' minute';
		else
			return round($time,2) . ' minutes';
	} else if ($time < (86400)) {
		$time = $time / 3600;
		if (round($time,2) == 1)
			return round($time,2) . ' hour';
		else
			return round($time,2) . ' hours';
	} else {
		$time = $time / 86400;
		if (round($time,2) == 1)
			return round($time,2) . ' day';
		else
			return round($time,2) . ' days';
	}
}

/**
 * Replace BBCode tags with HTML and escape any raw HTML that may have been inputted.
 *
 * @param string $message Chatterbox post message.
 * @param int $powerlevel Powerlevel of the user.
 * @return string Outputted post message.
 */
function chat_postcode($message, $powerlevel) {
	// If banned, show "I was bad". Classic flower games!
	if ($powerlevel == 0) {
		return "I was bad";
	}

	// Haha, I get full access to HTML in my posts. >:)
	if ($powerlevel != 4) {
		$message = htmlspecialchars($message);
	}

	// Other staff don't get full HTML, but they get some more tags!
	if ($powerlevel > 2) {
		$message = preg_replace("'\[url=(.*?)\](.*?)\[/url\]'si", '<a href="\\1">\\2</a>', $message);
	}

	// Tags for everyone.
	$message = preg_replace("'\[b\](.*?)\[/b\]'si", '<strong>\\1</strong>', $message);
	$message = preg_replace("'\[i\](.*?)\[/i\]'si", '<em>\\1</em>', $message);
	$message = preg_replace("'\[u\](.*?)\[/u\]'si", '<u>\\1</u>', $message);

	return $message;
}

?>