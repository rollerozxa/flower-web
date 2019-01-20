<p class="title">Friends</p>

You have <font color="green">78</font> friends.<br/>

<div class="box" style="background-color:#ccccff;width:calc(100% - 100px)">
	<p>Page: <b>(1)</b></p>
	<table style="width:100%" class="friends">
		<tr class="tbl0">
			<td style="width:1px">#0</td>
			<td>Example User 1</td>
			<td width=12><a href="<?php alink(3,'removefriend',0) ?>">Remove</a></td>
		</tr>
		<tr class="tbl1">
			<td>#1</td>
			<td>Example User 2</td>
			<td><a href="<?php alink(3,'removefriend',1) ?>">Remove</a></td>
		</tr>
	</table>
</div>

<div class="box" style="background-color:#88ff88">
	Your FRIEND CODE: <font color="purple">(TBA)</font><br><br>
	Add a friend by entering their friend code.<br>
	<form>
		<?php formcore(3,'addfriend') ?>
		<input type="number" name="friendcode" width=320/><input type="submit" value="Add my friend!" />
	</form>
</div>

<br/><br/>You will get bonus seeds from your friends if you are <font color="red">BOTH IN EACH OTHER's LISTS</font>. So even if you have 10 friends, you will only receive bonus seeds and stars from the friends who also added you to their lists. Send messages to your friends that have not added you yet.<br/>
