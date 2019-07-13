<!doctype html>
<html>
	<head>
		<title>Banned</title>
		<link rel="stylesheet" type="text/css" href="assets/banned.css">
	</head>
	<body>
		<table>
			<tr>
				<td style="width:100px;">
					<a onclick='document.getElementById("banneid").src="img/banne_touch.png";
					 document.getElementById("pokemsg").style.visibility = "visible";'>
						<img src="img/banne.png" id="banneid" width=100>
					</a>
					<p id="pokemsg" style="visibility:hidden"><em>Ow! Don't poke me!</em></p>
				</td>
				<td>
					<h3>Banned</h3>
					<p>You have been banned.</p>
					Reason: <br><span class="error">Testing page. You aren't actually banned!</span>
				</td>
			</tr>
		</table>
	</body>
</html>