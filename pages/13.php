<p class="title">Settings</p>

<form method="POST"><input type="hidden" name="a" value="setoptions"><table class="opt_tbl">
	<tr>
		<td class="a">Yellowish Background</td>
		<td class="b">
			<input type="radio" name="yelbak" id="yelbak_no" value="0"<?=($userdata['yellow_background'] == 0 ? ' checked' : '')?>> <label for="yelbak_no">Disabled</label>
			<input type="radio" name="yelbak" id="yelbak_yes" value="1"<?=($userdata['yellow_background'] == 1 ? ' checked' : '')?>> <label for="yelbak_yes">Enabled</label>
		</td>
		<td class="c">This gives the background a more yellowish color, which might feel better on the eyes.</td>
	</tr><tr>
		<td class="a">Menu bar style</td>
		<td class="b">
			<input type="radio" name="menustyle" id="menustyle_buttons" value="0"<?=($userdata['menustyle'] == 0 ? ' checked' : '')?>> <label for="menustyle_buttons">Buttons</label>
			<input type="radio" name="menustyle" id="menustyle_links" value="1"<?=($userdata['menustyle'] == 1 ? ' checked' : '')?>> <label for="menustyle_links">Links</label>
			<input type="radio" name="menustyle" id="menustyle_dropdown" value="2"<?=($userdata['menustyle'] == 2 ? ' checked' : '')?>> <label for="menustyle_dropdown">Dropdown</label>
		</td>
		<td class="c">Change the style of the buttons in the menu bar.</td>
	</tr><tr>
		<td class="a">Zoom menu</td>
		<td class="b">
			<input type="radio" name="zoom" id="zoom_no" value="0"<?=($userdata['zoom'] == 0 ? ' checked' : '')?>> <label for="zoom_no">Disabled</label>
			<input type="radio" name="zoom" id="zoom_yes" value="1"<?=($userdata['zoom'] == 1 ? ' checked' : '')?>> <label for="zoom_yes">Enabled</label>
		</td>
		<td class="c">This toggles the zoom menu which allows you to set a zoom level for the page.</td>
	</tr><tr>
		<td class="a">Nostalgia mode</td>
		<td class="b">
			<input type="radio" name="nostalg" id="nostalg_no" value="0"<?=($userdata['nostalgia'] == 0 ? ' checked' : '')?>> <label for="nostalg_no">Disabled</label>
			<input type="radio" name="nostalg" id="nostalg_yes" value="1"<?=($userdata['nostalgia'] == 1 ? ' checked' : '')?>> <label for="nostalg_yes">Enabled</label>
		</td>
		<td class="c">Enable various tweaks to make the menu look more like the original.</td>
	</tr>
	<tr><td colspan=3 class="a"><input type="submit" value="Submit"></td></tr>
</table></form>