<?php
require_once('userlib.php');

if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) {
	$user = new user(false, '<REDACTED>');
	$user->updateUserInfo();
	if ($user->enough('friends', 65)) {
		echo 'true';
	} else {
		echo 'false';
	}
	/*$user->setData('friends', $user->getData('friends') + 1);
	print($user->getData('friends').'<br>');

	$user->updateUserFlower('Daisy');
	$user->flower['Daisy']->setData('nevershrink', $user->flower['Daisy']->getData('nevershrink') + 1);
	echo $user->flower['Daisy']->getData('nevershrink') . '<br><br>';

	$user2 = new user(false, '<REDACTED>');
	$user2->updateUserInfo();
	echo $user2->getData('friends').'<br>';

	$user2->updateUserFlower('Daisy');
	echo $user2->flower['Daisy']->getData('nevershrink');*/
}