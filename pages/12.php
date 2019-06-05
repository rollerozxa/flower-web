<?php

$id = (isset($_GET['id']) ? $_GET['id'] : 1);

$u = fetch("SELECT * FROM user WHERE userID = ?", [$id]);

if ($u['powerlevel'] != 1) {
	$pow = $u['powerlevel'];
	$powstr = sprintf(
		'<br><span style="color:#%s">%s</span>',
	powcolor($pow), powname($pow));
}

if ($u['powerlevel'] == 4) {
	$userexport = sprintf(
		'<br><a href="./tools/userexport.php?pass=%s&uid=%s" class="nicebtn nb_blue">Export User Information</a>',
	$uid, $u['uid']);
}

?>
<div style="text-align:center">
	<img src="flags/<?=$u['country']?>.png"> <span class="title"><?=$u['username']?></span>
	<em><?=(isset($powstr) ? $powstr : '')?></em>
	<br><div class="user_flowbox">
		<span class="title">Flowers started</span><br>
		<?php foreach ($flowers as $flower) {
			?><img src="img/<?=(!$u['has_'.strtolower($flower)] ? 'gray/' : '').$flower?>Icon.png" width=24><?php
		} ?>
	</div>
	<em>Last seen <?=chat_time(ceil(time() - $u['lastview'])) ?> ago</em>
	<br><a href="<?=pagelink(15)?>&id=<?=$id?>" class="nicebtn nb_green">Send Message</a>
	<?=(isset($userexport) ? $userexport : '') ?>
</div>