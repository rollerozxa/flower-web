<?php

// ===================
// Error page config.
// ===================

// Page title.
$conf_pagetitle = 'Error';

// Custom header code.
$conf_header = '<img src="/img/gray/RoseIcon.png"><img src="/img/gray/DaisyIcon.png"><img src="/img/gray/IrisIcon.png"><img src="/img/gray/OrchidIcon.png"><img src="/img/gray/SunflowerIcon.png">';

// List of footer links. Separate the URL and the name with an @ symbol.
$conf_footerlinks = [
	["/","Index Page"],
	["javascript:window.history.back()","Go back"]
];

$conf_style = <<<HTML
body {
	background-color: lightgray;
	font-family: monospace;
	padding-top: 50px;
	text-align: center;
	letter-spacing: -1px;
}
p.errortitle {
	font-size: 35pt;
	font-weight: bold;
}
p.errortext {
	font-size: 20pt;
}
a.footerlink {
	display: inline-block;
	margin: 50px 10px 0px 10px;
	font-size: 20pt;
}
HTML;

?>