<?php

if (!isset($_REQUEST['quantity'])) {
	$noquantity = true;
} else {
	$noquantity = false;
	$quantity = $_REQUEST['quantity'];
}

if (file_exists('pages/action/'.$show.'.php')) {
	include('pages/action/'.$show.'.php');
}
