<?php
$ettings = [
	[
		'title' => 'Yellowish Background',
		'descr' => 'This gives the background a more yellowish color, which might feel better on the eyes.',
		'id' => 'yelbak',
		'tblcol' => 'yellow_background',
		'options' => [
			['id' => 'no', 'value' => 0, 'name' => 'Disabled'],
			['id' => 'yes', 'value' => 1, 'name' => 'Enabled'],
		]
	],[
		'title' => 'Menu bar style',
		'descr' => 'Change the style of the buttons in the menu bar.',
		'id' => 'menustyle',
		'tblcol' => 'menustyle',
		'options' => [
			['id' => 'buttons', 'value' => 0, 'name' => 'Buttons'],
			['id' => 'links', 'value' => 1, 'name' => 'Links'],
			['id' => 'dropdown', 'value' => 2, 'name' => 'Dropdown']
		]
	],[
		'title' => 'Zoom menu',
		'descr' => 'This toggles the zoom menu which allows you to set a zoom level for the page.',
		'id' => 'zoom',
		'tblcol' => 'zoom',
		'options' => [
			['id' => 'no', 'value' => 0, 'name' => 'Disabled'],
			['id' => 'yes', 'value' => 1, 'name' => 'Enabled'],
		]
	],[
		'title' => 'Nostalgia mode',
		'descr' => 'Enable various tweaks to make the menu look more like the original.',
		'id' => 'nostalg',
		'tblcol' => 'nostalgia',
		'options' => [
			['id' => 'no', 'value' => 0, 'name' => 'Disabled'],
			['id' => 'yes', 'value' => 1, 'name' => 'Enabled'],
		]
	]
];
?>
<p class="title">Settings</p>

<form method="POST"><input type="hidden" name="a" value="setoptions"><table class="opt_tbl">
	<?php foreach ($ettings as $etting) { ?>
	<tr>
		<td class="a"><?=$etting['title'] ?></td>
		<td class="b">
			<?php foreach ($etting['options'] as $option) { ?>
			<input type="radio" name="<?=$etting['id'] ?>" id="<?=$etting['id'] ?>_<?=$option['id']?>" value="<?=$option['value']?>"
				<?=($userdata[$etting['tblcol']] == $option['value'] ? ' checked' : '')?>>
			<label for="<?=$etting['id'] ?>_<?=$option['id']?>"><?=$option['name'] ?></label>
			<?php } ?>
		</td>
		<td class="c"><?=$etting['descr'] ?></td>
	</tr>
	<?php } ?>
	<tr><td colspan=3 class="a"><input type="submit" value="Submit"></td></tr>
</table></form>