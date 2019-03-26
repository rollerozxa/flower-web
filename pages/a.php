<?php

if (!isset($_REQUEST['quantity'])) {
	$noquantity = true;
} else {
	$noquantity = false;
	$quantity = $_REQUEST['quantity'];
}

$buyvalue	= 50;
$sellvalue	= 50;

if (file_exists('pages/action/'.$show.'.php')) {
	include('pages/action/'.$show.'.php');

	update_userdata();
}

?>
