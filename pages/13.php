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

<div class="box optbox" style="background-color:#ffcccc">
	<span class="title">Menu bar style</span>
	<form method="POST">
		<input type="hidden" name="a" value="menustyle">
		<input type="radio" name="menustyle" id="menustyle_buttons" value="0"<?=($userdata['menustyle'] == 0 ? ' checked' : '')?>> <label for="menustyle_buttons">Buttons</label>
		<input type="radio" name="menustyle" id="menustyle_links" value="1"<?=($userdata['menustyle'] == 1 ? ' checked' : '')?>> <label for="menustyle_links">Links</label>
		<br><input type="submit" value="Submit">
	</form>
	<i>Change the style of the buttons in the menu bar.</i>
</div>

<div class="box optbox" style="background-color:#ffcccc">
	<span class="title">Zoom menu</span>
	<form method="POST">
		<input type="hidden" name="a" value="zoom">
		<input type="radio" name="zoom" id="zoom_no" value="0"<?=($userdata['zoom'] == 0 ? ' checked' : '')?>> <label for="zoom_no">Disabled</label>
		<input type="radio" name="zoom" id="zoom_yes" value="1"<?=($userdata['zoom'] == 1 ? ' checked' : '')?>> <label for="zoom_yes">Enabled</label>
		<br><input type="submit" value="Submit">
	</form>
	<i>This toggles the zoom menu which allows you to set a zoom level for the page.</i>
</div>
