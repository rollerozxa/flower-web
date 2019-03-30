<?php

/**
 * Send a mail to a user with a specified user ID.
 *
 * @param int $recipient_id User ID of the recipient.
 * @param int $inbox_message Message to be sent.
 * @param int $sender_name Name of the sender. (This will be shown!)
 * @param int $recipient_id Optional: User ID of the sender.
 */
function send_mail($recipient_id,$inbox_message,$sender_name,$sender_id = 'dead410734') {
	query("INSERT INTO inbox (recipient_id, sender_id, sender_name, message) VALUES (?,?,?,?)", [$recipient_id, $sender_id, $sender_name, $inbox_message]);
}

/**
 * Throw a fatal error.
 *
 * @param string $msg Error message.
 */
function fs_error($msg) {
	include('pages/other/error.php');
	die();
}

/**
 * Set a box with a message at the top of the page.
 *
 * @param string $msg Message.
 * @param string $bg Background color. (hex)
 */
function header_msg($msg,$bg = "00ff00") {
	global $headermsg;

	$headermsg = '<div class="box" style="background-color:#' . $bg . '">' . $msg . '</div>';
}

?>