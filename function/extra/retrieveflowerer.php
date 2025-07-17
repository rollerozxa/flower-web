<?php

// new

function putString(&$strm, $value) {
	$strm->putShort(strlen($value));
	$strm->put($value);
}

function shuffleAdvice() {
	$advices = [
	"There's a button to disable this, you know?",
	"You won't even get anything from this!",
	"Please disable advices.",
	"Turn off advices. Now."];

	return $advices[array_rand($advices)];
}

function putCountries(&$strm) {
	global $countries;

	$strm->putInt(sizeof($countries));

	foreach ($countries as $c) {
		putString($strm, $c[0]);
		putString($strm, $c[1]);
	}
}