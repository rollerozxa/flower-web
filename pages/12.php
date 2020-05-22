<?php
$id = (isset($_GET['id']) ? $_GET['id'] : 1);

$u = new user(true, $id, IDENTIFIER_USERID);
$u->updateUserInfo();

$pow = $u->getData('powerlevel');
if ($pow != 1) {
	$powstr = sprintf(
		'<br><span style="color:#%s">%s</span>',
	powcolor($pow), powname($pow));
}

if ($cuser->getData('powerlevel') == 4) {
	$userexport = sprintf(
		'<br><a href="./tools/userexport.php?pass=%s&uid=%s" class="nicebtn nb_blue">Export User Information</a>',
	$uid, $u->getData('uid'));
}

?>
<div style="text-align:center">
	<?=flag($u->getData('country')) ?> <span class="title"><?=$u->getData('username')?></span>
	<em><?=(isset($powstr) ? $powstr : '')?></em>
	<br><div class="user_flowbox">
		<span class="title">Flowers started</span><br>
		<?php foreach ($flowers as $flower) {
			?><img src="img/<?=(!$u->getData('has_'.strtolower($flower)) ? 'gray/' : '').$flower?>Icon.png" width=24><?php
		} ?>
	</div>
	<em>Last seen <?=chat_time(ceil(time() - $u->getData('lastview'))) ?> ago</em>
	<br><a href="<?=pagelink(15)?>&id=<?=$id?>" class="nicebtn nb_green">Send Message</a>
	<?=(isset($userexport) ? $userexport : '') ?>
</div>