<?php

$data = [
	'Player1' => 244892347923487,
	'Player2' => 213876128376128,
	'Player3' => 212324897928347,
	'Player4' => 203495873948578,
	'Player5' => 183249729384789,
	'Player6' => 173249873294879,
	'Player7' => 171587934957789,
];

foreach ($data as $uname => $ulength) {
	$percentage = sprintf("%.2f%%", ($ulength != 0 ? min(100, ($ulength / $data['Player1']) * 100) : 100));

	$color = str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
	printf(
		'<div class="bar" style="width:%s;background-color:#%s;">%s<span class="pa"></span></div>',
	$percentage, $color, $uname);
}

?>
<style>
.pa {
	padding-right: 10em;
}
.bar {
	border: 2px solid black;
	color: #ffffff;
	margin-bottom: 1em;
	text-shadow: 1px 1px #000000;
}
</style>
