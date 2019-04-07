<?php
include('function/extra/funfacts.php');
include('function/flower.php');
include('function/misc.php');
include('function/mysql.php');
include('function/rainbow.php');
include('config.php');
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
				<table><?php foreach ($apps as $app) { ?>
					<tr>
						<td><img src="<?=$app['image'] ?>" class="downloadicon"></td>
						<td>
							<span class="gametitle"><?=$app['name'] ?></span>
							<a href="download/<?=$app['folder'] ?>/<?=$app['download_file'] ?>">Download Latest (v<?=$app['version_nice'] ?>) (Android <?=$app['minver'] ?>)</a>
							(size: <?=round($app['size'] / 1000000,2);?> MB)
							<?php if ($app['haschangelog']) { ?><a href="download/<?=$app['folder'] ?>/changelog.txt">Changelog</a><?php } ?>
							<br><br><?=$app['description'] ?>
						</td>
					</tr>
				<?php } ?></table>
			</div>
			<span class="funfact"><strong>Fun fact!</strong> - <?=random_funfact() ?></span>
		</div><br>
<?php
$flowers_count_query = "SELECT ";
$count = 1;
foreach ($flowers as $flower) {
	$flowers_count_query .= "(SELECT COUNT(*) FROM user_$flower) $flower";
	
	if ($count != sizeof($flowers)) {
		$flowers_count_query .= ",";
	}
	$count++;
}
$flowers_count = fetch($flowers_count_query);

foreach ($flowers as $gid) {
	$query = query("SELECT * FROM user_$gid JOIN user ON user_$gid.uid = user.uid ORDER BY height DESC LIMIT 10");
	$bg = 0;
	$count = 1;
	while ($record = $query->fetch()) {
		$leaderboard[$gid][] = [
			'count' => $count,
			'bg' => $bg,
			'country' => $record['country'],
			'height' => formatheight($record['height']),
			'username' => $record['username']
		];
		$bg = ($bg == 0 ? 1 : 0);
		$count++;
	}
}
?>
		<div class="box outer c_mainbox" style="text-align:left">
			<span class="title">High Scores<br><span class="flowertitle" style="font-size:15pt">Top 10 tallest flowers in the world!</span></span>
			<h4>Total Users: <span style="color:green"><?=result("SELECT COUNT(*) FROM user") ?></span></h4>
			<?php foreach ($flowers as $gid) { ?>
				<span class="flowertitle">Tallest <?=$flowers_plural[$flowers_id[$gid]] ?> in the world!</span><br>
				<?=$flowers_count[$gid] ?> people growing a <?=$gid ?>.
				<table class="fullwidth"><tr class="tbl1"><th width=60px>Rank</th><th width=40%>Height</th><th>Player</th></tr>
				<?php foreach ($leaderboard[$gid] as $boardrow) { ?>
					<tr class="tbl<?=$boardrow['bg'] ?>">
						<td><img src="flags/<?=$boardrow['country'] ?>.png"> <?=$boardrow['count'] ?></td>
						<td><?=$boardrow['height'] ?> (cm)</td>
						<td><?=$boardrow['username'] ?></td>
					</tr>
				<?php } ?>
				</table><br>
			<?php } ?>
		</div>
	</body>
</html>
