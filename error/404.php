<?php include('config.php') ?>
<html>
	<head>
		<title>Error</title>
		<style><?=$conf_style ?></style>
	</head>
	<body>
		<?php if ($conf_header != '') echo $conf_header; ?>
		<p class="errortitle">404 File Not Found</p>
		<p class="errortext">The requested page wasn't found.</p>
		<?php
		foreach ($conf_footerlinks as $footerlink) {
			echo '<a href="'.$footerlink[0].'" class="footerlink">'.$footerlink[1].'</a> ';
		}
		?>
	</body>
</html>