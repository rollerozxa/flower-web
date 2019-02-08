<?php

include('../mysql.php');
include('../config.php');

$uid = mysqli_real_escape_string($mysqli, (isset($_GET['uid']) ? $_GET['uid'] : null));
if ($uid == null) {
	echo '<form><select name="uid">';
	$db_query = SqlQuery("SELECT * FROM user");
	while ($record = mysqli_fetch_array($db_query)) {
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
.infobox {
	border: 1px&solid&black;
	display: inline-block;
	padding: 5px;
	width: 350px;
}
</style>
HTML;
$style = str_replace(PHP_EOL,'',$style);
$style = str_replace('	','',$style);
$style = str_replace(' ','',$style);
$style = str_replace('&',' ',$style);
echo $style;

$tbl_userinfo = array(
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
	'has_rose',
	'has_daisy',
	'has_iris',
	'has_orchid',
	'has_sunflower'
);
$tbl_flowerinfo = array(
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
);

$userdata = SqlQueryFetchRow("SELECT * FROM user WHERE uid = '$uid'");
if (!isset($userdata['userID'])) die('Invalid user.');

echo '<hr><h1>Main User Info:</h1><table><tr><th>Key</th><th>Value</th></tr>';
foreach ($tbl_userinfo as $tableline) {
	if ($tableline == 'uid')
		echo '<tr><td>uid</td><td><em>REDACTED</em></td></tr>';
	else
		echo '<tr><td>' . $tableline . '</td><td>' . $userdata[$tableline] . '</td></tr>';
}
echo '</table>';

echo '<hr><h1>Flower Info:</h1>';
foreach ($flowers as $flower) {
	if ($userdata['has_' . strtolower($flower)]) {
		$userflowerdata = SqlQueryFetchRow("SELECT * FROM user_" . $flower . " WHERE uid = '$uid'");
		echo '<div class="infobox"><h2>' . $flower . ' Info:</h2><table><tr><th>Key</th><th>Value</th></tr>';
		foreach ($tbl_flowerinfo as $tableline) {
			if ($tableline == 'uid')
				echo '<tr><td>uid</td><td><em>REDACTED</em></td></tr>';
			else
				echo '<tr><td>' . $tableline . '</td><td>' . $userflowerdata[$tableline] . '</td></tr>';
		}
		echo '</table></div>';
	} else {
		echo '<div class="infobox"><h2>User has not started a ' . $flower . '.</h2></div>';
	}
}

echo '<hr><h1>Chatterbox posts:</h1><table><tr><th>Message</th><th>Time</th></tr>';
$db_query = SqlQuery("SELECT * FROM chat WHERE userID = " . $userdata['userID']);
while ($record = mysqli_fetch_array($db_query)) {
	echo '<tr><td>'.$record['message'].'</td><td>'.date('Y-m-d H:i:s',$record['time']).'</td></tr>';
}
echo '</table>';
