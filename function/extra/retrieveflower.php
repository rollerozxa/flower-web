<?php

function retrieve_advice() {
	$advices = [
	"There's a button to disable this, you know?",
	"You won't even get anything from this!",
	"Please disable advices.",
	"Turn off advices. Now."];

	$advice = $advices[array_rand($advices)];

	return hex2bin(str_pad(dechex(strlen($advice)),4,"0",STR_PAD_LEFT)) . $advice;
}

function retrieve_countries() {
	global $countries;

	$out = hex2bin(str_pad(dechex(sizeof($countries)),2,'0',STR_PAD_LEFT));

	foreach ($countries as $c) {
		$out .= hex2bin("00") . hex2bin(str_pad(dechex(strlen($c[0])),2,"0",STR_PAD_LEFT)) . $c[0] . hex2bin(str_pad(dechex(strlen($c[1])),4,"0",STR_PAD_LEFT)) . $c[1];
	}
	
	return $out;
}

function retrieve_country() {
	global $userdata;

	return hex2bin(str_pad(dechex(strlen($userdata['country'])),2,'0',STR_PAD_LEFT)) . $userdata['country'];
}

function retrieve_name() {
	global $userdata;

	return hex2bin(str_pad(dechex(strlen($userdata['username'])),2,"0",STR_PAD_LEFT)) . $userdata['username'];
}

function retrieve_seeds() {
	global $userdata;

	return hex2bin(str_pad(dechex(round($userdata['seeds'],0)),16,"0",STR_PAD_LEFT));
}

function retrieve_stars() {
	global $userdata;

	return hex2bin(str_pad(dechex(round($userdata['stars'],0)),16,"0",STR_PAD_LEFT));
}


function writevalue($value,$lengthsize = 2) {
	return hex2bin(str_pad(dechex(strlen($value)),$lengthsize,"0",STR_PAD_LEFT)) . $value;
}

?>