<h2>Random tests</h2>
<div class="box" style="background-color:#ddaaff">
	<h3>Item list test</h3>
	<ul>
		<?=itemlist(1337,'heap',array('100 boop',1000,50000,500000,5000000,15000000,50000000),1,'Throw $%q seeds on the heap',true) ?>
	</ul>
</div>

<div class="box" style="background-color:#ddaaff">
	<?php
	if (isset($_GET['inbox_message'])) {
		send_mail($userdata['userID'],$_GET['inbox_message'],$_GET['sender_name']);
	}
	?>
</div>
