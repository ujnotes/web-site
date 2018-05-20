function about_me() {
	if(typeof gapi !== 'undefined')
		gapi.plus.go('me_g-plus');
	if(typeof twttr !== 'undefined')
		twttr.widgets.load();
}
