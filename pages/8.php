<?php
$db_query = SqlQuery("SELECT * FROM inbox WHERE recipient_id = '" . $userdata['userID'] . "' ORDER BY mailID DESC;");
$bg = 0;
while ($record = mysqli_fetch_array($db_query)) {
	?><div class="box inbox">
	<table style="width:100%;height:100%;">
		<tr><td class="inboxcell1"><strong>From: <?php echo $record['sender_name']; ?></strong><p><?php echo $record['message'] ?></p></td></tr>
		<tr><td class="inboxcell2"><a href="delet">Delete this message</a></td></tr>
	</table>
	</div><?php
}
?>
<hr>
Inbox messages are deleted after 1 week.
