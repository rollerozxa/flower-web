<p class="title">Chatterbox</p>
<hr>
<table class="fullwidth">
<?php
$query = query("SELECT * FROM chat JOIN user ON chat.userID = user.userID");
$bg = 0;
while ($record = $query->fetch()) {
	$commandtext = chat_command();
	if ($commandtext != null) {
		$record['message'] = $commandtext;
	}

	if ($record['powerlevel'] > 1) {
		$record['message'] = preg_replace("'\[url=(.*?)\](.*?)\[/url\]'si", '<a href="\\1">\\2</a>', $record['message']);
	}
	
	if ($record['powerlevel'] == 4)
		$flower = 'Admin.png';
	else
		$flower = $record['gid'] . 'Icon.png';
	
	$time = (time() - $record['time']);
	if ($time < 60) {
		$time = round($time,2) . ' seconds';
	} else if ($time < (3600)) {
		$time = $time / 60;
		if (round($time,2) == 1)
			$time = round($time,2) . ' minute';
		else
			$time = round($time,2) . ' minutes';
	} else if ($time < (86400)) {
		$time = $time / 3600;
		if (round($time,2) == 1)
			$time = round($time,2) . ' hour';
		else
			$time = round($time,2) . ' hours';
	} else {
		$time = $time / 86400;
		if (round($time,2) == 1)
			$time = round($time,2) . ' day';
		else
			$time = round($time,2) . ' days';
	}
	?>
	<tr>
		<td class="tbl<?php echo $bg ?>">
			<img src="flags/<?=$record['country'] ?>.png"> <img src="img/<?=$flower ?>" width=24>
			<strong style="color:#<?= powerlevelcolor($record['powerlevel']) ?>"><?php echo IDtoUsername($record['userID']) ?></strong><!--(<font color=darkgold>* #1 *</font>)-->: <?php echo $record['message']; ?> <br> 
			<font color="maroon"><em>(<?=$time ?> ago)</em></font>
			<?php if ($userdata['powerlevel'] > 1) { ?>
			<span style="float:right">
				<a href="<?=pagelink(-1) ?>&messageid=<?=$record['ID'] ?>" style="text-decoration:none;transform: rotateZ(90deg);">&#9998;</a>
				<a href="<?=alink(2,'chatdelet',$record['ID']) ?>" style="color:red;text-decoration:none">X</a>
			</span>
			<?php } ?>
		</td>
	</tr>
	<?php
	$bg = ($bg == 0 ? 1 : 0);
}
?>
</table>
<form method="post">
<input type="hidden" name="a" value="chat">
<input type="text" name="text" maxlength="2000" style="width:calc(100% - 52px)"></input>
<input type="submit" value="Post"></input>
</form><br/>
<?php if ($userdata['powerlevel'] == 4) { ?>
<div class="box" style="text-align:center;background-color:#ff5555">
	<span class="title">Nuke chat table **DANGEROUS!**</span>
	<form method="POST">
		<input type="hidden" name="a" value="chatnuke">
		<input type="checkbox" name="shouldnuke" id="nuke" value="0"> <label for="nuke">Nuke chat table</label> <input type="submit" value="Confirm">
	</form>
</div>
<?php } ?>
<!--<font color=purple>(Galactic construction: <b>26.645%</b>) Growth multipliers go into orbit at 100%. Completion goes up with every star earned through offers/apps by *anyone*. Construction speedup factor <font color=green><b>1,007.686%</b></font> </font><br/><br/>
<font color=blue>*633*</font> until <font color=green>150*</font> <font color=purple>Moon</font> bonus!<br/>
<font color=blue>*8,633*</font> until <font color=green>2,500*</font> <font color=purple>Sun</font> bonus!<br/>
<font color=blue>*38,633*</font> until <font color=green>15,000*</font> <font color=purple>Solar System</font> bonus!<br/>
<font color=blue>*338,633*</font> until <font color=green>175,000*</font> <font color=purple>Spiral Arm</font> bonus!<br/><br/><button value="Refresh" onclick="open_win('?uid=nope&show=23&reportabuse=false&gid=Daisy&menu=true')">Refresh</button>
<div class="box" style="background-color:#88ff88"><strong>No profanity, obscenities, or provocative language in chatterbox!</strong> Keep it clean and friendly. Take all other	topics somewhere else.</div>-->
