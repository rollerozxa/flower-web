<?php
include('config.php');
?>
<html>
	<head>
		<title>Error</title>
		<style><?php echo $conf_style; ?></style>
	</head>
	<body>
		<?php if ($conf_header != '') echo $conf_header; ?>
		<p class="errortitle">404 File Not Found</p>
		<p class="errortext">The requested page wasn't found.</p>
		<?php
		foreach ($conf_footerlinks as $footerlink) {
			$link = explode("@", $footerlink);
			echo '<a href="' . $link[0] . '" class="footerlink">' . $link[1] . '</a> ';
		}
		?>
	</body>
</html>