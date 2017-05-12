
function getURLid() {
	var loc = window.location.pathname;
	if(loc == '/')
		return '';
	else
		return loc.substring(1);
}

function getHashID() {
	var hash = window.location.hash;
	if(hash.length == 0)
		return '';
	else
		return hash.substring(2);
}

function setXURL(node) {
	var arClassElement = getElementsByClassName(node, 'XURL');
	var n = arClassElement.length;
	for(i = 0; i < n; i++) {
		var a = arClassElement[i].children[0];
		arClassElement[i].onclick = loadCanvasI;
	}
}
