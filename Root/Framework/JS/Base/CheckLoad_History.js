if (!(window.history && window.history.pushState)) {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.async = true;
	script.src = '/history.js';
	var s = document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(script, s);
}
