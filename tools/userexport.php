<?php
include('../function/mysql.php');
include('../config.php');

$uid = (isset($_GET['uid']) ? $_GET['uid'] : null);

if (!isset($uid)) {
	echo '<form><select name="uid">';
	$query = query("SELECT * FROM user");
	while ($record = $query->fetch()) {
		echo '<option value="' . $record['uid'] . '">' . $record['username'] . '</option>';
	}
	echo '</select><input type="submit" value="Submit"></form>';
	die();
}

$style = <<<HTML
<style>
table, tr, td, th {
	border: 1px&solid&black;
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
$style = str_replace(PHP_EOL,'',$style);
$style = str_replace('	','',$style);
$style = str_replace(' ','',$style);
$style = str_replace('&',' ',$style);
echo $style;

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

$userdata = fetch("SELECT * FROM user WHERE uid = ?", [$uid]);
if (!isset($userdata['userID'])) die('Invalid user.');

echo '<hr><h1>Main User Info:</h1><table><tr><th>Key</th><th>Value</th></tr>';
foreach ($tbl_userinfo as $tableline) {
	if ($tableline == 'uid')
		echo '<tr><td>uid</td><td><em>REDACTED</em></td></tr>';
	else
		echo '<tr><td>' . $tableline . '</td><td>' . $userdata[$tableline] . '</td></tr>';
}
echo '</table>';

foreach ($flowers as $flower) {
	if ($userdata['has_' . strtolower($flower)]) {
		$userflowerdata[$flower] = fetch("SELECT * FROM user_$flower WHERE uid = ?", [$uid]);
	} else {
		$userflowerdata[$flower] = null;
	}
}

echo '<hr><h1>Flower Info:</h1><table><tr><th>Key</th>';
foreach ($flowers as $flower) {
	echo "<th>$flower</th>";
}
echo "</tr>";
foreach ($tbl_flowerinfo as $tableline) {
	echo "<tr><td>$tableline</td>";
	if ($tableline == 'uid') {
		echo '<td colspan=5 style="text-align:center"><em>REDACTED</em></td>';
	} else {
		foreach ($flowers as $flower) {
			if ($userflowerdata[$flower]) {
				echo "<td>" . $userflowerdata[$flower][$tableline] . "</td>";
			} else {
				echo "<td>-</td>";
			}
		}
	}
	echo "</tr>";
}
echo '</table>';

echo '<hr><h1>Chatterbox posts:</h1><table><tr><th>Message</th><th>Time</th></tr>';
$query = query("SELECT * FROM chat WHERE userID = ?", [$userdata['userID']]);
while ($record = $query->fetch()) {
	echo '<tr><td>'.$record['message'].'</td><td>'.date('Y-m-d H:i:s',$record['time']).'</td></tr>';
}
echo '</table>';
