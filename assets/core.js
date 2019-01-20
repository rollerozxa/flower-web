function zoom(zoom) {
	document.cookie = "zoom=" + zoom;
	document.body.style.zoom = zoom;
	this.blur();
}

function blink() {
	var t = setInterval(function () {
		var ele = document.getElementById('blink');
		ele.style.visibility = (ele.style.visibility == 'hidden' ? '' : 'hidden');
	}, 250);
}

function btnlink(url){
	window.open(url, '_top');
}

function getCookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for(var i = 0; i <ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}