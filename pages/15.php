<?php
$id = (isset($_GET['id']) ? $_GET['id'] : 1);

$u = fetch("SELECT * FROM user WHERE userID = ?", [$id]);

?><p class="title">Send Message</p>
<p>You're sending a message to <a class="user" style="color:#<?=powerlevelcolor($u['powerlevel'])?>" href="<?=pagelink(12) ?>&id=<?=$id ?>"><?=$u['username'] ?></a></p>
<form action="<?=pagelink(3)?>" method="POST">
	<input type="hidden" name="a" value="sendmessage">
	<input type="hidden" name="recipient" value="<?=$id ?>">
	<input type="text" name="message">
	<input type="submit" value="Submit">
</form>