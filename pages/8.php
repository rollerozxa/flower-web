<?php
$query = query("SELECT * FROM inbox WHERE recipient_id = ? ORDER BY mailID DESC" , [$userdata['userID']]);

while ($record = $query->fetch()) {
	if ($record['sender_id'] != 'dead410734') {
		$messagestr = sprintf(
			'<a href="%s&id=%s">Reply</a> | ',
		pagelink(15), $record['sender_id']);
	} else {
		$messagestr = '';
	}

	?><div class="box inbox">
	<table style="width:100%;height:100%;">
		<tr><td class="inboxcell1"><strong>From: <?=$record['sender_name']; ?></strong><p><?=$record['message'] ?></p></td></tr>
		<tr><td class="inboxcell2"><?=$messagestr ?><a href="<?=alink(8,'deletemail',$record['mailID']) ?>">Delete this message</a></td></tr>
	</table>
	</div><?php
}
?>
<hr>
Inbox messages are deleted after 1 week.
