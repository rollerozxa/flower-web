<?php

if ($userdata['powerlevel'] == 4) {
	$query = query("SELECT uid, username FROM user");
	$form = '<select name="uid">';
	while ($record = $query->fetch()) {
		$form .= sprintf('<option value="%s">%s</option>', $record['uid'], $record['username']);
	}
	$form .= '</select> <select name="gid">';
	foreach ($flowers as $flower) {
		$form .= sprintf('<option value="%s">%s</option>', $flower, $flower);
	}
	$form .= '</select> <input type="submit" value="Submit">';
}

$admintools = [
	'userexport' => [
		'content' => sprintf('<a href="./tools/userexport.php?pass=%s">Export user data</a>', $uid),
		'powerlevel' => 4
	], 'nukechat' => [
		'content' => sprintf('<a href="%s">Nuke chat table (Shortcut)</a>', pagelink(2)),
		'powerlevel' => 4
	], 'impersonate' => [
		'content' => sprintf(
			 '<span class="title">Impersonate someone! &Ograve;w&Oacute;</span>'
			.'<br><br><form method="GET">%s</form>'
		$form),
		'powerlevel' => 4
	], 'ban_debug' => [
		'content' => sprintf('<a href="%s&bandebug">Ban page debug</a>', pagelink(420)),
		'powerlevel' => 1
	]
];

$permissionmsg = '<span class="perm">Available for <span style="color:#%s">%s</span>+</span>';

$i = 0;
?>
<p class="title">Admin tools</p>

<?php foreach ($admintools as $toolid => $admintool) { ?>
	<?php if ($admintool['powerlevel'] <= $userdata['powerlevel']) { ?>
		<div class="box adminbox" style="">
			<?=$admintool['content'] ?>
			<?=sprintf($permissionmsg, powcolor($admintool['powerlevel']), powname($admintool['powerlevel'])) ?>
		</div>
		<?php $i++ ?>
	<?php } ?>
<?php } ?>