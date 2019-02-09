<p class="title">Settings</p>

<div class="box optbox" style="background-color:#ffcccc">
	<span class="title">Yellowish background</span>
	<form method="POST">
		<input type="hidden" name="a" value="yelbak">
		<input type="radio" name="yelbak" id="yelbak_no" value="0"<?=($userdata['yellow_background'] == 0 ? ' checked' : '')?>> <label for="yelbak_no">Disabled</label>
		<input type="radio" name="yelbak" id="yelbak_yes" value="1"<?=($userdata['yellow_background'] == 1 ? ' checked' : '')?>> <label for="yelbak_yes">Enabled</label>
		<br><input type="submit" value="Submit">
	</form>
	<i>This gives the background a more yellowish color, which might feel better on the eyes.</i>
</div>
