<?php
include('config.php');
include('mysql.php');
include('function/extra/funfacts.php');
include('function/misc.php');
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Revived Origami Flower game server">
		<title>Origami Flowers!</title>
		<link rel="stylesheet" type="text/css" href="assets/index.css">
		<!-- ****** faviconit.com favicons ****** -->
		<link rel="shortcut icon" href="/assets/icons/favicon.ico?v=2">
		<link rel="icon" sizes="16x16 32x32 64x64" href="/assets/icons/favicon.ico?v=2">
		<link rel="icon" type="image/png" sizes="196x196" href="/assets/icons/favicon-192.png?v=2">
		<link rel="icon" type="image/png" sizes="160x160" href="/assets/icons/favicon-160.png?v=2">
		<link rel="icon" type="image/png" sizes="96x96" href="/assets/icons/favicon-96.png?v=2">
		<link rel="icon" type="image/png" sizes="64x64" href="/assets/icons/favicon-64.png?v=2">
		<link rel="icon" type="image/png" sizes="32x32" href="/assets/icons/favicon-32.png?v=2">
		<link rel="icon" type="image/png" sizes="16x16" href="/assets/icons/favicon-16.png?v=2">
		<link rel="apple-touch-icon" href="/assets/icons/favicon-57.png?v=2">
		<link rel="apple-touch-icon" sizes="114x114" href="/assets/icons/favicon-114.png?v=2">
		<link rel="apple-touch-icon" sizes="72x72" href="/assets/icons/favicon-72.png?v=2">
		<link rel="apple-touch-icon" sizes="144x144" href="/assets/icons/favicon-144.png?v=2">
		<link rel="apple-touch-icon" sizes="60x60" href="/assets/icons/favicon-60.png?v=2">
		<link rel="apple-touch-icon" sizes="120x120" href="/assets/icons/favicon-120.png?v=2">
		<link rel="apple-touch-icon" sizes="76x76" href="/assets/icons/favicon-76.png?v=2">
		<link rel="apple-touch-icon" sizes="152x152" href="/assets/icons/favicon-152.png?v=2">
		<link rel="apple-touch-icon" sizes="180x180" href="/assets/icons/favicon-180.png?v=2">
		<meta name="msapplication-TileColor" content="#FFFFFF">
		<meta name="msapplication-TileImage" content="/assets/icons/favicon-144.png?v=2">
		<meta name="msapplication-config" content="/browserconfig.xml?v=2">
		<!-- ****** faviconit.com favicons ****** -->
	</head>
	<body>
		<div class="box outer c_mainbox">
			<span class="top">
				<img src="img/RoseIcon.png"><img src="img/DaisyIcon.png"><img src="img/IrisIcon.png"><img src="img/OrchidIcon.png"><img src="img/SunflowerIcon.png">
				<span class="title">The Origami Flower Games</span>
			</span>
			<h2>The Origami Flower games are finally back, and it's better than ever!</h2>
			<p>The Origami Flower games were a series of interconnected games that would all link up into a flower growing MMO. Now it's back in action again, with a custom server! </p>
			<p>To connect, you need to download the new flower app. Don't worry - there are no viruses and as a bonus, it's a lot smaller as Tapjoy and billing code has been removed.</p>
			<div class="box center">
				<span class="downloadtitle">Downloads!</span>
				<table>
					<tr>
						<td><img src="img/DaisyIcon.png" class="downloadicon"></td>
						<td>
							<span class="gametitle">Origami Daisy</span>
							<a href="download/daisy/daisy.apk">Download Latest (v<?php echo $daisy_latestversionstring ?>) (Android 2.2+)</a> (size: <?php echo round(filesize('download/daisy/daisy.apk') / 1000000,2);?> MB)
							<a href="download/daisy/changelog.txt">Changelog</a><br>
							<br>(Game calls itself "Origami Daisy", but you can choose whatever flower you'd like within the game)
						</td>
					</tr>
					<tr>
						<td><img src="img/ABPIcon.png" class="downloadicon"></td>
						<td>
							<span class="gametitle">Attack Breaker Pro</span>
							<a href="download/abp/abp.apk">Download (Android 1.6+)</a> (size: <?php echo round(filesize('download/abp/abp.apk') / 1000,2);?> KB)
							<br><br>This is a custom version that has various third-party junk ripped out.
						</td>
					</tr>
				</table>
			</div>
			<span class="funfact"><strong>Fun fact!</strong> - <?php echo $funfact; ?></span>
		</div><br>
		<div class="box outer c_mainbox" style="text-align:left">
			<span class="title">High Scores</span>
<?php foreach ($flowers as $gid) {
	echo '<span style="color:green;font-weight:bold;">Tallest ' . $flowers_plural[$flowers_id[$gid]] . ' in the world!</span><br>
	'.SqlQueryResult("SELECT COUNT(*) FROM user_$gid").' people growing a ' . $gid . '.
	<table class="fullwidth"><tr class="tbl1"><th width=60px>Rank</th><th width=40%>Height</th><th>Player</th></tr>';
	$db_query = SqlQuery("SELECT * FROM `user_$gid` ORDER BY `height` DESC");
	$bg = 0;
	$count = 1;
	while ($record = mysqli_fetch_array($db_query)) {
		$rowuserdata = SqlQueryFetchRow('SELECT * FROM user WHERE uid="' . $record['uid'] . '"');
		?><tr class="tbl<?=$bg ?>">
			<td><img src="flags/<?=$rowuserdata['country'] ?>.png"> <?=$count ?></td>
			<td><?=formatheight($record['height']) ?> (cm)</td>
			<td><?=$rowuserdata['username'] ?></td>
		</tr><?php
		$bg = ($bg == 0 ? 1 : 0);
		$count++;
	}
	?></table><br>
<?php } ?>
		</div>
	</body>
</html>