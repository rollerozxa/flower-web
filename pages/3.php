<?php
$friends = [];

$db_query = query("SELECT * FROM friend_connections WHERE friender_userid = ?", [$userdata['userID']]);
while ($record = $db_query->fetch()) {
	$friendeduserdata = fetch("SELECT * FROM user WHERE userID = ?", [$record['friended_userid']]);
	$friends[] = ['connection_id' => $record['connection_id'],'friended_userid' => $record['friended_userid'],'friended_name' => $friendeduserdata['username']];
}
$db_query = query("SELECT * FROM friend_connections WHERE friended_userid = ?", [$userdata['userID']]);
while ($record = $db_query->fetch()) {
	$friendeduserdata = fetch("SELECT * FROM user WHERE userID = ?", [$record['friender_userid']]);
	$friends[] = ['connection_id' => $record['connection_id'],'friended_userid' => $record['friender_userid'],'friended_name' => $friendeduserdata['username']];
}

usort($friends, function($a, $b) { return strcmp(strtolower($a["friended_name"]), strtolower($b["friended_name"])); });
?>
<p class="title">Friends</p>

You have <span style="color:green"><?=count($friends) ?></span> friends.<br/>
<table style="width:90%;border:2px solid black" class="friends">
<?php
$bg = 0;
$count = 1;
foreach ($friends as $friend_row) {
	?><tr class="tbl<?=$bg ?>">
		<td style="width:1px">#<?=$count ?></td>
		<td><?=$friend_row['friended_name'] ?></td>
		<td width=12><a href="<?=alink(3,'removefriend',$friend_row['connection_id']) ?>">Remove</a></td>
	</tr><?php
	$bg = ($bg == 0 ? 1 : 0);
	$count++;
}
?>
</table>
<br>
<div class="box" style="background-color:#88ff88">
	Your Friend Code: <span style="color:purple"><?=$userdata['friendcode'] ?></span><br>
	Add a friend by entering their friend code.<br>
	<form method="post">
		<input type="hidden" name="a" value="addfriend">
		<input type="number" name="friendcode" width=320/><input type="submit" value="Add my friend!" />
	</form>
</div>

For each 10 friends, you get 10 bonus stars per hour.