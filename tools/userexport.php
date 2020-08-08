<?php
include('../function/mysql.php');
include('../function/userlib.php');
include('../config.php');

// Password for accessing the user export page.
// The password is the uid of any user with the powerlevel of 4.
$pass = (isset($_GET['pass']) ? $_GET['pass'] : null);
$uid = (isset($_GET['uid']) ? $_GET['uid'] : null);

$pow = result("SELECT powerlevel FROM user WHERE uid = ?", [$pass]);
if ($pow != 4) { // Fake a 404.
	header($_SERVER['SERVER_PROTOCOL']." 404 Not Found", true);
	include('../error/404.php');
	die();
}

if (!isset($uid)) {
	echo '<form><input type="hidden" name="pass" value="'.$pass.'"><select name="uid">';
	$query = query("SELECT * FROM user");
	while ($record = $query->fetch()) {
		printf('<option value="%s">%s</option>', $record['uid'], $record['username']);
	}
	echo '</select><input type="submit" value="Submit"></form>';
	die();
}

echo <<<HTML
<style>
table, tr, td, th {
	border: 1px solid black;
}
td,th {
	padding: 5px;
}
h1,h2 {
	margin-bottom: 10px;
	margin-top: 0px;
}
</style>
HTML;

$tbl_userinfo = [
	'userID',
	'uid',
	'username',
	'friendcode',
	'country',
	'seeds',
	'stars',
	'PGM',
	'seedincome',
	'lastview',
	'powerlevel',
	'yellow_background',
	'menustyle',
	'zoom',
	'nostalgia',
	'has_rose',
	'has_daisy',
	'has_iris',
	'has_orchid',
	'has_sunflower'
];
$tbl_flowerinfo = [
	'flowerID',
	'uid',
	'height',
	'water',
	'sun',
	'giga',
	'warp',
	'basicgrowthrate',
	'autowater',
	'fertilizer',
	'superfertilizer',
	'nevershrink'
];

$cuser = new user(false, $uid);
$cuser->updateUserInfo();

if (!$cuser->getData('userID')) die('Invalid user.');

echo '<hr><h1>Main User Info:</h1><table><tr><th>Key</th><th>Value</th></tr>';
foreach ($tbl_userinfo as $tableline) {
	if ($tableline == 'uid') {
		echo '<tr><td>uid</td><td><em>REDACTED</em></td></tr>';
	} else {
		echo '<tr><td>'.$tableline.'</td><td>'.$cuser->getData($tableline).'</td></tr>';
	}
}
echo '</table>';

foreach ($flowers as $flower) {
	if ($cuser->hasFlower($flower)) {
		$cuser->updateUserFlower($flower);
	}
}

echo '<hr><h1>Flower Info:</h1><table><tr><th>Key</th>';
foreach ($flowers as $flower) {
	echo "<th>$flower</th>";
}
echo '</tr>';
foreach ($tbl_flowerinfo as $tableline) {
	echo "<tr><td>$tableline</td>";
	if ($tableline == 'uid') {
		echo '<td colspan=5 style="text-align:center"><em>REDACTED</em></td>';
	} else {
		foreach ($flowers as $flower) {
			if (isset($cuser->flower[$flower])) {
				echo "<td>".$cuser->flower[$flower]->getData($tableline)."</td>";
			} else {
				echo '<td>-</td>';
			}
		}
	}
	echo '</tr>';
}
echo '</table>';

echo '<hr><h1>Chatterbox posts:</h1><table><tr><th>Message</th><th>Time</th></tr>';
$query = query("SELECT * FROM chat WHERE userID = ?", [$cuser->getData('userID')]);
while ($record = $query->fetch()) {
	printf('<tr><td>%s</td><td>%s</td></tr>', $record['message'], date('Y-m-d H:i:s',$record['time']));
}
echo '</table>';
