<?php

///
/// 2 - Chatterbox
///

switch ($_REQUEST['a']) {
	case 'chat':
		if (isset($_POST['text'])) {
			$_POST['text'] = htmlspecialchars(mysqli_real_escape_string($mysqli, $_POST['text']));
			SqlQuery("INSERT INTO `chat` (`userID`, `message`, `gid`, `time`) VALUES ('{$userdata['userID']}', '{$_POST['text']}', '$gid', ".time().");");
		}
	break;
	case 'chatdelet':
		if ($userdata['powerlevel'] > 1) {
			if (is_numeric($quantity)) {
				if (SqlQueryResult("SELECT COUNT(*) FROM `chat` WHERE `ID` = '$quantity'") == 1) {
					SqlQuery("DELETE FROM `chat` WHERE `ID` = '$quantity';");
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
		if ($userdata['powerlevel'] == 4) {
			if (isset($_POST['shouldnuke'])) {
				SqlQuery("TRUNCATE TABLE `chat`;");
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
		if ($userdata['powerlevel'] > 1) {
			if (isset($_POST['edited_message']) && isset($_POST['message_id']) && is_numeric($_POST['message_id'])) {
				$edited_message = SqlEscape($_POST['edited_message']);
				$message_id = $_POST['message_id'];
				SqlQuery("UPDATE `chat` SET `message` = '$edited_message' WHERE `ID` = $message_id;");
			}
		}
	break;
}

?>