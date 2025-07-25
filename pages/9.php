<p class="title">Scores</p>
<span style="color:green;font-weight:bold;">Tallest Daisies in the world!</span><br>
<?=result("SELECT COUNT(*) FROM user_flower WHERE flower = ?", [$gid]) ?> people growing a <?=$gid ?>
<table class="fullwidth" style="padding-top:20px">
	<tr>
		<th width=60px>Rank</th>
		<th width=40%>Height</th>
		<th>Player</th>
	</tr>
<?php
$query = query("SELECT * FROM user_flower JOIN user ON user_flower.uid = user.uid WHERE user_flower.flower = ? ORDER BY height DESC", [$gid]);
$bg = 0;
$count = 1;
while ($record = $query->fetch()) {
	?><tr class="tb<?=($record['uid'] == $uid ? 'h' : 'l' . $bg) ?>">
		<td><?=flag($record['country']) ?> <?=$count ?></td>
		<td><?=formatheight($record['height']) ?> (cm)</td>
		<td>
			<a class="user" href="<?=pagelink(12) ?>&id=<?=$record['userID'] ?>" style="color:#<?= powcolor($record['powerlevel']) ?>;">
				<?=$record['username'] ?>
			</a>
		</td>
	</tr><?php
	$bg = ($bg == 0 ? 1 : 0);
	$count++;
}
?>
</table>