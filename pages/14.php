Change nickname to:<br>
<form action="" method="POST">
	<input type="hidden" name="a" value="changename">
	<input name="name" type="text" maxlength=35 style="width:calc(100% - 71px)" value="<?=$userdata['username'] ?>">
	<input type="submit" value="Change">
</form>
<hr>
(Current flag: <img src="flags/<?=$userdata['country'] ?>.png">) 
Change flag:<br>
<?php
// Order countries in alphabetical order (a la the in-game change flag system)
usort($countries, function($a, $b) { return strcmp($a[1], $b[1]); });

foreach ($countries as $country) {
	printf(
		'<a class="flag" href="%s"><div><img src="flags/%s.png"> %s</div></a>',
	alink(11,'changeflag',$country[0]), $country[0], $country[1]);
}
?>