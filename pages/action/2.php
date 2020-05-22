<?php

///
/// 2 - Chatterbox
///

switch ($_REQUEST['a']) {
	case 'chat':
		if (isset($_POST['text']) && $cuser->getData('powerlevel') >= 1) {
			query("INSERT INTO chat (userID, message, gid, time) VALUES (?,?,?,?)", [$cuser->getData('userID'), $_POST['text'], $gid, time()]);
		}
	break;
	case 'chatdelet':
		if ($cuser->getData('powerlevel') > 1) {
			if (is_numeric($quantity)) {
				if (result("SELECT COUNT(*) FROM chat WHERE ID = ?", [$quantity]) == 1) {
					query("DELETE FROM chat WHERE ID = ?", [$quantity]);
					header_msg("Message deleted!");
				} else {
					header_msg("Message doesn't exist.", "ff7777");
				}
			} else {
				header_msg("Oops! What were you trying to do? ;)", "ff7777");
			}
		} else {
			header_msg("I don't know how you got here, but you shouldn't be here!", "ff7777");
		}
	break;
	case 'chatnuke':
		if ($cuser->getData('powerlevel') == 4) {
			if (isset($_POST['shouldnuke'])) {
				query("TRUNCATE TABLE chat;");
				header_msg("*Explosion sound*");
			} else {
				header_msg("Checkbox not clicked. Disaster averted.", "ff7777");
			}
		} else {
			header_msg("I don't know how you got here, but you shouldn't be here!", "ff7777");
		}
	break;
	// It's actually from page ID -1 (Edit message), but it redirects you to page ID 2 (Chat). Eh.
	case 'editmessage':
		if ($cuser->getData('powerlevel') > 1) {
			if (isset($_POST['edited_message']) && isset($_POST['message_id'])) {
				query("UPDATE chat SET message = ? WHERE ID = ?", [$_POST['edited_message'], $_POST['message_id']]);
			}
		}
	break;
}