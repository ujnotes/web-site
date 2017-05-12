var initPageFunction = function(path) {
	var pageFunction = path.replace('/', '__');
	if (typeof window[pageFunction] === 'function')
		window[pageFunction]();
}
