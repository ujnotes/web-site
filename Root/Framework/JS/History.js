window.onpopstate = function(e) { //window.addEventListener('popstate', function(e)
	if(!!e.state)
		if(e.state.id == 'menu')
			activateMenuFn();
		else {
			loadCanvas(e.state.id, e.state.title);
			activateMainFn();
		}
}
