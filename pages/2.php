<p class="title">Chatterbox</p>
<hr>
<table class="fullwidth">
<?php
$db_query = SqlQuery("SELECT * FROM chat");
$bg = 0;
while ($record = mysqli_fetch_array($db_query)) {
	$msguserdata = SqlQueryFetchRow('SELECT * FROM user WHERE userID="' . $record['userID'] . '"');
	
	$commandtext = chat_command();
	if ($commandtext != null) {
		$record['message'] = $commandtext;
	}
	
	if ($msguserdata['powerlevel'] > 1) {
		$record['message'] = str_replace('[url={','<a href="',$record['message']);
		$record['message'] = str_replace('}]','">',$record['message']);
		$record['message'] = str_replace('[/url]','</a>',$record['message']);
	}
	
	?>
	<tr>
		<td class="tbl<?php echo $bg ?>">
			<img src="flags/se.png"> <img src="img/DaisyIcon.png" width=24>
			<strong><?php echo IDtoUsername($record['userID']) ?></strong><!--(<font color=darkgold>* #1 *</font>)-->: <?php echo $record['message']; ?> <br> 
			<font color="maroon"><em>(<?php echo time() - $record['time']; ?> seconds ago)</em></font>
		</td>
	</tr>
	<?php
	$bg = ($bg == 0 ? 1 : 0);
}
?>
</table>
<form method="post">
<?php formcore(2,'chat') ?>
<input type="text" name="text" maxlength="2000" style="width:calc(100% - 52px)"></input>
<input type="submit" value="Post"></input>
</form><br/> 
<!--<font color=purple>(Galactic construction: <b>26.645%</b>) Growth multipliers go into orbit at 100%. Completion goes up with every star earned through offers/apps by *anyone*. Construction speedup factor <font color=green><b>1,007.686%</b></font> </font><br/><br/>
<font color=blue>*633*</font> until <font color=green>150*</font> <font color=purple>Moon</font> bonus!<br/>
<font color=blue>*8,633*</font> until <font color=green>2,500*</font> <font color=purple>Sun</font> bonus!<br/>
<font color=blue>*38,633*</font> until <font color=green>15,000*</font> <font color=purple>Solar System</font> bonus!<br/>
<font color=blue>*338,633*</font> until <font color=green>175,000*</font> <font color=purple>Spiral Arm</font> bonus!<br/><br/><button value="Refresh" onclick="open_win('?uid=nope&show=23&reportabuse=false&gid=Daisy&menu=true')">Refresh</button>
<div class="box" style="background-color:#88ff88"><strong>No profanity, obscenities, or provocative language in chatterbox!</strong> Keep it clean and friendly. Take all other	topics somewhere else.</div>-->
