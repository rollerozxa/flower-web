<p class="title">Scores</p>
<span style="color:green;font-weight:bold;">Tallest Daisies in the world!</span><br>
<?=SqlQueryResult("SELECT COUNT(*) FROM user_$gid") ?> people growing a <?=$gid ?><br><br>
<table class="fullwidth">
	<tr>
		<th width=60px>Rank</th>
		<th width=40%>Height</th>
		<th>Player</th>
	</tr>
<?php
$db_query = SqlQuery("SELECT * FROM `user_" . $gid . "` ORDER BY `height` DESC");
$bg = 0;
$count = 1;
while ($record = mysqli_fetch_array($db_query)) {
	$rowuserdata = SqlQueryFetchRow('SELECT * FROM user WHERE uid="' . $record['uid'] . '"');
	
	?><tr class="tb<?php echo ($record['uid'] == $uid ? 'h' : 'l' . $bg) ?>">
		<td><img src="flags/<?=$rowuserdata['country'] ?>.png"> <?=$count ?></td>
		<td><?=formatheight($record['height']) ?> (cm)</td>
		<td><?=$rowuserdata['username'] ?></td>
	</tr><?php
	$bg = ($bg == 0 ? 1 : 0);
	$count++;
}
?>
</table>