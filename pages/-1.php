<?php
$messageid = (isset($_GET['messageid']) ? $_GET['messageid'] : '');

$chatmessage = fetch("SELECT * FROM chat WHERE ID = ?", [$messageid]);

if ($chatmessage) {
	?><form action="<?=pagelink(2)?>" method="POST">
	<input type="hidden" name="a" value="editmessage">
	<input type="hidden" name="message_id" value="<?=$messageid ?>">
	<input type="text" name="edited_message" value="<?=htmlspecialchars($chatmessage['message']) ?>">
	<input type="submit" value="Submit">
	</form><?php
} else {
	echo "Message doesn't exist.";
}
