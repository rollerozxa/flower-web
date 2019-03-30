<?php
$messageid = (isset($_GET['messageid']) && is_numeric($_GET['messageid']) ? $_GET['messageid'] : '');

if ($messageid != '') {
	$chatmessage = fetch("SELECT * FROM chat WHERE ID = ?", [$messageid]);
	?><form action="<?=pagelink(2)?>" method="POST">
	<input type="hidden" name="a" value="editmessage">
	<input type="hidden" name="message_id" value="<?=$messageid ?>">
	<input type="text" name="edited_message" value="<?=$chatmessage['message'] ?>">
	<input type="submit" value="Submit">
	</form><?php
}
?>
