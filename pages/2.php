<p class="title">Chatterbox</p>
<hr>
<table class="fullwidth">
<?php
$query = query("SELECT * FROM chat JOIN user ON chat.userID = user.userID ORDER BY chat.ID");
$bg = 0;
while ($record = $query->fetch()) {
	$record['message'] = chat_postcode($record['message'], $record['powerlevel']);

	if ($commandtext = chat_command()) {
		$record['message'] = $commandtext;
	}
	
	if ($record['powerlevel'] == 4)
		$flower = 'Admin.png';
	else if ($record['powerlevel'] == 0)
		$flower = 'gray/' . $record['gid'] . 'Icon.png';
	else
		$flower = $record['gid'] . 'Icon.png';
	
	$time = chat_time(time() - $record['time']);
	?>
	<tr><td class="tbl<?=$bg ?>">
		<img src="flags/<?=$record['country'] ?>.png"> <img src="img/<?=$flower ?>" width=24>
		<strong style="color:#<?= powerlevelcolor($record['powerlevel']) ?>"><?=$record['username'] ?></strong>: <?=$record['message'] ?> <br> 
		<span style="color:maroon"><em>(<?=$time ?> ago)</em></span>
		<?php if ($userdata['powerlevel'] > 1) { ?>
		<span style="float:right">
			<a href="<?=pagelink(-1) ?>&messageid=<?=$record['ID'] ?>" style="text-decoration:none;transform: rotateZ(90deg);">&#9998;</a>
			<a href="<?=alink(2,'chatdelet',$record['ID']) ?>" style="color:red;text-decoration:none">X</a>
		</span>
		<?php } ?>
	</td></tr>
	<?php
	$bg = ($bg == 0 ? 1 : 0);
}
?>
</table>

<?php if ($userdata['powerlevel'] >= 1) { ?>
<form method="post">
	<input type="hidden" name="a" value="chat">
	<input type="text" name="text" maxlength="2000" style="width:calc(100% - 52px)"></input>
	<input type="submit" value="Post"></input>
</form>
<?php } else { ?>
<p style="font-weight:bold">You've been banned.</p>
<?php } ?>

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
