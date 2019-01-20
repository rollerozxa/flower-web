Change nickname to:<br>
<form>
	<input name="changeto" type="text" maxlength=35 style="width:calc(100% - 71px)" value="Anonymous">
	<input type="submit" value="Change">
</form>
<hr>
(Current flag: <img src="flags/<?php echo $userdata['country'] ?>.png">) 
Change flag:<br>
<?php
foreach ($countries as $country) {
	$countryinfo = explode("@", $country);
	echo '<a class="flaglink" href="' . alink(11,'changeflag',$countryinfo[0]) . '"><div class="flagbox"><img class="f" src="flags/' . $countryinfo[0] . '.png"> ' . $countryinfo[1] . '</div></a>';
}
?>